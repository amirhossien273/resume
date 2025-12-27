<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfUserBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and if the user is blocked
        if (Auth::check() && Auth::user()->blocked_at !== null) {
            // Log out the user
            Auth::logout();

            // Redirect to login page with a blocked message
            return redirect()->route('manage.auth.login')->with('error' ,'Your account is blocked. Please contact support.');
        }
        
        return $next($request);
    }
}
