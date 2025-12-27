<?php

namespace App\Http\Controllers\Manage;

use App\Enums\OrderStateEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the banners.
     *
     * @return \Illuminate\View\View
     */
    public function index($status,Order $order)
    {
        $orders = $order->with('creator')->where('state_enum', $status)->orderBy('created_at', 'desc')->get();
        return view('manage.page.orders.index', compact('orders'));
    }

    /**
     * Display the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        $order = $order->load(['orderItems', 'creator', 'transaction',
         'orderItems.product.variationOptions', 'orderItems.product.variationOptions.variation']);
        return view('manage.page.orders.show', compact('order'));
    }

    public function changeState(Order $order,Request $request)
    {
        $state = $order->state_enum;
        $order->state_enum = $request->state;

        if($request->state == OrderStateEnum::SHIPPED->name){
            $order->post_tracking_code = $request->ship_code;
        }

        $order->save();

        return redirect()->route('manage.orders.index', $state)->with('success', "تغیرات با موفقیت ثبت شد.");
    }
}
