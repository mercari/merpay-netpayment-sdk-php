<?php

namespace Mercari\Merpay\Netpayment\Callback;

class GetShippingFeeRequest
{
    /** @var string */
    public $url;
    /** @var string */
    public $transactionId;
    /** @var string */
    public $orderId;
    /** @var Area */
    public $area;
    public function __construct(\stdClass $params)
    {
        $this->url = $params->url;
        $this->transactionId = $params->transactionId;
        $this->orderId = $params->orderId;
        $this->area = $params->area ? new Area($params->area) : null;
    }
}
class ConfirmRequest
{
    /** @var string */
    public $url;
    /** @var string */
    public $transactionId;
    /** @var string */
    public $orderId;
    /** @var int */
    public $amount;
    /** @var int */
    public $shippingFee;
    public function __construct(\stdClass $params)
    {
        $this->url = $params->url;
        $this->transactionId = $params->transactionId;
        $this->orderId = $params->orderId;
        $this->amount = $params->amount;
        $this->shippingFee = $params->shippingFee;
    }
}
class CompletionRequest
{
    /** @var string */
    public $url;
    /** @var string */
    public $transactionId;
    /** @var string */
    public $orderId;
    /** @var string */
    public $orderName;
    /** @var string */
    public $inquiryCode;
    /** @var int */
    public $amount;
    /** @var int */
    public $shippingFee;
    /** @var int */
    public $paymentContractType;
    /** @var Buyer */
    public $buyer;
    /** @var DeliveryAddress */
    public $deliveryAddress;
    public function __construct(\stdClass $params)
    {
        $this->url = $params->url;
        $this->transactionId = $params->transactionId;
        $this->orderId = $params->orderId;
        $this->orderName = $params->orderName;
        $this->inquiryCode = $params->inquiryCode;
        $this->amount = $params->amount;
        $this->shippingFee = $params->shippingFee;
        $this->paymentContractType = $params->paymentContractType;
        $this->buyer = $params->buyer ? new Buyer($params->buyer) : null;
        $this->deliveryAddress = $params->deliveryAddress ? new DeliveryAddress($params->deliveryAddress) : null;
    }
}
class Area
{
    /** @var string */
    public $zipCode1;
    /** @var string */
    public $zipCode2;
    /** @var string */
    public $prefecture;
    /** @var string */
    public $city;
    public function __construct(\stdClass $params)
    {
        $this->zipCode1 = $params->zipCode1;
        $this->zipCode2 = $params->zipCode2;
        $this->prefecture = $params->prefecture;
        $this->city = $params->city;
    }
}
class Buyer
{
    /** @var string */
    public $nickname;
    /** @var string */
    public $telephone;
    /** @var string */
    public $email;
    public function __construct(\stdClass $params)
    {
        $this->nickname = $params->nickname;
        $this->telephone = $params->telephone;
        $this->email = $params->email;
    }
}
class DeliveryAddress
{
    /** @var string */
    public $familyName;
    /** @var string */
    public $firstName;
    /** @var string */
    public $familyNameKana;
    /** @var string */
    public $firstNameKana;
    /** @var string */
    public $telephone;
    /** @var string */
    public $zipCode1;
    /** @var string */
    public $zipCode2;
    /** @var string */
    public $prefecture;
    /** @var string */
    public $city;
    /** @var string */
    public $address1;
    /** @var string */
    public $address2;
    public function __construct(\stdClass $params)
    {
        $this->familyName = $params->familyName;
        $this->firstName = $params->firstName;
        $this->familyNameKana = $params->familyNameKana;
        $this->firstNameKana = $params->firstNameKana;
        $this->telephone = $params->telephone;
        $this->zipCode1 = $params->zipCode1;
        $this->zipCode2 = $params->zipCode2;
        $this->prefecture = $params->prefecture;
        $this->city = $params->city;
        $this->address1 = $params->address1;
        $this->address2 = $params->address2;
    }
}
