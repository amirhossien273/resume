
<?php

use Illuminate\Support\Facades\Route;
use Modules\Customer\App\Http\Controllers\CustomerController;
use Modules\Customer\App\Http\Controllers\LeadController;
use Modules\Customer\App\Models\City;

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

    // customer
    Route::resource('customer', CustomerController::class)->names('customer');
    Route::post('customer/assign-user', [CustomerController::class, 'attachToUser'])
        ->name('customer.assignUser');

    //lead
    Route::post('lead/import', [LeadController::class, 'import'])->name('lead.import');
    Route::get('lead/export', [LeadController::class, 'export'])->name('lead.export');
    Route::resource('lead', LeadController::class)->names('lead');
    Route::post('lead/assign-user', [LeadController::class, 'attachToUser'])
        ->name('lead.assignUser');

    //province cities
    Route::get('/cities/{province_id}', function ($province_id) {
        return City::where('province_id', $province_id)->get();
    });
});
