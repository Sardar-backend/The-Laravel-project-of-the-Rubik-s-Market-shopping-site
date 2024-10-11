<?php

use App\Http\Middleware\adminmiddleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;


Route::withoutMiddleware([VerifyCsrfToken::class])->group(function () {
Route::apiResource('user',App\Http\Controllers\api\apiUser::class);
Route::apiResource('adresse',App\Http\Controllers\api\apiAdresse::class)->middleware(adminmiddleware::class);
});
