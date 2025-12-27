<?php

namespace App\Service\Transaction\Payment;

use App\Models\PaymentGateway;

class PaymentGatewayService {

    /**
     * Creates an instance of the specified payment service.
     *
     * This method checks if the specified service class exists and implements the PaymentInterface.
     * If the service class is valid, it returns an instance of the service.
     *
     * @param PaymentGateway $paymentGateway The payment gateway model containing the service class.
     * @return PaymentInterface The instantiated payment service.
     * @throws \Exception If the service class does not exist or does not implement PaymentInterface.
     */
    public function create(PaymentGateway $paymentGateway)
    {
        if (class_exists($paymentGateway->service)) {

            $service = app($paymentGateway->service);
            if ($service instanceof PaymentInterface) {
                return $service;
            }
        } else {
            throw new \Exception("Service class {$paymentGateway->service} does not exist.");
        }
    }
}