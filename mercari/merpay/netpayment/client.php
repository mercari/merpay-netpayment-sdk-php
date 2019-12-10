<?php

namespace Mercari\Merpay\Netpayment;

require_once(dirname(__FILE__) . '/v1/messages.php');
require_once(dirname(__FILE__) . '/v1/api.php');
require_once(dirname(__FILE__) . '/callback/callback.php');

define('VERSION', '1.4.1');
define('USER_AGENT', "netpay/${VERSION} (php)");

class RequestResponse
{
    private $_error = null;

    public function __construct($result)
    {
        if ($result instanceof ErrorResponse) {
            $this->_error = $result;
        }
    }

    public function success(): bool
    {
        return ($this->error() === null);
    }
    public function error(): ?ErrorResponse
    {
        return ($this->_error);
    }
}
class ErrorResponse
{
    public $code;
    public $message;
    public $requestId;
    public $details;

    public function __construct(string $body)
    {
        $hash = json_decode($body, true);
        $this->code = $hash['code'];
        $this->message = $hash['message'];
        $this->requestId = $hash['requestId'];
        $this->details = $hash['details'];
    }
    public function success(): bool
    {
        return false;
    }
    public function error(): ?ErrorResponse
    {
        return $this;
    }
}

require_once dirname(__FILE__) . '/v1/api.php';

class AuthClient
{
    protected $clientId;
    protected $clientSecret;
    protected $authHost;

    public function __construct(string $authHost, string $clientId, string $clientSecret)
    {
        $this->authHost = $authHost;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    public function fetchAccessToken(): string
    {
        $authToken = base64_encode($this->clientId . ':' . $this->clientSecret);
        $url = 'https://' . $this->authHost . '/jp/v1/token';
        $content = http_build_query(
            [
            'grant_type' => 'client_credentials',
            'scope' => 'netpayment:transaction:write',
            'user-agent' => USER_AGENT,
            ]
        );
        $headers = [
        "authorization: Basic {$authToken}",
        'content-type: application/x-www-form-urlencoded',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_body = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        if ($info['http_code'] === 200) {
            return json_decode($response_body)->access_token;
        }

        return null;
    }
}

class Client
{
    use V1\Api;

    protected $apiHost;
    protected $authClient;

    public function __construct(string $apiHost, string $authHost, string $clientId, string $clientSecret)
    {
        $this->apiHost = $apiHost;
        $this->authClient = new AuthClient($authHost, $clientId, $clientSecret);
    }

    private function request(string $path, array $params)
    {
        $accessToken = $this->authClient->fetchAccessToken();

        $url = 'https://' . $this->apiHost . $path;
        $headers = [
        "authorization: {$accessToken}",
        'content-type: application/json',
        'accept: application/json',
        'user-agent: USER_AGENT',
        ];
        $content = json_encode($params);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_body = curl_exec($ch);
        $info = curl_getinfo($ch);

        curl_close($ch);

        if ($info['http_code'] === 200) {
            return json_decode($response_body, false);
        }

        return new ErrorResponse($response_body);
    }
}
