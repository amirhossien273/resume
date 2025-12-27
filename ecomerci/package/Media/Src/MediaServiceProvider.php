<?php

namespace Module\Media\Src;

use Illuminate\Support\ServiceProvider;
use Module\Media\Console\Commands\MediaPublishMigrationCommand;

class MediaServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/media.php',
            'media'
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
            __DIR__ . '/../config/media.php' => config_path('media.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MediaPublishMigrationCommand::class
            ]);
        }
    }
}