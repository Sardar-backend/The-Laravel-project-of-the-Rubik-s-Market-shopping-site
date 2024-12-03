<?php

namespace App\Services;
use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\role;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;

class roleServices
{
    public function getAll(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            return role::paginate(10);
    });
    }

    public function getInfo( $user):ServiceResult
    {
        $user = new Collection([role::find( $user)]);

        return app(ServiceWrapper::class)(fn()=>$user);

    }


    public function registerrole(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs){
            $role=role::create(Arr::except($inputs,'permissions'));
            $role->permissions()->attach($inputs['permissions']);
            return $role;
        });

}


    public function Updaterole(array $inputs,int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs,$user){
            // $inputs['password'] = Hash::make($inputs['password']);
            $role = role::find( $user);
            $role->update(Arr::except($inputs,'permissions'));
            $role->permissions()->sync($inputs['permissions']);
            $role = $role->fresh();


            return $role;
        });

}

public function Deleterole(int $user):ServiceResult
{
    $user = role::find( $user);
    return app(ServiceWrapper::class)(fn()=>$user->delete());

}
}
