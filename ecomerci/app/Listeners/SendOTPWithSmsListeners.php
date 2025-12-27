<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Service\OTP\SendOTPWithSms;
use Illuminate\Support\Facades\Cache;

class SendOTPWithSmsListeners
{
    private $sendOTPWithSms;

    public function __construct(SendOTPWithSms $sendOTPWithSms)
    {
        $this->sendOTPWithSms = $sendOTPWithSms;
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
            
        $this->sendOTPWithSms->handle($event->user, "register");
    }
}
