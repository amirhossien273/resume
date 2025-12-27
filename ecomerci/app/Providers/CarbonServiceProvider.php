<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class CarbonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Carbon::setLocale('fa_IR');

        Carbon::macro('jdate', function ($format, $tr_num = 'en') {
            return jdate($format, self::this()->timestamp, '', '', $tr_num);
        });

        Carbon::macro('jmktime', function ($hour = 0, $minute = 0, $second = 0, $month, $day, $year) {
            $timestamp = jmktime($hour, $minute, $second, $month, $day, $year);
            return self::createFromTimestamp($timestamp);
        });
    }
}
