<?php

use Illuminate\Support\Facades\Route;
use Modules\Transaction\App\Http\Controllers\ResponsibleController;
use Modules\Transaction\App\Http\Controllers\TransactionController;
use Modules\Transaction\App\Http\Controllers\CustomerController;
use Modules\Transaction\App\Http\Controllers\FlowTransactionController;

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

Route::middleware(['auth'])->group( function () {
    Route::get('transaction/flow', [FlowTransactionController::class, 'flow'])->name("transaction.flow");
    Route::post('/transaction/{transaction}/update-step', [FlowTransactionController::class, 'updateStep'])->name('transaction.updateStep');
    Route::get('transaction/export', [TransactionController::class, 'export'])->name('transaction.export');
    Route::resource('transaction', TransactionController::class)->names('transaction');
    Route::get('transaction/customer/search', [CustomerController::class, 'search']);
    Route::put('transaction/{transaction}/change-status', [TransactionController::class, 'changeStatus'])->name('transaction.change-status');
    Route::post('responsibles/{responsible}/accept', [ResponsibleController::class, 'accept'])
        ->name('responsibles.accept');

    Route::post('responsibles/{responsible}/reject', [ResponsibleController::class, 'reject'])
        ->name('responsibles.reject');

});
