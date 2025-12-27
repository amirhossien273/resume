<?php

namespace App\Service\Transaction\Payment\Exceptions;

use Exception;

/**
 * This exception when throws, user try to submit a transaction request who submitted before
 */
class BankException extends Exception
{
    protected $code = -100;
    protected $message = 'خطای بانک.';
}
