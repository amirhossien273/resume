<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Contract\ContractFormRequest;
use App\Models\Banner;
use App\Models\Contract;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $sliders = Slider::all();
        $banners = Banner::all();
        $firstPageProducts = Product::where('is_show_first_page', true)
        ->with(['media', 'productItems', 'category'])->get();

        $specialProducts = Product::whereHas('productItems', function ($query) {
                $query->where('is_special', true);
            })->with(['productItems' => function ($query) {
            $query->where('is_special', true);
        }, 'media'])->get();

        $newProducts = Product::whereHas('productItems', function ($query) {
                $query->where('is_new', true);
            })->with(['productItems' => function ($query) {
            $query->where('is_new', true);
        }, 'media'])->get();

        $bestSellerProducts = Product::whereHas('productItems', function ($query) {
                $query->where('is_best_seller', true);
            })->with(['productItems' => function ($query) {
            $query->where('is_best_seller', true);
        }, 'media', 'category'])->get();

        $saleProducts = Product::whereHas('productItems', function ($query) {
            $query->where('is_on_sale', true);
        })->with(['productItems' => function ($query) {
            $query->where('is_on_sale', true);
        }, 'media'])->get();

        return view('front.page.home', compact('sliders',
        'banners',
        'firstPageProducts',
        'specialProducts',
        'newProducts',
        'bestSellerProducts',
        'saleProducts'
    ));
    }

    public function contact()
    {
        return view('front.page.contact');
    }

    public function about()
    {
        return view('front.page.about');
    }

    public function privacyPolicy()
    {
        return view('front.page.privacy-policy');
    }

    public function submitContract(ContractFormRequest $request)
    {
        Contract::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'پیام شما با موفقیت ارسال شد.');
    }
}
