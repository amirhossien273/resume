<?php

namespace App\Http\Middleware;

use App\Models\ProductItem;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaxBasketLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $productItem = ProductItem::find($request->product_item_id);
    
        if($productItem->max_basket_limit !== null && $request->quantity > $productItem->max_basket_limit) {

            return redirect()->back()->with('error', __('messages.cart.max_basket_limit', ['max_basket_limit' => $productItem->max_basket_limit]));
        }
        return $next($request);
    }
}
