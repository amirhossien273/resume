<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Spatie\Activitylog\LogOptions;

class LogSuccessfulLogin
{
  
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;

        // Log the login activity with a custom log name
        activity()
            ->useLog('user')  // Set the custom log name
            ->causedBy($user)
            ->withProperties([
                'ip'         => request()->ip(),
                'user_agent' => request()->userAgent(),
            ])
            ->event('login')
            ->log('user-login');      
    }
}
