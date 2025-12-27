<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Listeners\SendOTPWithSmsListeners;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class OTPEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserRegistered::class => [
            SendOTPWithSmsListeners::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        User::created(function ($user) {
            if ($user->role === 'customer' && is_null($user->phone_verified_at)) {
                event(new UserRegistered($user));
            }
        });

        view()->composer('*', function ($view) {
            if(Auth::check() && Auth::user()->role === 'customer' && is_null(Auth::user()->phone_verified_at)){
                event(new UserRegistered(auth()->user()));
            }
        });
    }
}
