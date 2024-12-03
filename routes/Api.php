<?php

// use App\Http\Middleware\adminmiddleware;
// use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
// use Illuminate\Support\Facades\Route;

// Route::withoutMiddleware([VerifyCsrfToken::class])->group(function () {
// Route::get('profile',[App\Http\Controllers\api\ApiprofileController::class,'show']);
// Route::post('profile/edit/{id}',[App\Http\Controllers\api\ApiprofileController::class,'update']);
// Route::get('profile/Adresses',[App\Http\Controllers\api\ApiprofileController::class,'Adresses']);
// Route::get('profile/favorate',[App\Http\Controllers\api\ApiprofileController::class,'favorate']);
// Route::get('profile/orders',[App\Http\Controllers\api\ApiprofileController::class,'orders']);
// Route::post('profile/logout',[App\Http\Controllers\api\ApiprofileController::class,'logout']);
// Route::apiResource('admin/contact',App\Http\Controllers\api\ApiContactController::class);
// Route::apiResource('admin/user',App\Http\Controllers\api\ApiUserController::class);
// Route::apiResource('admin/permission',App\Http\Controllers\api\ApiPermissonController::class);
// Route::apiResource('admin/Role',App\Http\Controllers\api\ApiRoleController::class);
// Route::apiResource('admin/Comment',App\Http\Controllers\api\ApiCommentController::class)->middleware(adminmiddleware::class);
// Route::apiResource('admin/Product',App\Http\Controllers\api\ApiProductController::class)->middleware(adminmiddleware::class);
// Route::apiResource('admin/adresse',App\Http\Controllers\api\ApiAdressController::class)->middleware(adminmiddleware::class);
// Route::apiResource('admin/blog',App\Http\Controllers\api\ApiBlogController::class)->middleware(adminmiddleware::class);
// Route::apiResource('admin/ProductCategory',App\Http\Controllers\api\ApiProductCategoryController::class)->middleware(adminmiddleware::class);
// Route::apiResource('Cart',App\Http\Controllers\api\ApiCartController::class)->only('index','store')->middleware(adminmiddleware::class);
// Route::delete('Cart/{id}',[App\Http\Controllers\api\ApiCartController::class,'destroySingle'])->middleware(adminmiddleware::class);
// Route::delete('Cart',[App\Http\Controllers\api\ApiCartController::class,'destroyAll'])->middleware(adminmiddleware::class);
// Route::apiResource('admin/BlogCategory',App\Http\Controllers\api\ApiBlogCategoryController::class)->middleware(adminmiddleware::class);
// })->middleware('auth:sanctum');
