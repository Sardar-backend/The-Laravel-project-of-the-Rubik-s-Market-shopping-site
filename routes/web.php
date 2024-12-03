<?php

use App\Http\Controllers\ProductListController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Modules\Discount\Http\Controllers\Frontend\DisableAbleController;
use App\Http\Middleware\adminmiddleware;
use OpenApi\Annotations\Patch;

Route::get('/download',[\App\Http\Controllers\homecontorel::class,'download'])->name('download');
Route::get('/home',[\App\Http\Controllers\homecontorel::class,'index'])->name('index');
Route::get('/',[\App\Http\Controllers\homecontorel::class,'index'])->name('index');

Route::get('/about',[\App\Http\Controllers\homecontorel::class,'about'])->name('about');

Route::get('/contact',[\App\Http\Controllers\homecontorel::class,'contact'])->name('contact');
Route::post('/contact_p',[\App\Http\Controllers\homecontorel::class,'contact_post'])->name('contact_post');



Route::get('/faq',[\App\Http\Controllers\homecontorel::class,'faq'])->name('faq');

Route::get('/products',[\App\Http\Controllers\ProductListcontroller::class,'products'])->name('products');

Route::get('/product-{id}',[\App\Http\Controllers\homecontorel::class,'product'])->name('product');


Route::get('/Pro',[\App\Http\Controllers\ProductListcontroller::class,'Cat_products'])->name('productss');

// Route::get('/compare',[\App\Http\Controllers\homecontorel::class,'compare'])->name('compare');

Route::get('/cart',[\App\Http\Controllers\homecontorel::class,'cart'])->name('cart')->middleware(['auth','password.confirm']);

Route::get('/checkout',[\App\Http\Controllers\paymentController::class,'checkout'])->name('checkout')->middleware('auth');

Route::post('/checkout',[\App\Http\Controllers\paymentController::class,'checkout_post'])->name('checkout_post')->middleware('auth');

// Route::get('/auth2',[\App\Http\Controllers\homecontorel::class,'getauth2'])->name('auth2');
// Route::post('/auth2',[\App\Http\Controllers\homecontorel::class,'postauth2'])->name('postauth2');

// Route::get('/t_auth2',[\App\Http\Controllers\homecontorel::class,'tokengetauth2'])->name('t_auth2');
// Route::post('/t_auth2',[\App\Http\Controllers\homecontorel::class,'tokenpostauth2']);


Route::get('/Addresses',[\App\Http\Controllers\admin\usercontorel::class,'adresses'])->name('adresses')->middleware('auth');
Route::post('/Addresses',[\App\Http\Controllers\admin\usercontorel::class,'adresses_post'])->name('adresses_post')->middleware('auth');
// Route::post(uri: '/deleteadresses{id}',[\App\Http\Controllers\admin\usercontorel::class,'delete_adresses'])->name('delete_adresses')->middleware('auth');
Route::post('/deleteadresses/{id}', [\App\Http\Controllers\admin\usercontorel::class, 'delete_adresses'])
    ->name('delete_adresses')
    ->middleware('auth');

Route::post('/selectadresses{id}',[\App\Http\Controllers\homecontorel::class,'selectadresses'])->name('selectadresses')->middleware('auth');

Route::get('/factors',[\App\Http\Controllers\admin\usercontorel::class,'factors'])->name('factors')->middleware('auth');

Route::get('/favorites',[\App\Http\Controllers\admin\usercontorel::class,'favorites'])->name('favorites')->middleware('auth');

Route::get('/personal',[\App\Http\Controllers\admin\usercontorel::class,'personal'])->middleware('auth')->name('personal');


// Auth::routes();


// Route::get('/auth/google',[\App\Http\Controllers\Auth\googleAuthcontroller::class,'redirect'])->name('auth.google');
// Route::get('/auth/google/callback',[\App\Http\Controllers\Auth\googleAuthcontroller::class,'callback']);


Route::post('/create_comment',[\App\Http\Controllers\homecontorel::class,'craete_comment'])->name('create_comment')->middleware('auth');


Route::get('/blog',[\App\Http\Controllers\homecontorel::class,'blog_list'])->name('blog_list');

Route::get('/blog-single-{id}',[\App\Http\Controllers\homecontorel::class,'blog_single'])->name('blog_single')->middleware('auth');


Route::get('/edit',[\App\Http\Controllers\homecontorel::class,'edit_user'])->name('edit_user')->middleware('auth');
Route::patch('/edit_post{id}',[\App\Http\Controllers\homecontorel::class,'edit_user_post'])->name('aaaaaaaaaa')->middleware('auth');
// Route::resource('edit_user', App\Http\Controllers\authcontroll\edit_user::class);


Route::post('/like',[\App\Http\Controllers\homecontorel::class,'like_post'])->name('like_post')->middleware('auth');

Route::post('/dislike',[\App\Http\Controllers\homecontorel::class,'dislike_post'])->name('dislike_post')->middleware('auth');

Route::get('/blogs-{category}',[\App\Http\Controllers\homecontorel::class,'blog_category'])->name('blog_category');


// Route::get('/show/{user}/file' , function($file){
//     return Storage::download(request('path'));
// }
// )->name('categorys');


Route::post('/add_to_card{product}',[\App\Http\Controllers\cartcontroller::class,'addToCart'])->name('add_to_card');


Route::post('/login_step2',[\App\Http\Controllers\authcontroll\authcontorel::class,'login_step1_post'])->middleware('guest')->name('perp');

Route::get('/login_step2',[\App\Http\Controllers\authcontroll\authcontorel::class,'enter2'])->middleware('guest');

Route::get('/login',[\App\Http\Controllers\authcontroll\authcontorel::class,'login'])->name('login')->middleware('guest');
Route::get('/logout',[\App\Http\Controllers\authcontroll\authcontorel::class,'logout'])->name('logout')->middleware('auth');

//Route::get('/y',[\App\Http\Controllers\authcontroll\authcontorel::class,'log'])->name('x');

Route::post('/pvc',[\App\Http\Controllers\authcontroll\authcontorel::class,'mm'])->middleware('guest')->name('mm');

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });




//


// Route::get('/products-list',[\App\Http\Controllers\ProductListcontroller::class,'products_list'])->name('products-list');
Route::get('/products',[\App\Http\Controllers\ProductListcontroller::class,'products'])->name('products');



//











Route::delete('/delete_cart{product}',[\App\Http\Controllers\cartcontroller::class,'deleteFromCart'])->name('delete_cart');

Route::post('/delete_cartAll',[\App\Http\Controllers\cartcontroller::class,'deleteAll'])->name('delete_cart_All');

Route::get('/cart',[\App\Http\Controllers\cartcontroller::class,'Cart'])->name('cart');
















Route::get('/sitemap.xml', function () {
    return response()->file(public_path('sitemap.xml'));
});


Route::withoutMiddleware([VerifyCsrfToken::class])->group(function () {

    // Route::post('/graphql', [GraphQLController::class, 'query']);
    // Route::post('Login_step2',App\Http\Controllers\Api\LoginController::class);
    Route::delete('Logoutt',App\Http\Controllers\Api\LogoutController::class)->middleware('auth:sanctum');
});
Route::get('current_user',App\Http\Controllers\Api\GetCurrentUserController::class)->middleware('auth:sanctum');
Route::get('able', [DisableAbleController::class,'able'])->name('discount.able');


Route::post('/ajax-request', [ProductListController::class, 'handleRequest'])->name('ajax.request');


Route::get('/filter-by-price', action: [ProductListController::class, 'filterByPrice'])->name('products.filter');


// Route::get('current_user',App\Http\Controllers\Api\GetCurrentUserController::class)->middleware('auth:sanctum');

Route::withoutMiddleware([VerifyCsrfToken::class])->prefix('api')->group(function () {
    Route::post('/selectadresses',[App\Http\Controllers\Api\LoginController::class,'selectadresses']);
    Route::post('Login_step1',[App\Http\Controllers\Api\LoginController::class,'step1']);
Route::post('disLike',[App\Http\Controllers\Api\ApiProductController::class,'dislike_post']);
Route::delete('deleteadresses',[App\Http\Controllers\Api\ApiProductController::class,'deleteadresses']);
Route::post('Like',[App\Http\Controllers\Api\ApiProductController::class,'like_post']);
Route::post('Login_step2',[App\Http\Controllers\Api\LoginController::class,'step2']);
Route::get('last_blogproduct',[App\Http\Controllers\api\ApiProductController::class,'last_blog_product']);
Route::get('indexview',[App\Http\Controllers\api\ApiProductController::class,'indexView']);
Route::get('ProductList',[App\Http\Controllers\api\ApiProductController::class,'ProductList']);
Route::get('profile',[App\Http\Controllers\api\ApiprofileController::class,'show'])->middleware('auth:sanctum');
Route::match(['put', 'patch'],'profile/edit/{id}',[App\Http\Controllers\api\ApiprofileController::class,'update'])->middleware('auth:sanctum');
Route::get('profile/Adresses',[App\Http\Controllers\api\ApiprofileController::class,'Adresses'])->middleware('auth:sanctum');
Route::get('profile/favorate',[App\Http\Controllers\api\ApiprofileController::class,'favorate'])->middleware('auth:sanctum');
Route::get('profile/orders',[App\Http\Controllers\api\ApiprofileController::class,'orders'])->middleware('auth:sanctum');
Route::post('profile/logout',[App\Http\Controllers\api\ApiprofileController::class,'logout'])->middleware('auth:sanctum');
Route::apiResource('admin/contact',App\Http\Controllers\api\ApiContactController::class);
Route::apiResource('admin/user',App\Http\Controllers\api\ApiUserController::class)->middleware('auth:sanctum');
Route::apiResource('admin/permission',App\Http\Controllers\api\ApiPermissonController::class)->middleware('auth:sanctum');
Route::apiResource('admin/Role',App\Http\Controllers\api\ApiRoleController::class)->middleware('auth:sanctum');
Route::apiResource('admin/Comment',App\Http\Controllers\api\ApiCommentController::class)->middleware('auth:sanctum');
Route::apiResource('admin/Product',App\Http\Controllers\api\ApiProductController::class)->middleware('auth:sanctum');
Route::apiResource('admin/adresse',App\Http\Controllers\api\ApiAdressController::class)->middleware('auth:sanctum');
Route::apiResource('admin/blog',App\Http\Controllers\api\ApiBlogController::class)->middleware('auth:sanctum');
Route::apiResource('admin/ProductCategory',App\Http\Controllers\api\ApiProductCategoryController::class)->middleware('auth:sanctum');
Route::apiResource('admin/BlogCategory',App\Http\Controllers\api\ApiBlogCategoryController::class)->middleware('auth:sanctum');
Route::apiResource('Cart',App\Http\Controllers\api\ApiCartController::class)->only('index','store');
Route::delete('Cart/{id}',[App\Http\Controllers\api\ApiCartController::class,'destroySingle']);
Route::delete('Cart',[App\Http\Controllers\api\ApiCartController::class,'destroyAll']);

});




Route::get('/products_popular',[\App\Http\Controllers\ProductListcontroller::class,'products_popular'])->name('products_popular');
Route::get('/products_cheapest',[\App\Http\Controllers\ProductListcontroller::class,'products_cheapest'])->name('products_cheapest');
Route::get('/products_Existing',[\App\Http\Controllers\ProductListcontroller::class,'products_Existing'])->name('products_Existing');
Route::get('/products_status',[\App\Http\Controllers\ProductListcontroller::class,'products_status'])->name('products_status');
