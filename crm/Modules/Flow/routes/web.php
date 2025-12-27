<?php

use Illuminate\Support\Facades\Route;
use Modules\Flow\App\Http\Controllers\FlowController;
use Modules\Flow\App\Http\Controllers\FlowableController;
use Modules\Flow\App\Http\Controllers\FlowTaskTitleRuleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::prefix('flows')->middleware(['auth'])->name('flows.')->group(function() {
    Route::prefix('rules')->name('rules.')->group(function () {
        Route::get('/', [FlowTaskTitleRuleController::class, 'index'])->name('index');
        Route::post('/', [FlowTaskTitleRuleController::class, 'store'])->name('store');
        Route::put('/{rule}', [FlowTaskTitleRuleController::class, 'update'])->name('update');
        Route::delete('/{rule}', [FlowTaskTitleRuleController::class, 'destroy'])->name('destroy');
    });
    // مسیرهای ثابت اول
    Route::get('/', [FlowController::class, 'index'])->name('index');
    Route::get('/create', [FlowController::class, 'create'])->name('create');
    Route::post('/', [FlowController::class, 'store'])->name('store');
    Route::post('/assign', [FlowableController::class, 'assignFlow'])->name('assign');

    // مسیرهای داینامیک با پیشوند مشخص
    Route::post('/flowable/{flowable}/advance', [FlowableController::class, 'advanceStep'])->name('advance');
    Route::get('/flowable/{flowable}', [FlowableController::class, 'show'])->name('showFlowable');

    // مسیرهای داینامیک برای FlowController آخر
    Route::get('{id}/edit', [FlowController::class, 'edit'])->name('edit');
    Route::put('{id}', [FlowController::class, 'update'])->name('update');
    Route::delete('{id}', [FlowController::class, 'destroy'])->name('destroy');
    Route::get('{id}', [FlowController::class, 'show'])->name('show');


});
