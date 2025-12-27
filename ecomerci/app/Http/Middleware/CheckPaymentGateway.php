<?php

namespace App\Http\Middleware;

use App\Models\PaymentGateway;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPaymentGateway
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $paymentGateway = PaymentGateway::query()->where('is_active', true)->find($request->payment_gateway_id);
        if (!$paymentGateway) {

            return redirect()->back()->with("error", __("messages.paymentGateway.is_not_active"));
        }

        return $next($request);
    }
}
