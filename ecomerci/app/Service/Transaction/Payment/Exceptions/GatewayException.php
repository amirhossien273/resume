<?php

namespace App\Service\Transaction\Payment\Exceptions;

use Exception;

/**
 * This exception when throws, user try to submit a transaction request who submitted before
 */
class GatewayException extends Exception
{
    protected $code = -200;
    protected $message = 'خطای سرویس.';
}
