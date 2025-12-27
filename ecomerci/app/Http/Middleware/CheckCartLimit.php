<?php

namespace App\Http\Middleware;

use App\Models\CartItem;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCartLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $carts = CartItem::where("creator_id", auth()->user()->id)->get();

        if(count($carts) == 0 ) {

            return redirect()->route('front.home');
        }

        return $next($request);
    }
}
