<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {

            Route::domain(config('app.base_domain'))
                ->middleware('web')
                ->name('front.')
                ->as('front.')
                ->group(base_path('routes/web/front.php'));

            Route::domain(config('app.manage_domain'))
                ->middleware('web')
                ->name('manage.')
                ->as('manage.')
                ->group(base_path('routes/web/manage.php'));

    }
}
