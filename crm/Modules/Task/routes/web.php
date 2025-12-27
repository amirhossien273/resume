<?php

use Illuminate\Support\Facades\Route;
use Modules\Task\App\Http\Controllers\TaskController;

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
   

Route::prefix('tasks')->middleware(['auth'])->group(function () {
    Route::get('/calendar', [TaskController::class, 'calendar'])->name('calendar.view');
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');// ← نام اضافه شد
    Route::get('{id}', [TaskController::class, 'show'])->name('tasks.show');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::post('/{task}/update-datetime', [TaskController::class, 'updateDateTime'])->name('tasks.update-date');
    Route::post('/{task}/assign', [TaskController::class, 'assign'])->name('tasks.assign');
    Route::delete('{taskId}/assignees/{assigneeId}', [TaskController::class, 'removeAssignee'])->name('tasks.assignees.remove');
});
