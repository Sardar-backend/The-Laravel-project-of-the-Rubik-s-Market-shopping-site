<?php

namespace App\Services;
use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\adresse;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
class adresseServices
{
    public function getAll(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            return Auth::user()->adresses()->paginate(10);
    });
    }

    public function getInfo( $user):ServiceResult
    {
        $user = new Collection([adresse::find( $user)]);


        return app(ServiceWrapper::class)(fn()=>$user);

    }


    public function registeradresse(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs){
            // $inputs['password'] = Hash::make($inputs['password']);
            $adresse=adresse::create($inputs);
            $code = activecode::createcode();
            activecode::create([

                'user_id' =>$adresse->id,
                'code' => $code,
                'expired_at'=> now()->addMinutes(10)
            ]);
            return $adresse;
        });

}


    public function Updateadresse(array $inputs,int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs,$user){
            $adresse = adresse::find( $user);
            $adresse->update($inputs);
            $adresse = $adresse->fresh();


            return $adresse;
        });

}

public function Deleteadresse(int $user):ServiceResult
{
    $adresse = adresse::find( $user);
    return app(ServiceWrapper::class)(fn()=>$adresse->delete());

}
}
