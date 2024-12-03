<?php

namespace App\Services;
use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class profileServices
{
    public function getAllfavoriets():ServiceResult
    {
        return app(ServiceWrapper::class)(function(){
            return Auth::user()->favorite()->get();
    });
    }
    public function orders():ServiceResult
    {
        return app(ServiceWrapper::class)(function(){
            return Auth::user()->orders()->get();
    });
    }
    public function Adresses():ServiceResult
    {
        return app(ServiceWrapper::class)(function(){
            return Auth::user()->Adresses()->get();
    });
    }

    public function getInfo( ):ServiceResult
    {
        $user =  new Collection([Auth::user()]);
        // dd($user);
        return app(ServiceWrapper::class)(fn()=>$user);

    }

    public function UpdateUser(array $inputs,int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs,$user){
            // dd(vars: $inputs);

            $Use = User::find( $user);
            $User=$Use->update($inputs);
            $User = $Use->fresh();


            return $User;
        });

    }

//     public function registerprofile(array $inputs):ServiceResult
//     {
//         return app(ServiceWrapper::class)(function() use($inputs){
//             // $inputs['password'] = Hash::make($inputs['password']);
//             $User=User::create($inputs);
//             return $User;
//         });

// }


//     public function Updateprofile(array $inputs,int $user):ServiceResult
//     {
//         return app(ServiceWrapper::class)(function() use($inputs,$user){
//             // $inputs['password'] = Hash::make($inputs['password']);
//             $User = User::find( $user);
//             $User->update($inputs);
//             $User = $User->fresh();


//             return $User;
//         });

// }

// public function Deleteprofile(int $user):ServiceResult
// {
//     $user = User::find( $user);
//     return app(ServiceWrapper::class)(fn()=>$user->delete());

// }
}
