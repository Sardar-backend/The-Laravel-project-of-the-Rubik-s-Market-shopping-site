<?php

namespace App\Services;
use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\contacts;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;
use Illuminate\Database\Eloquent\Collection;
class contactsServices
{
    public function getAll(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            return contacts::paginate(10);
    });
    }

    public function getInfo( $user):ServiceResult
    {
              $user = new Collection([contacts::find( $user)]);

        return app(ServiceWrapper::class)(fn()=>$user);

    }


    public function registercontacts(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs){
            // $inputs['password'] = Hash::make($inputs['password']);

            $contacts=contacts::create($inputs);
            return $contacts;
        });

}


    public function Updatecontacts(array $inputs,int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs,$user){
            // $inputs['password'] = Hash::make($inputs['password']);
            $contacts = contacts::find( $user);
            $contacts->update($inputs);
            $contacts = $contacts->fresh();


            return $contacts;
        });

}

public function Deletecontacts(int $user):ServiceResult
{
    $user = contacts::find( $user);
    return app(ServiceWrapper::class)(fn()=>$user->delete());

}
}
