<?php

namespace App\Service\Transaction\Payment;

use Illuminate\Http\Request;

interface PaymentInterface {

    /**
     * Initiate a payment process.
     *
     * This method will be responsible for initiating the payment process.
     * It will receive an array of data containing the necessary information 
     * for the payment, such as amount, currency, and other required details.
     *
     * @param array $data The data required to process the payment.
     * @return mixed The response from the payment gateway or processing logic.
     */
    public function payment(array $data);

    /**
     * Verify the payment after the process.
     *
     * This method will be responsible for verifying the payment status after 
     * the payment process has been initiated. It typically involves checking 
     * the payment gateway's response to confirm if the payment was successful.
     * It receives an HTTP request which contains the verification data from 
     * the payment gateway.
     *
     * @param Request $request The HTTP request containing the verification data.
     * @return mixed The response after verifying the payment status.
     */
    public function paymentVerify(Request $request);
}