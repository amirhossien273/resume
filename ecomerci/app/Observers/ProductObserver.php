<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param Product $product
     * @return void
     */
    public function created(Product $product)
    {


        try {
            $product->unique_id = "SAMIEATTAR-" . uniqid();
            $product->save();
        } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {
                // Deal with duplicate key error
                $this->created($product);
            }
        }
    }

}
