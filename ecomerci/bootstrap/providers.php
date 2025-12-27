<?php


return [
    App\Providers\AppServiceProvider::class,
    App\Providers\CaptchaServiceProvider::class,
    App\Providers\CarbonServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\OTPEventServiceProvider::class,
    App\Providers\OTPServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    App\Providers\SMSServiceProvider::class,
    Spatie\Activitylog\ActivitylogServiceProvider::class,
    \Module\Media\Src\MediaServiceProvider::class,
    \Module\Voucher\Src\VocherServiceProvider::class
];
