<?php

use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\CaptchaController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\PaymentController;
use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/captcha', [CaptchaController::class, 'generateCaptcha'])->name('captcha.generate');

Route::prefix('auth')->group(function () {

    Route::get('login',[AuthController::class,'showLogin'])->name('auth.login');
    Route::post('login',[AuthController::class,'login']);
    Route::get('register',[AuthController::class,'showRegister'])->name('auth.register');
    Route::post('register',[AuthController::class,'register']);
    Route::get('forgot-password',[AuthController::class,'showForgotPassword'])->name('auth.forgot-password');
    Route::post('forgot-password',[AuthController::class,'forgotPassword']);
    Route::get('reset-password',[AuthController::class,'resetPassword'])->name('auth.reset-password');
    Route::get('phone-verified-forget-password',[AuthController::class,'showPhoneVerifiedForgetPassword'])->name('auth.phone-verified-forget-password');
    Route::post('phone-verified-forget-password',[AuthController::class,'phoneVerifiedForgetPassword']);

    Route::get('phone-verified',[AuthController::class,'showPhoneVerified'])->name('auth.phone-verified');
    Route::post('phone-verified',[AuthController::class,'phoneVerified']);

    Route::middleware(['auth.customer'])->group(function () {

        Route::get('logout', [AuthController::class,'logout'])->name('auth.logout');
    });
});


Route::middleware(['auth.customer', 'phone.verified'])->group(function () {

    Route::get('/user/profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('/user/orders',[UserController::class,'profile'])->name('user.orders');
    Route::get('/user/address',[UserController::class,'profile'])->name('user.address');
    Route::get('/user/address/create',[UserController::class,'profile'])->name('user.address.create');
    Route::get('/user/account',[UserController::class,'profile'])->name('user.account');

    Route::post('/user/profile',[UserController::class,'update'])->name('user.update');
    Route::post('/user/addresses',[UserController::class,'addAddress'])->name('user.addresses.store');
    Route::put('/user/addresses/{address}', [UserController::class, 'updateAddress'])->name('user.addresses.update');
    Route::delete('/user/addresses/{id}', [UserController::class, 'destroyAddress'])->name('user.addresses.destroy');


    Route::middleware(['cart_limit', 'voucher'])->get('/cart',[CartController::class,'index'])->name('cart');
    Route::middleware('max_basket_limit')->post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::middleware('max_basket_limit')->post('/cart-ajax', [CartController::class, 'storeAjax'])->name('cart.store-ajax');
    Route::middleware('cart_limit')->get('/cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::middleware('cart_limit')->get('/cart/remove-all', [CartController::class, 'destroyAllByCreator'])->name('cart.remove_all');

    Route::middleware(['cart_limit', 'voucher', 'minCartPrice'])->get('/checkout',[OrderController::class,'index'])->name('checkout.index');
     Route::middleware(['cart_limit', 'active.paymentgateway', 'minCartPrice'])->post('/checkout',[OrderController::class,'store'])->name('order.store');

    Route::post('payment/verify', [PaymentController::class, 'verify'])->name('payment.verify');

});

Route::get('/',[PageController::class,'home'])->name('home');
Route::get('/contact',[PageController::class,'contact'])->name('contact');
Route::post('/submit-contract', [PageController::class, 'submitContract'])->name('contract.submit');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy');

Route::get('/about',[PageController::class,'about'])->name('about');

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/amazing',[ProductController::class,'amazing'])->name('product.amazing');
Route::get('/product/{slug}',[ProductController::class,'indexWithCategory'])->name('product.index_with_category');
Route::get('/product/show/{unique_id}/{slug}',[ProductController::class,'show'])->name('product.show');
Route::get('/product/tags/{tag}',[ProductController::class,'tags'])->name('product.tags');
