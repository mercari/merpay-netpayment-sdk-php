merpay-netpayment-sdk-php
====

PHP wrapper for Merpay Online payments API.

# Usage

`\Mercari\Merpay\Netpayment\Client` provides a simple interface for Merpay Online payments API. Please use provided values by Merpay for the arguments of the construcor.

```php
<?php

require_once 'mercari/merpay/netpayment/client.php';

$client = new \Mercari\Merpay\Netpayment\Client(
    $apiHostName,
    $authenticationHostName,
    $clientId,
    $clientSecret
);

$response = $client->createTransaction('orderID' . time(),
    4500,
    false,
    false,
    false,
    0,
    'https://example.com/shippingFeeUrl',
    'https://example.com/confirmUrl',
    'https://example.com/completionUrl',
    'https://example.com/cancelUrl',
    'https://example.com/returnUrl',
    1,
    false,
    array(
      Mercari\Merpay\Netpayment\V1\Item\MetadataEntry(
        (object)array(
          'name' => 'Golden T-shirt',
          'unitPrice' => 4500,
          'quantity' => 1,
          'metadata' => (object)array()
          )
        );
      ),
    (object)array()
  );

  if ($response->success()) {
    header("location: {$response->patmentUrl}");
  } else {
    trigger_error($response->error()->message);
  }
```

Please see the integration guide for the details of each API.

## Parsing a payload of the incoming webhooks

```php
$obj = json_decode($payload, false);
$completion = new \Mercari\Merpay\Netpayment\Callback\CompletionRequest($obj);
```

# License

Copyright 2019 Mercari, Inc.

Licensed under the MIT License.
