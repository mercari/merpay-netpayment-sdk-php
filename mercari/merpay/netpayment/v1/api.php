<?php

        namespace Mercari\Merpay\Netpayment\V1 {
            trait Api
            {
                public function createTransaction(string $orderId, int $amount, bool $useDeliveryAddress, bool $useShippingFee, bool $isFixedShippingFee, int $fixedShippingFee, string $shippingFeeUrl, string $confirmUrl, string $completionUrl, string $cancelUrl, string $returnUrl, int $paymentContractType, bool $capture, array $items, \stdClass $metadata): \Mercari\Merpay\Netpayment\V1\CreateTransactionResponse
                {
                    $params = ['orderId' => $orderId, 'amount' => $amount, 'useDeliveryAddress' => $useDeliveryAddress, 'useShippingFee' => $useShippingFee, 'isFixedShippingFee' => $isFixedShippingFee, 'fixedShippingFee' => $fixedShippingFee, 'shippingFeeUrl' => $shippingFeeUrl, 'confirmUrl' => $confirmUrl, 'completionUrl' => $completionUrl, 'cancelUrl' => $cancelUrl, 'returnUrl' => $returnUrl, 'paymentContractType' => $paymentContractType, 'capture' => $capture, 'items' => $items, 'metadata' => $metadata];
                    $path = '/v1/transaction:create';
                    $result = $this->request($path, $params);
                    $response = new \Mercari\Merpay\Netpayment\V1\CreateTransactionResponse($result);

                    return $response;
                }

                public function capture(string $transactionId, int $amount): \Mercari\Merpay\Netpayment\V1\CaptureResponse
                {
                    $params = ['transactionId' => $transactionId, 'amount' => $amount];
                    $path = '/v1/transaction:capture';
                    $result = $this->request($path, $params);
                    $response = new \Mercari\Merpay\Netpayment\V1\CaptureResponse($result);

                    return $response;
                }

                public function cancel(string $transactionId): \Mercari\Merpay\Netpayment\V1\CancelResponse
                {
                    $params = ['transactionId' => $transactionId];
                    $path = '/v1/transaction:cancel';
                    $result = $this->request($path, $params);
                    $response = new \Mercari\Merpay\Netpayment\V1\CancelResponse($result);

                    return $response;
                }

                public function refund(string $transactionId, int $amount): \Mercari\Merpay\Netpayment\V1\RefundResponse
                {
                    $params = ['transactionId' => $transactionId, 'amount' => $amount];
                    $path = '/v1/transaction:refund';
                    $result = $this->request($path, $params);
                    $response = new \Mercari\Merpay\Netpayment\V1\RefundResponse($result);

                    return $response;
                }

                public function batchGetTransactions(array $transactionIds): \Mercari\Merpay\Netpayment\V1\BatchGetTransactionsResponse
                {
                    $params = ['transactionIds' => $transactionIds];
                    $path = '/v1/transactions:batchGet';
                    $result = $this->request($path, $params);
                    $response = new \Mercari\Merpay\Netpayment\V1\BatchGetTransactionsResponse($result);

                    return $response;
                }

                public function getTransitionStatus(string $transactionId): \Mercari\Merpay\Netpayment\V1\GetTransitionStatusResponse
                {
                    $params = ['transactionId' => $transactionId];
                    $path = '/v1/transitionStatus:get';
                    $result = $this->request($path, $params);
                    $response = new \Mercari\Merpay\Netpayment\V1\GetTransitionStatusResponse($result);

                    return $response;
                }
            }
}
