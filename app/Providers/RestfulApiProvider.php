<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\RestfulApi\AppendsBuilder;
class RestfulApiProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('ApiResponseFacade', function(){
            return new AppendsBuilder ;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
