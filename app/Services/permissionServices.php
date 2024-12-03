<?php

namespace App\Services;
use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\permission;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;
use Illuminate\Database\Eloquent\Collection;

class permissionServices
{
    public function getAll(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            return permission::paginate(10);
    });
    }

    public function getInfo( $user):ServiceResult
    {
        $user = new Collection([permission::find(id: $user)]);
        return app(ServiceWrapper::class)(fn()=>$user);

    }


    public function registerpermission(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs){
            // $inputs['password'] = Hash::make($inputs['password']);
            $permission=permission::create($inputs);
            return $permission;
        });

}


    public function Updatepermission(array $inputs,int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs,$user){
            // $inputs['password'] = Hash::make($inputs['password']);
            $permission = permission::find( $user);
            $permission->update($inputs);
            $permission = $permission->fresh();


            return $permission;
        });

}

public function Deletepermission(int $user):ServiceResult
{
    $user = permission::find( $user);
    return app(ServiceWrapper::class)(fn()=>$user->delete());

}
}
