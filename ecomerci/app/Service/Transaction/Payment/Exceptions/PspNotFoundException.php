<?php

namespace App\Service\Transaction\Payment\Exceptions;

class PspNotFoundException extends GatewayException
{

    protected $code = -102;
    protected $message = 'درگاهی برای تراکنش مورد نظر در سایت یافت نشد.';
}
