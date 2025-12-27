<?php

namespace App\Providers;

use App\Service\OTP\OTPService;
use App\Service\OTP\OTPServiceInterface;
use Illuminate\Support\ServiceProvider;

class OTPServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OTPServiceInterface::class, OTPService::class);
    }

}
