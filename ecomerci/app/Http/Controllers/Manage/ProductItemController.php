<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\Product\StoreProductRequest;
use App\Http\Requests\Manage\Product\UpdateProductRequest;
use App\Http\Requests\Manage\ProductItem\StoreProductItemRequest;
use App\Http\Requests\Manage\ProductItem\UpdateProductItemRequest;
use App\Models\Product;
use App\Models\ProductItem;
use App\Models\Variation;
use App\Models\VariationOption;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class ProductItemController extends Controller
{
    public function index(Product $product)
    {
        $productItems = ProductItem::where('product_id', $product->id)
        ->with('product', 'variationOptions', 'variationOptions.variation')
        ->get();
        return view('manage.page.product_items.index', compact('productItems', 'product'));
    }

    public function create()
    {
        $variations = Variation::with('variationOptions')->orderBy('show_order')->get();
        return view('manage.page.product_items.create', compact('variations'));
    }

    public function store(StoreProductItemRequest $request)
    {
        $productItem = ProductItem::create([
            'product_id'          => $request->product_id,
            'state_enum'          => 'PENDING',
            'reject_reason'       => $request->reject_reason,
            'price'               => $request->price,
            'strikethrough_price' => $request->strikethrough_price,
            'quantity'            => $request->quantity,
            'consign_quantity'    => $request->consign_quantity,
            'total_quantity'      => $request->total_quantity,
            'max_basket_limit'    => $request->max_basket_limit,
            'is_available'        => $request->is_available,
            'is_special'          => $request->is_special,
            'is_new'              => $request->is_new,
            'is_best_seller'      => $request->is_best_seller,
            'is_on_sale'          => $request->is_on_sale,
            'box'                 => $request->box,
            'show_order'          => $request->show_order,
        ]);

        if ($request->has('variation_ids')) {
            $productItem->variationOptions()->sync($request->input('variation_ids'));
        }

        return redirect()->route('manage.product_items.index', $productItem->product_id)->with('success',  __('messages.created'));
    }

    public function edit(ProductItem $productItem)
    {
        $variations = Variation::with('variationOptions')->orderBy('show_order')->get();
        return view('manage.page.product_items.edit', compact('productItem', 'variations'));
    }

    public function update(UpdateProductItemRequest $request, ProductItem $productItem)
    {
        $productItem->update([
            'product_id'          => $request->product_id,
            'state_enum'          => $request->state_enum,
            'reject_reason'       => $request->reject_reason,
            'price'               => $request->price,
            'strikethrough_price' => $request->strikethrough_price,
            'quantity'            => $request->quantity,
            'consign_quantity'    => $request->consign_quantity,
            'total_quantity'      => $request->total_quantity,
            'max_basket_limit'    => $request->max_basket_limit,
            'is_available'        => $request->is_available,
            'is_special'          => $request->is_special,
            'is_new'              => $request->is_new,
            'is_best_seller'      => $request->is_best_seller,
            'is_on_sale'          => $request->is_on_sale,
            'box'                 => $request->box,
            'show_order'          => $request->show_order,
        ]);

        if ($request->has('variation_ids')) {
            $productItem->variationOptions()->sync($request->input('variation_ids'));
        }

        return redirect()->route('manage.product_items.index', $productItem->product_id)->with('success',  __('messages.updated'));
    }

    public function destroy(ProductItem $productItem)
    {
        $productItem->delete();

        return redirect()->route('manage.product_items.index', $productItem->product_id)->with('success', __('messages.deleted'));
    }

    public function toggleActive(ProductItem $productItem)
    {
        $productItem->is_active = !$productItem->is_active;
        $productItem->save();

        return redirect()->route('manage.product_items.index', $productItem->product_id)->with('success',  __('messages.status'));
    }
}
