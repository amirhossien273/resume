<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductItem;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::with(['media'=> function ($query) {
            $query->orderBy('order');
        }, 'productItems', 'category']);

        if ($request->has('search') && $request->get('search') != "") {
            $products = $products->where('title', 'like', '%' . $request->get('search') . '%');
        }

        if ($request->has('category_id') && $request->get('category_id') != "") {
            $products = $products->where('category_id', $request->get('category_id'));
        }

        $products = $products->orderByRaw('
        CASE
            WHEN EXISTS (SELECT 1 FROM product_items WHERE product_items.product_id = products.id) THEN 0
            ELSE 1
        END,
        (SELECT id FROM product_items WHERE product_items.product_id = products.id ORDER BY id DESC LIMIT 1) DESC
    ')->paginate(20);
        $category = "undefined";

        return view('front.page.product.index', compact('products', 'category'));
    }

    public function indexWithCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::with(['media'=> function ($query) {
            $query->orderBy('order');
        }, 'productItems' => function ($query) {
            $query->where('is_available', 1);  
        }, 'category'])
            ->orderByRaw('
                    CASE
                        WHEN EXISTS (SELECT 1 FROM product_items WHERE product_items.product_id = products.id) THEN 0
                        ELSE 1
                    END,
                    (SELECT id FROM product_items WHERE product_items.product_id = products.id ORDER BY id DESC LIMIT 1) DESC
                ')
            ->where('category_id', $category?->id)->paginate(20);

        return view('front.page.product.index', compact('products', 'category'));
    }

    public function show(Request $request, $unique_id, $slug)
    {
        $product = Product::where('unique_id', $unique_id)
            ->with(['productItems' => function ($query) {
                  $query->where('is_available', 1);  
                },'media'=> function ($query) {
                $query->orderBy('order');
            }])
            ->firstOrFail();

            $products = Product::where('category_id', $product->category_id)
            ->with(['productItems' => function ($query) {
                  $query->where('is_available', 1);  
                },'media' => function ($query) {
                $query->orderBy('order');
            }])
            ->limit(4) 
            ->get();

        $productItem = null;
        if (!empty($product->productItems) && isset($product->productItems[0])) {
            $productItem = $product->productItems[0];
        }

        if ($request->has('productItem')) {
            $productItem = ProductItem::find($request->productItem);
        }

        return view('front.page.product.show', compact('product', 'products', 'productItem'));
    }

    public function amazing()
    {
        $products = Product::whereHas('tags', function ($query) {
            $query->where('tag_id', 120);
        })->with(['media'=> function ($query) {
            $query->orderBy('order');
        }, 'productItems', 'category'])
            ->orderByRaw('
            CASE
                WHEN EXISTS (SELECT 1 FROM product_items WHERE product_items.product_id = products.id) THEN 0
            ELSE 1
                END,
            (SELECT id FROM product_items WHERE product_items.product_id = products.id ORDER BY id DESC LIMIT 1) DESC
        ')
            ->get();

        return view('front.page.product.amazing', compact('products'));
    }

    public function tags(Tag $tag)
    {
        $products = $tag->products()->with(['media'=> function ($query) {
            $query->orderBy('order');
        }, 'productItems', 'category'])
            ->orderByRaw('
            CASE
                WHEN EXISTS (SELECT 1 FROM product_items WHERE product_items.product_id = products.id) THEN 0
            ELSE 1
                END,
            (SELECT id FROM product_items WHERE product_items.product_id = products.id ORDER BY id DESC LIMIT 1) DESC
        ')
            ->get();

        return view('front.page.product.tags', compact('products'));
    }
}
