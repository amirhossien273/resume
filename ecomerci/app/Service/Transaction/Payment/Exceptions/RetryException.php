<?php

namespace App\Service\Transaction\Payment\Exceptions;
/**
 * This exception when throws, user try to submit a transaction request who submitted before
 */
class RetryException extends GatewayException
{
    protected $code = -101;
    protected $message = 'نتیجه تراکنش قبلا از طرف بانک اعلام گردیده.';
}
