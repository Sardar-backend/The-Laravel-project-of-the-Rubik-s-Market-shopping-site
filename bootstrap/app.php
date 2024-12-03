<?php

use App\Http\Middleware\adminmiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use Illuminate\Support\Facades\Route;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then:function(){
            Route::middleware('web','auth')
                ->group(base_path('routes/admin.php'));
            // Route::middleware('web','auth')
            //     ->group(base_path('routes/Api.php'));

        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->append(adminmiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
