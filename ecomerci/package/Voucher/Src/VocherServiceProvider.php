<?php

namespace Module\Voucher\Src;

use Illuminate\Support\ServiceProvider;
use Module\Voucher\console\VoucharPublishMigrationCommand;

class VocherServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/voucher.php',
            'voucher'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Config
        $this->publishes([
            __DIR__ . '/../config/voucher.php' => config_path('voucher.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                VoucharPublishMigrationCommand::class
            ]);
        }
    }
}
