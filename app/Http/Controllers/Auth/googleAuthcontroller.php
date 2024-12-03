<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class googleAuthcontroller extends Controller
{
public function redirect(){
    return Socialite::driver('google')->redirect();
}
public function callback (){
    try {
        $googleuser =Socialite::driver('google')->stateless()->User();
        $user = User::where('email', $googleuser->email)->first();
        if ($user) {
            auth()->loginUsingId($user->id);
        }else {
            $newuser = User::create([
                'name' => $googleuser->name,
                'email' => $googleuser->email,
                'password' => bcrypt('12345'), // you can generate password here

            ]);
            auth()->loginUsingId($newuser->id);
        }
        return redirect('/home');

    } catch (\Throwable $th) {
        //throw $th;
        return ($th);
    }
}

}
