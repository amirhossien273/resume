<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\OTP\SendOTPWithSms;

class OTPController extends Controller
{
    protected $otpService;

    public function __construct(SendOTPWithSms $otpService)
    {
        $this->otpService = $otpService;
    }

    public function generate()
    {
        if($this->otpService->handle(auth()->user())){
            return redirect()->back()->with('success', __('messages.sms.success'));
        }

        return redirect()->back()->with('error', __('messages.sms.error'));
    }
}
