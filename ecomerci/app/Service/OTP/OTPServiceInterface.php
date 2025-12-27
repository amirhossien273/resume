<?php

namespace App\Service\OTP;

interface OTPServiceInterface {

    public function generateOTP(string $phone, int $seconds = 500): string;
    public function validateOTP(string $phone, string $otp): bool;
    public function otpExists(string $phone): bool;
}