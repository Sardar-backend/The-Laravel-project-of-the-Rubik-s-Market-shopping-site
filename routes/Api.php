<?php

use App\Http\Middleware\adminmiddleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;


Route::withoutMiddleware([VerifyCsrfToken::class])->group(function () {
Route::apiResource('user',App\Http\Controllers\api\ApiUserController::class);
Route::apiResource('adresse',App\Http\Controllers\api\ApiAdressController::class)->middleware(adminmiddleware::class);
Route::apiResource('blog',App\Http\Controllers\api\ApiBlogController::class)->middleware(adminmiddleware::class);
Route::apiResource('ProductCategory',App\Http\Controllers\api\ApiProductCategoryController::class)->middleware(adminmiddleware::class);
Route::apiResource('BlogCategory',App\Http\Controllers\api\ApiBlogCategoryController::class)->middleware(adminmiddleware::class);
});
