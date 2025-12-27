<?php

namespace App\Service\OTP;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class OTPService implements OTPServiceInterface {

    /**
     * Generate a random OTP (One-Time Password) for a user, hash it, and cache it.
     *
     * @param int $userId The ID of the user for whom the OTP is generated.
     * @param int $minutes The number of minutes to cache the OTP.
     * @return string The generated OTP.
     */
    public function generateOTP(string $phone, int $seconds = 500): string
    {
        $otp = strval(mt_rand(10000, 99999));

        $cacheKey = "otp_{$phone}_plain";
        $hashedOTP = Hash::make($otp);

        Cache::put($cacheKey, $hashedOTP, $seconds);

        return $otp;
    }

    /**
     * Validate an OTP for a specific user.
     *
     * @param int $userId The ID of the user for whom the OTP is validated.
     * @param string $otp The OTP to validate.
     * @return bool True if the OTP is valid, false otherwise.
     */
    public function validateOTP(string $phone, string $otp): bool
    {
        $cacheKey = "otp_{$phone}_plain";

        $cachedOTP = Cache::get($cacheKey);
        return Hash::check($otp, $cachedOTP);
    }

    /**
     * Check if an OTP exists in the cache for a specific user.
     *
     * @param int $userId The ID of the user to check for an OTP.
     * @return bool True if an OTP exists, false otherwise.
     */
    public function otpExists(string $phone): bool
    {
        $cacheKey = "otp_{$phone}_plain";
        return Cache::has($cacheKey);
    }
}