<?php

namespace App\Providers;

use App\Models\permission;
use App\Models\role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class auth extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // foreach (permission::all() as $key) {
        //     Gate::define($key->name , function($user) use($key){
        //         return $user->hasPermission($key);
        //     });
        // }

        // permission::with('role')->each(function($permission) {
        //     Gate::define($permission->name, function($user) use($permission){
        //         return !! $permission->role->intersect($user->role)->count();
        //     });
        // });
    }
}
