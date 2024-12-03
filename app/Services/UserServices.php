<?php

namespace App\Services;

use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;

class UserServices
{
    public function getAll(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            return User::paginate(10);
    });
    }

    public function getInfo(User $user):ServiceResult
    {
        $user = User::find(id: $user);
        // dd(vars: $user);
        return app(ServiceWrapper::class)(fn()=>$user);

    }


    public function registerUser(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs){
            // $inputs['password'] = Hash::make($inputs['password']);
            $user=User::create($inputs);
            $code = activecode::createcode();
            activecode::create([

                'user_id' =>$user->id,
                'code' => $code,
                'expired_at'=> now()->addMinutes(10)
            ]);
            return $user;
        });

}


    public function UpdateUser(array $inputs,int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs,$user){
            // $inputs['password'] = Hash::make($inputs['password']);
            $Use = User::find( $user);
            $User=$Use->update($inputs);
            $User = $Use->fresh();


            return $User;
        });

    }

public function DeleteUser(int $user):ServiceResult
{
    $user = User::find( $user);
    return app(ServiceWrapper::class)(fn()=>$user->delete());

}
}
