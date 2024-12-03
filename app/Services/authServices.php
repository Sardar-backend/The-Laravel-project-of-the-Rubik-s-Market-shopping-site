<?php

namespace App\Services;

use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class authServices
{
    public function step1( $inputs):ServiceResult     {
        return app(ServiceWrapper::class)(function() use ($inputs){

            $session=session()->get('code') ?? collect([]);

            $phonenumber= $inputs['phonenumber'];
            $user = User::where('phonenumber', $phonenumber)->first();
            try {
                $id= $user->id;
            } catch (\Throwable $th) {
                $id= null;
            }

            $User= User::find($id);


            if ($User) {
                $now = Carbon::now();

                $expiredAt = Carbon::parse($User->activecode[0]->expired_at);

                if (isset($User->activecode[0]->code) && !$expiredAt->lessThan($now)) {
                    $code=$User->activecode[0]->code;
                    // $User->notify(new notificationCode($code,$gnn));
                }else {
                    activecode::where('code', $User->activecode[0]->code)->delete();
                    $code = activecode::createcode();
                    activecode::create([

                        'user_id' =>$User->id,
                        'code' => $code,
                        'expired_at'=> now()->addMinutes(10)
                    ]);
                }

                // $u = $code;
                session()->put('code', $code);
                // $User->notify(new notificationCode($code,$gnn));
                // $error = '';
                // return view('enter2',compact('u','error'));

                // return collect(['Code sent']);
                // dd($User );
                return new Collection([$User]);
            }else {
                User::create([
                    'phonenumber' =>$inputs['phonenumber']
                ]);
                $cb = User::where('phonenumber',$inputs['phonenumber'])->get();
                $code = activecode::createcode();

                // dd($cb[0]->id);
                activecode::create([
                    'user_id' =>$cb[0]['id'],
                    'code' => $code,
                    'expired_at'=> now()->addMinutes(10)
                ]);
                // dd();
                //$cb->notify(new notificationCode($code,$gnn));
                // $u = $code;
                session()->put('code', $code);
                // return collect(['Code sent']);
                return $cb ;

            }
    });
    }



    public function step2( $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){

            $active=activecode::all();
            $active = $active->where('code','LIKE',$inputs['code'])->first();

            if ($inputs['code']==session()->get('code')) {


                $id=$active->user->id;
                Auth::loginUsingId($id);
                $token = Auth::user()->createToken('API TOKEN')->plainTextToken;
                return $active->user ;
            }else {

                return $active->user ;

            }



    });
    }


}
