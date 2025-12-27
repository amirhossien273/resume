<?php

namespace App\Http\Controllers\Front;

use App\Enums\OrderItemStateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Order\StoreOrderRequest;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentGateway;
use App\Models\ProductItem;
use App\Models\Setting;
use App\Service\Transaction\Payment\Behpardakht\Behpardakht;
use App\Service\Transaction\Payment\PaymentGatewayService;
use App\Service\Transaction\TransactionService;
use Exception;
use Module\Voucher\Src\Models\Voucher;

class OrderController extends Controller
{
    public function index()
    {
        $carts = CartItem::where('creator_id', auth()->user()->id)
        ->with(['productItem' => function($query) {
            $query->with(['product' => function($query) {
                $query->with('media');
            }]);
        }])->get();
        $voucher = null;
        if(request()->has('voucher')){
            $voucher = Voucher::where('code', request()->get('voucher'))->first();
        }
        return view('front.page.checkout', compact('carts', 'voucher'));
    }

    public function store(StoreOrderRequest $request, Behpardakht $behpardakht)
    {
        try{
            $cartItems = auth()->user()->carts()->with("productItem")->get();

            $voucher = null;
            if(request()->has('voucher_code')){
                $voucher = Voucher::where('code', request()->get('voucher_code'))->first();
            }

            $total = 0;
            foreach ($cartItems as $cartItem) {
                $total += $cartItem->quantity * $cartItem->productItem->price;
            }

            if (!is_null($voucher)) {
                session(['voucher_code' => $voucher->code]);
                $total -= $voucher->discount_price ?? 0;
                $total -= ($total * ($voucher->discount_percent ?? 0) / 100);
            }

            $address = Address::query()
            ->where('id', $request->address_id)
            ->with([
                'city',
                'city.province',
            ])->first();
            session(['address' => json_encode($address->toArray())]);

            // If total amount is zero after applying voucher, create order directly
            if ($total <= 0) {
                // Create order with successful payment status
                $order = new Order();
                $order->creator_id = auth()->id();
                $order->address = json_encode($address->toArray());
                $order->voucher_id = $voucher ? $voucher->id : null;
                $order->total_price = $total;
                $order->final_price = 0;
                $order->total_discount_price = $total;
                $order->total_count = $cartItems->sum('quantity');
                $order->shipping_price = 0;
                $order->shipment = 'POST';
                $order->state_enum = OrderItemStateEnum::INITIALIZED;
                $order->save();

                // Create transaction for zero amount order
                $transaction = new \App\Models\Transaction();
                $transaction->order_id = $order->id;
                $transaction->psp = 'FREE';
                $transaction->price = 0;
                $transaction->res_number = 'FREE-' . time() . '-' . $order->id;
                $transaction->ref_number = 'FREE-' . time() . '-' . $order->id;
                $transaction->agent = 'FRONT';
                $transaction->state_enum = 'TRANSACTION_SUCCEED';
                $transaction->succeeded_at = now();
                $transaction->creator_id = auth()->id();
                $transaction->save();

                // Create order items
                foreach ($cartItems as $cartItem) {
                    $productItem = $cartItem->productItem;
                    $product = $productItem->product;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_item_id' => $cartItem->product_item_id,
                        'requested_quantity' => $cartItem->quantity,
                        'sent_quantity' => $cartItem->quantity,
                        'approved_quantity' => $cartItem->quantity,
                        'state_enum' => 'PENDING',
                        'product_title' => $product->title,
                        'product_unit_old_price' => $productItem->price,
                        'product_unit_price' => $productItem->price,
                        'product_total_price' => $cartItem->quantity * $productItem->price,
                        'product_variations' => json_encode($productItem->variations ?? []),
                        'product_images' => json_encode($product->media->pluck('url')->toArray() ?? []),
                        'creator_id' => auth()->id()
                    ]);
                }

                // Clear cart
                CartItem::where('creator_id', auth()->id())->delete();

                return redirect()->route('front.user.orders')->with('success', 'سفارش شما با موفقیت ثبت شد و در انتظار تایید می‌باشد.');
            }

            return $behpardakht->setOrder(1)->setCallback('payment/verify')->setAmont($total)->ready()->redirect();
        } catch(Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
