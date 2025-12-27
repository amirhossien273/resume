<?php

namespace App\Service\OTP;

use App\Service\SMS\Kavenegar\SendWithKavengarService;
use App\Service\SMS\SendMessageInterface;

class SendOTPWithSms  {

    private $sendMessageService;
    private $otpService;

    public function __construct(SendWithKavengarService $sendMessageService, OTPServiceInterface $otpService)
    {
        $this->sendMessageService = $sendMessageService;
        $this->otpService = $otpService;
    }

    public function handle($user, string $template)
    {

        if(!$this->otpService->otpExists($user->phone)){

            $OTP = $this->otpService->generateOTP($user->phone);
            $this->sendMessageService->send($user->phone, $OTP, $template);
         }
    }
}
