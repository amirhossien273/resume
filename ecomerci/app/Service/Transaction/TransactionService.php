<?php

namespace App\Service\Transaction;

use App\Models\PaymentGateway;
use App\Service\Transaction\Payment\PaymentGatewayService;

class TransactionService {

    private $payment;

    public function __construct(PaymentGatewayService $payment)
    {
       $this->payment = $payment;
    }

    public function transaction(PaymentGateway $paymentGateway)
    {
      return $this->payment->create($paymentGateway->class);
    }
}