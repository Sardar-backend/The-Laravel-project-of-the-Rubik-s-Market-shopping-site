<?php

namespace App\Providers;

use App\Helpers\Cart\CartService;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->singleton('cart', function($app){
            return new CartService();
        });
    }
    /**
     * Register services.
     */
    // public function register(): void
    // {
    //     $this->app->singleton('Cart', function($app){
    //         return new CartService();
    //     });
    // }

    // /**
    //  * Bootstrap services.
    //  */
    // public function boot(): void
    // {
    //     \Illuminate\Support\Facades\Facade::class_alias('Cart', 'Cart');
    // }
}
