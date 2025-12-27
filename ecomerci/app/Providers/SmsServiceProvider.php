<?php

namespace App\Providers;

use App\Service\SMS\Kavenegar\SendWithKavengarService;
use App\Service\SMS\SendMessageInterface;
use App\Service\SMS\SendMessageService;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SendMessageInterface::class, function($app) {
            return SendMessageService::create(new SendWithKavengarService());
        });

    }


}
