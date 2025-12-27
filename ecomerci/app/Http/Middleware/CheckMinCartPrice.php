<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckMinCartPrice
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $minCartPrice  = setting('minCartPrice');

        $cartTotal = auth()->user()->carts()->with('productItem')->get()->sum(function ($cartItem) {
            return $cartItem->quantity * ($cartItem->productItem->price ?? 0);
        });

        if ($cartTotal < $minCartPrice) {
            return redirect()->back()
            ->with("error", 'حداقل مبلغ خرید باید ' . number_format($minCartPrice) . ' تومان باشد.');
        }

        return $next($request);
    }
}
