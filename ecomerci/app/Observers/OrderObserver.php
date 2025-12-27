<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param Order $order
     * @return void
     */
    public function created(Order $order)
    {


        try {
            $order->unique_id = "SAMIEATTAR-" . uniqid();
            $order->save();
        } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {
                // Deal with duplicate key error
                $this->created($order);
            }
        }
    }

}
