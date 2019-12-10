<?php
namespace Mercari\Merpay\Netpayment\V1 {
    class DeliveryAddress
    {
        /** @var int */
        public $id;
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
        /** @var bool  デフォルトの配送先か
         */
        public $isDefault;
        public function __construct($result)
        {
            $this->id = $result->id;
            $this->familyName = $result->familyName;
            $this->firstName = $result->firstName;
            $this->familyNameKana = $result->familyNameKana;
            $this->firstNameKana = $result->firstNameKana;
            $this->telephone = $result->telephone;
            $this->zipCode1 = $result->zipCode1;
            $this->zipCode2 = $result->zipCode2;
            $this->prefecture = $result->prefecture;
            $this->city = $result->city;
            $this->address1 = $result->address1;
            $this->address2 = $result->address2;
            $this->isDefault = $result->isDefault;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class Item
    {
        /** @var string */
        public $name;
        /** @var int */
        public $unitPrice;
        /** @var int */
        public $quantity;
        /** @var \stdClass */
        public $metadata;
        /** @var string */
        public $categoryId;
        public function __construct($result)
        {
            $this->name = $result->name;
            $this->unitPrice = $result->unitPrice;
            $this->quantity = $result->quantity;
            $this->metadata = $result->metadata;
            $this->categoryId = $result->categoryId;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class GetOrderDetailRequest
    {
        /** @var string */
        public $transactionId;
        public function __construct($result)
        {
            $this->transactionId = $result->transactionId;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class GetOrderDetailResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        /** @var string */
        public $transactionId;
        /** @var string */
        public $orderName;
        /** @var string */
        public $orderImageUrl;
        /** @var int */
        public $amount;
        /** @var bool */
        public $useShippingFee;
        /** @var bool */
        public $isFixedShippingFee;
        /** @var int  shipping_fee is determined when the transaction was created if `is_fixed_shipping_fee` is true.
         */
        public $shippingFee;
        /** @var int */
        public $paymentContractType;
        /** @var array  ユーザが利用できる支払い手段のリスト
         */
        public $availablePaymentMethods;
        /** @var bool */
        public $useDeliveryAddress;
        /** @var array */
        public $deliveryAddresses;
        /** @var string */
        public $cancelUrl;
        /** @var bool */
        public $prepaidPointUnavailable;
        /** @var bool */
        public $freePointUnavailable;
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
            $this->transactionId = $result->transactionId;
            $this->orderName = $result->orderName;
            $this->orderImageUrl = $result->orderImageUrl;
            $this->amount = $result->amount;
            $this->useShippingFee = $result->useShippingFee;
            $this->isFixedShippingFee = $result->isFixedShippingFee;
            $this->shippingFee = $result->shippingFee;
            $this->paymentContractType = $result->paymentContractType;
            $this->availablePaymentMethods = $result->availablePaymentMethods ? array_map(function ($item) {
                return new \Mercari\Merpay\Netpayment\V1\GetOrderDetailResponse\AvailablePaymentMethod($item);
            }, $result->availablePaymentMethods) : null;
            $this->useDeliveryAddress = $result->useDeliveryAddress;
            $this->deliveryAddresses = $result->deliveryAddresses ? array_map(function ($item) {
                return new \Mercari\Merpay\Netpayment\V1\DeliveryAddress($item);
            }, $result->deliveryAddresses) : null;
            $this->cancelUrl = $result->cancelUrl;
            $this->prepaidPointUnavailable = $result->prepaidPointUnavailable;
            $this->freePointUnavailable = $result->freePointUnavailable;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1\GetOrderDetailResponse {
    class AvailablePaymentMethod
    {
        /** @var \Mercari\Merpay\Netpayment\V1\GetOrderDetailResponse\Balance */
        public $balance;
        /** @var \Mercari\Merpay\Netpayment\V1\GetOrderDetailResponse\Deferred */
        public $deferred;
        public function __construct($result)
        {
            $this->balance = $result->balance ? new \Mercari\Merpay\Netpayment\V1\GetOrderDetailResponse\Balance($result->balance) : null;
            $this->deferred = $result->deferred ? new \Mercari\Merpay\Netpayment\V1\GetOrderDetailResponse\Deferred($result->deferred) : null;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1\GetOrderDetailResponse {
    class Balance
    {
        public function __construct($result)
        {
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1\GetOrderDetailResponse {
    class Deferred
    {
        public function __construct($result)
        {
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class UpdateDeliveryAddressRequest
    {
        /** @var string */
        public $transactionId;
        /** @var int  from mercari
         */
        public $deliveryAddressId;
        public function __construct($result)
        {
            $this->transactionId = $result->transactionId;
            $this->deliveryAddressId = $result->deliveryAddressId;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class UpdateDeliveryAddressResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        /** @var string */
        public $transactionId;
        /** @var int */
        public $shippingFee;
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
            $this->transactionId = $result->transactionId;
            $this->shippingFee = $result->shippingFee;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class ConfirmRequest
    {
        /** @var string */
        public $transactionId;
        /** @var \Mercari\Merpay\Netpayment\V1\ConfirmRequest\PaymentMethod */
        public $paymentMethod;
        public function __construct($result)
        {
            $this->transactionId = $result->transactionId;
            $this->paymentMethod = $result->paymentMethod ? new \Mercari\Merpay\Netpayment\V1\ConfirmRequest\PaymentMethod($result->paymentMethod) : null;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class ConfirmResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        /** @var string */
        public $transactionId;
        /** @var string */
        public $returnUrl;
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
            $this->transactionId = $result->transactionId;
            $this->returnUrl = $result->returnUrl;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class InvalidateTransactionRequest
    {
        /** @var string */
        public $transactionId;
        public function __construct($result)
        {
            $this->transactionId = $result->transactionId;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class InvalidateTransactionResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class IdentifyQRCodeTypeRequest
    {
        /** @var string  is payload contained in a QR Code
         */
        public $payload;
        public function __construct($result)
        {
            $this->payload = $result->payload;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class IdentifyQRCodeTypeResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        /** @var int */
        public $type;
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
            $this->type = $result->type;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class CreateTransactionRequest
    {
        /** @var string  A unique id generated by the external-partner-server.
         */
        public $orderId;
        /** @var string  The name of this order which is displayed at the order screen on the mercari-app.
         */
        public $orderName;
        /** @var string  The icon-image of this order which is displayed at the order screen on the mercari-app.
         */
        public $orderImageUrl;
        /** @var int
         */
        public $amount;
        /** @var bool  If the `use_delivery_address` is true, the delivery address of a user will be sent to external-partner-server.
         */
        public $useDeliveryAddress;
        /** @var bool  If the `is_fixed_shipping_fee` is true, the shipping fee will be displayed on the mercari-app.
         */
        public $useShippingFee;
        /** @var bool  If the `is_fixed_shipping_fee` is true, the shipping fee is determined statically.
         */
        public $isFixedShippingFee;
        /** @var int  fixed_shipping_fee is used if the `is_fixed_shipping_fee` value is true.
         */
        public $fixedShippingFee;
        /** @var string  shipping_fee_url is used to let the external-partner-server calculate the shipping-fee by a delivery address.
         */
        public $shippingFeeUrl;
        /** @var string  confirm_url is used to let the external-partner-server check the payment.
         */
        public $confirmUrl;
        /** @var string  completion_url is used to notify completion of the payment to external-partner-server from the merpay-server.
         */
        public $completionUrl;
        /** @var string  cancel_url is used to return to original site from the order screen on the mercari-app.
         */
        public $cancelUrl;
        /** @var string  return_url is used to return to original site after the payment is completed.
         */
        public $returnUrl;
        /** @var int
         */
        public $paymentContractType;
        /** @var bool  true means to do Capture immediately
         */
        public $capture;
        /** @var array  items are used to link with mercari catalog data
         */
        public $items;
        /** @var \stdClass  Attributes for the transaction.
         */
        public $metadata;
        public function __construct($result)
        {
            $this->orderId = $result->orderId;
            $this->orderName = $result->orderName;
            $this->orderImageUrl = $result->orderImageUrl;
            $this->amount = $result->amount;
            $this->useDeliveryAddress = $result->useDeliveryAddress;
            $this->useShippingFee = $result->useShippingFee;
            $this->isFixedShippingFee = $result->isFixedShippingFee;
            $this->fixedShippingFee = $result->fixedShippingFee;
            $this->shippingFeeUrl = $result->shippingFeeUrl;
            $this->confirmUrl = $result->confirmUrl;
            $this->completionUrl = $result->completionUrl;
            $this->cancelUrl = $result->cancelUrl;
            $this->returnUrl = $result->returnUrl;
            $this->paymentContractType = $result->paymentContractType;
            $this->capture = $result->capture;
            $this->items = $result->items ? array_map(function ($item) {
                return new \Mercari\Merpay\Netpayment\V1\Item($item);
            }, $result->items) : null;
            $this->metadata = $result->metadata;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class CreateTransactionResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        /** @var string */
        public $transactionId;
        /** @var string  payment_url is a deeplink to launch mercari-app (a transaction_id is included as a query parameter)
         */
        public $paymentUrl;
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
            $this->transactionId = $result->transactionId;
            $this->paymentUrl = $result->paymentUrl;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class CaptureRequest
    {
        /** @var string */
        public $transactionId;
        /** @var int */
        public $amount;
        public function __construct($result)
        {
            $this->transactionId = $result->transactionId;
            $this->amount = $result->amount;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class CaptureResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        /** @var string */
        public $transactionId;
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
            $this->transactionId = $result->transactionId;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class CancelRequest
    {
        /** @var string */
        public $transactionId;
        public function __construct($result)
        {
            $this->transactionId = $result->transactionId;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class CancelResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        /** @var string */
        public $transactionId;
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
            $this->transactionId = $result->transactionId;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class RefundRequest
    {
        /** @var string */
        public $transactionId;
        /** @var int */
        public $amount;
        public function __construct($result)
        {
            $this->transactionId = $result->transactionId;
            $this->amount = $result->amount;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class RefundResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        /** @var string */
        public $transactionId;
        /** @var string */
        public $refundTransactionId;
        /** @var string */
        public $inquiryCode;
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
            $this->transactionId = $result->transactionId;
            $this->refundTransactionId = $result->refundTransactionId;
            $this->inquiryCode = $result->inquiryCode;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class GetTransactionRequest
    {
        /** @var string */
        public $transactionId;
        public function __construct($result)
        {
            $this->transactionId = $result->transactionId;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class GetTransactionResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        /** @var string */
        public $transactionId;
        /** @var string */
        public $orderId;
        /** @var string */
        public $orderName;
        /** @var string */
        public $orderImageUrl;
        /** @var string */
        public $partnerId;
        /** @var string */
        public $brandId;
        /** @var string */
        public $shopId;
        /** @var int */
        public $mercariUserId;
        /** @var int */
        public $amount;
        /** @var bool */
        public $useDeliveryAddress;
        /** @var bool */
        public $useShippingFee;
        /** @var bool */
        public $isFixedShippingFee;
        /** @var int */
        public $fixedShippingFee;
        /** @var int */
        public $deliveryAddressId;
        /** @var string */
        public $shippingFeeUrl;
        /** @var string */
        public $confirmUrl;
        /** @var string */
        public $completionUrl;
        /** @var string */
        public $cancelUrl;
        /** @var string */
        public $returnUrl;
        /** @var int */
        public $paymentContractType;
        /** @var bool */
        public $capture;
        /** @var int */
        public $transitionStatus;
        /** @var array */
        public $items;
        /** @var \stdClass */
        public $metadata;
        /** @var DateTime */
        public $createdAt;
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
            $this->transactionId = $result->transactionId;
            $this->orderId = $result->orderId;
            $this->orderName = $result->orderName;
            $this->orderImageUrl = $result->orderImageUrl;
            $this->partnerId = $result->partnerId;
            $this->brandId = $result->brandId;
            $this->shopId = $result->shopId;
            $this->mercariUserId = $result->mercariUserId;
            $this->amount = $result->amount;
            $this->useDeliveryAddress = $result->useDeliveryAddress;
            $this->useShippingFee = $result->useShippingFee;
            $this->isFixedShippingFee = $result->isFixedShippingFee;
            $this->fixedShippingFee = $result->fixedShippingFee;
            $this->deliveryAddressId = $result->deliveryAddressId;
            $this->shippingFeeUrl = $result->shippingFeeUrl;
            $this->confirmUrl = $result->confirmUrl;
            $this->completionUrl = $result->completionUrl;
            $this->cancelUrl = $result->cancelUrl;
            $this->returnUrl = $result->returnUrl;
            $this->paymentContractType = $result->paymentContractType;
            $this->capture = $result->capture;
            $this->transitionStatus = $result->transitionStatus;
            $this->items = $result->items ? array_map(function ($item) {
                return new \Mercari\Merpay\Netpayment\V1\Item($item);
            }, $result->items) : null;
            $this->metadata = $result->metadata;
            $this->createdAt = $result->createdAt ? new \DateTime($result->createdAt) : null;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class GetTransitionStatusRequest
    {
        /** @var string */
        public $transactionId;
        public function __construct($result)
        {
            $this->transactionId = $result->transactionId;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class GetTransitionStatusResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        /** @var string */
        public $transactionId;
        /** @var int  represents a status associated with the screen transition. (it's different from payment statuses)
         */
        public $transitionStatus;
        /** @var string */
        public $cancelUrl;
        /** @var string */
        public $returnUrl;
        /** @var DateTime  the time when an OrderDetail record was created
         */
        public $createdAt;
        /** @var DateTime  the current server time that can be used to calculate the elapsed time from created_at on front end
         */
        public $serverTime;
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
            $this->transactionId = $result->transactionId;
            $this->transitionStatus = $result->transitionStatus;
            $this->cancelUrl = $result->cancelUrl;
            $this->returnUrl = $result->returnUrl;
            $this->createdAt = $result->createdAt ? new \DateTime($result->createdAt) : null;
            $this->serverTime = $result->serverTime ? new \DateTime($result->serverTime) : null;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class BatchGetTransactionsRequest
    {
        /** @var array */
        public $transactionIds;
        public function __construct($result)
        {
            $this->transactionIds = $result->transactionIds;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class BatchGetTransactionsResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        /** @var array */
        public $transactions;
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
            $this->transactions = $result->transactions ? array_map(function ($item) {
                return new \Mercari\Merpay\Netpayment\V1\BatchGetTransactionsResponse\Transaction($item);
            }, $result->transactions) : null;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1\BatchGetTransactionsResponse {
    class Transaction
    {
        /** @var string */
        public $transactionId;
        /** @var int */
        public $type;
        /** @var \Mercari\Merpay\Netpayment\V1\BatchGetTransactionsResponse\TransactionPayment */
        public $payment;
        /** @var \Mercari\Merpay\Netpayment\V1\BatchGetTransactionsResponse\TransactionRefund */
        public $refund;
        public function __construct($result)
        {
            $this->transactionId = $result->transactionId;
            $this->type = $result->type;
            $this->payment = $result->payment ? new \Mercari\Merpay\Netpayment\V1\BatchGetTransactionsResponse\TransactionPayment($result->payment) : null;
            $this->refund = $result->refund ? new \Mercari\Merpay\Netpayment\V1\BatchGetTransactionsResponse\TransactionRefund($result->refund) : null;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1\BatchGetTransactionsResponse {
    class TransactionPayment
    {
        /** @var string */
        public $orderId;
        /** @var int */
        public $authorizedAmount;
        /** @var int */
        public $capturedAmount;
        /** @var int */
        public $canceledAmount;
        /** @var int */
        public $status;
        /** @var DateTime */
        public $authorizedAt;
        /** @var DateTime */
        public $capturedAt;
        /** @var DateTime */
        public $canceledAt;
        public function __construct($result)
        {
            $this->orderId = $result->orderId;
            $this->authorizedAmount = $result->authorizedAmount;
            $this->capturedAmount = $result->capturedAmount;
            $this->canceledAmount = $result->canceledAmount;
            $this->status = $result->status;
            $this->authorizedAt = $result->authorizedAt ? new \DateTime($result->authorizedAt) : null;
            $this->capturedAt = $result->capturedAt ? new \DateTime($result->capturedAt) : null;
            $this->canceledAt = $result->canceledAt ? new \DateTime($result->canceledAt) : null;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1\BatchGetTransactionsResponse {
    class TransactionRefund
    {
        /** @var int */
        public $amount;
        /** @var DateTime */
        public $refundedAt;
        public function __construct($result)
        {
            $this->amount = $result->amount;
            $this->refundedAt = $result->refundedAt ? new \DateTime($result->refundedAt) : null;
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class PingRequest
    {
        public function __construct($result)
        {
        }
    }
}
namespace Mercari\Merpay\Netpayment\V1 {
    class PingResponse extends \Mercari\Merpay\Netpayment\RequestResponse
    {
        public function __construct($result)
        {
            parent::__construct($result);
            if ($this->error() !== null) {
                return;
            }
        }
    }
}
