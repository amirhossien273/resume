<?php

use App\Http\Controllers\Manage\PageController;
use App\Http\Controllers\Manage\AuthController;
use App\Http\Controllers\Manage\UserController;
use App\Http\Controllers\Manage\CategoryController;
use \App\Http\Controllers\Manage\ProductController;
use \App\Http\Controllers\Manage\AttributeController;
use App\Http\Controllers\Manage\AttributeOptionController;
use App\Http\Controllers\Manage\BannerController;
use App\Http\Controllers\Manage\CityController;
use App\Http\Controllers\Manage\ContractController;
use App\Http\Controllers\Manage\OrderController;
use App\Http\Controllers\Manage\PrivacyPolicyController;
use App\Http\Controllers\Manage\ProductItemController;
use App\Http\Controllers\Manage\ProvinceController;
use App\Http\Controllers\Manage\SettingController;
use App\Http\Controllers\Manage\SliderController;
use App\Http\Controllers\Manage\TagController;
use \App\Http\Controllers\Manage\VariationController;
use App\Http\Controllers\Manage\VariationOptionController;
use App\Http\Controllers\Manage\VoucherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){

    return redirect()->route('manage.page.dashboard');
});

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('auth.show.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');


Route::middleware('auth.admin')->group(function () {

    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('page.dashboard');
    Route::get('/settings', [SettingController::class, 'show'])->name('settings');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/contracts', [ContractController::class, 'index'])->name('contracts');
    Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('privacy-policy');
    Route::post('/privacy-policy', [PrivacyPolicyController::class, 'upsert'])->name('privacy-policy.upsert');

    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{user}/block', [UserController::class, 'block'])->name('users.block');
    Route::get('/users/{user}/unblock', [UserController::class, 'unblock'])->name('users.unblock');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('categories/{category}/toggle-active', [CategoryController::class, 'toggleActive'])->name('categories.toggleActive');

    Route::get('/attributes', [AttributeController::class, 'index'])->name('attributes.index');
    Route::get('/attributes/create', [AttributeController::class, 'create'])->name('attributes.create');
    Route::post('/attributes/store', [AttributeController::class, 'store'])->name('attributes.store');
    Route::get('/attributes/{attribute}/edit', [AttributeController::class, 'edit'])->name('attributes.edit');
    Route::put('/attributes/{attribute}', [AttributeController::class, 'update'])->name('attributes.update');
    Route::delete('/attributes/{attribute}', [AttributeController::class, 'destroy'])->name('attributes.destroy');
    Route::get('attributes/{attribute}/toggle-active', [AttributeController::class, 'toggleActive'])->name('attributes.toggleActive');

    Route::get('/variations', [VariationController::class, 'index'])->name('variations.index');
    Route::get('/variations/create', [VariationController::class, 'create'])->name('variations.create');
    Route::post('/variations/store', [VariationController::class, 'store'])->name('variations.store');
    Route::get('/variations/{variation}/edit', [VariationController::class, 'edit'])->name('variations.edit');
    Route::put('/variations/{variation}', [VariationController::class, 'update'])->name('variations.update');
    Route::delete('/variations/{variation}', [VariationController::class, 'destroy'])->name('variations.destroy');
    Route::get('variations/{variation}/toggle-active', [VariationController::class, 'toggleActive'])->name('variations.toggleActive');

    Route::get('/attribute-options/{attribute}', [AttributeOptionController::class, 'index'])->name('attribute_options.index');
    Route::get('/attribute-options/create/{attribute}', [AttributeOptionController::class, 'create'])->name('attribute_options.create');
    Route::post('/attribute-options/store', [AttributeOptionController::class, 'store'])->name('attribute_options.store');
    Route::get('/attribute-options/{attributeOption}/edit', [AttributeOptionController::class, 'edit'])->name('attribute_options.edit');
    Route::put('/attribute-options/{attributeOption}', [AttributeOptionController::class, 'update'])->name('attribute_options.update');
    Route::delete('/attribute-options/{attributeOption}', [AttributeOptionController::class, 'destroy'])->name('attribute_options.destroy');
    Route::get('attribute-options/{attributeOption}/toggle-active', [AttributeOptionController::class, 'toggleActive'])->name('attribute_options.toggleActive');

    Route::get('/variation-options/{variation}', [VariationOptionController::class, 'index'])->name('variation_options.index');
    Route::get('/variation-options/create/{variation}', [VariationOptionController::class, 'create'])->name('variation_options.create');
    Route::post('/variation-options/store', [VariationOptionController::class, 'store'])->name('variation_options.store');
    Route::get('/variation-options/{variationOption}/edit', [VariationOptionController::class, 'edit'])->name('variation_options.edit');
    Route::put('/variation-options/{variationOption}', [VariationOptionController::class, 'update'])->name('variation_options.update');
    Route::delete('/variation-options/{variationOption}', [VariationOptionController::class, 'destroy'])->name('variation_options.destroy');
    Route::get('variation-options/{variationOption}/toggle-active', [VariationOptionController::class, 'toggleActive'])->name('variation_options.toggleActive');

    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags/store', [TagController::class, 'store'])->name('tags.store');
    Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
    Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
    Route::get('tags/{tag}/toggle-active', [TagController::class, 'toggleActive'])->name('tags.toggleActive');

    Route::get('/provinces', [ProvinceController::class, 'index'])->name('provinces.index');
    Route::get('/provinces/create', [ProvinceController::class, 'create'])->name('provinces.create');
    Route::post('/provinces/store', [ProvinceController::class, 'store'])->name('provinces.store');
    Route::get('/provinces/{province}/edit', [ProvinceController::class, 'edit'])->name('provinces.edit');
    Route::put('/provinces/{province}', [ProvinceController::class, 'update'])->name('provinces.update');
    Route::delete('/provinces/{province}', [ProvinceController::class, 'destroy'])->name('provinces.destroy');
    Route::get('provinces/{province}/toggle-active', [ProvinceController::class, 'toggleActive'])->name('provinces.toggleActive');

    Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
    Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
    Route::post('/cities/store', [CityController::class, 'store'])->name('cities.store');
    Route::get('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');
    Route::put('/cities/{city}', [CityController::class, 'update'])->name('cities.update');
    Route::delete('/cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy');
    Route::get('cities/{city}/toggle-active', [CityController::class, 'toggleActive'])->name('cities.toggleActive');

    Route::get('/vouchers', [VoucherController::class, 'index'])->name('vouchers');
    Route::get('/vouchers/create', [VoucherController::class, 'create'])->name('vouchers.create');
    Route::post('/vouchers/store', [VoucherController::class, 'store'])->name('vouchers.store');
    Route::get('/vouchers/{voucher}/edit', [VoucherController::class, 'edit'])->name('vouchers.edit');
    Route::put('/vouchers/{voucher}', [VoucherController::class, 'update'])->name('vouchers.update');
    Route::delete('/vouchers/{voucher}', [VoucherController::class, 'destroy'])->name('vouchers.destroy');
    Route::get('/vouchers/{voucher}/toggle-active', [VoucherController::class, 'toggleActive'])->name('vouchers.toggleActive');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('products/{product}/toggle-active', [ProductController::class, 'toggleActive'])->name('products.toggleActive');
    Route::get('products/{product}/toggle-show-first-page', [ProductController::class, 'toggleShowFirstPage'])->name('products.toggleShowFirstPage');
    Route::get('products/excle', [ProductController::class, 'excelPage'])->name('products.excel-page');
    Route::get('products/get-excle', [ProductController::class, 'getExcele'])->name('products.get-excle');
    Route::get('products/chnge-price', [ProductController::class, 'chngePrice'])->name('products.chnge-price');

    Route::post('products/{product}/remove-image', [ProductController::class, 'removeImage'])->name('products.removeImage');
    Route::post('products/{product}/reorder-images', [ProductController::class, 'reorderImages'])->name('products.reorderImages');


    Route::get('/product-items/{product}', [ProductItemController::class, 'index'])->name('product_items.index');
    Route::get('/product-items/create/{product}', [ProductItemController::class, 'create'])->name('product_items.create');
    Route::post('/product-items/store', [ProductItemController::class, 'store'])->name('product_items.store');
    Route::get('/product-items/{productItem}/edit', [ProductItemController::class, 'edit'])->name('product_items.edit');
    Route::put('/product-items/{productItem}', [ProductItemController::class, 'update'])->name('product_items.update');
    Route::delete('/product-items/{productItem}', [ProductItemController::class, 'destroy'])->name('product_items.destroy');
    Route::get('product-items/{productItem}/toggle-active', [ProductItemController::class, 'toggleActive'])->name('product_items.toggleActive');

    Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
    Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
    Route::get('/sliders/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
    Route::put('/sliders/{slider}', [SliderController::class, 'update'])->name('sliders.update');
    Route::delete('/sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');

    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners/store', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{banner}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{banner}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');
    Route::get('banners/{banner}/toggle-active', [BannerController::class, 'toggleActive'])->name('banners.toggleActive');

    Route::get('/orders/stata/{status}', [OrderController::class, 'index'])->name('orders.index');
    Route::post('orders/change/{order}', [OrderController::class, 'changeState'])->name('orders.change');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

});
