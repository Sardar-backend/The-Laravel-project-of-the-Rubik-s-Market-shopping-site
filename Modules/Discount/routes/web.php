<?php

use Illuminate\Support\Facades\Route;
use Modules\Discount\Http\Controllers\Admin\DiscountController;
use Modules\Discount\Http\Controllers\Frontend\CheckDiscountController;
use Modules\Discount\Http\Controllers\Frontend\DisableAbleController;

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

// Route::group([], function () {
//     Route::resource('discount', DiscountController::class)->names('discount');
// });
Route::group([], function () {
    Route::resource('discount', DiscountController::class)->names('discount');
    Route::post('Check/discount', [CheckDiscountController::class,'check'])->name('discount.check');
    Route::get('disable', [DisableAbleController::class,'disable'])->name('discount.disable');

});
