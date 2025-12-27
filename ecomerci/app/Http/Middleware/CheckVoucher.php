<?php

namespace App\Http\Middleware;

use App\Models\CartItem;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Module\Voucher\Src\Services\VoucherService;
use Symfony\Component\HttpFoundation\Response;

class CheckVoucher
{
    private $voucherService;
    public function __construct(VoucherService $voucherService)
    {
        $this->voucherService = $voucherService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = auth()->user()->id;
        $cartItems = CartItem::where('creator_id', $userId)
        ->with(['productItem' => function($query) {
            $query->with(['product' => function($query) {
                $query->with('media');
            }]);
        }])->get();

        $order_items = [];
        $total = 0;
        foreach ($cartItems as $cartItem) {

            $total += $cartItem->quantity * $cartItem->productItem->price;
        }
        if($request->has('voucher')){
            $check = $this->voucherService->applyVoucher($request->voucher, $total, $userId);
            if(!$check["status"]){
                
                return redirect()->back()->with("error", $check['message']);
            }
        }
        return $next($request);
    }
}
