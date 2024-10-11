<?php

namespace App\Http\Controllers\authcontroll;

use App\Http\Controllers\Controller;

use App\Models\activecode;

use App\Models\User;
use App\Notifications\notificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class authcontorel extends Controller
{
    public function login (){
        $this->seo()->setTitle('صفحه ورود')
        ->setDescription('به صفحه ورود خوش آمدید')
        ->opengraph()->setTitle('صفحه ورود')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);
        $u = User::where('id',1)->get();
        return view('p')->with('u',$u);
    }
    public function po(Request $request) {

        $gnn= $request->name;
        $u = User::where('phonenumber', $gnn)->get();
        try {
            $w= $u[0]->id;
        } catch (\Throwable $th) {
            $w= null;
        }

        $g= User::find($w);
        if ($g) {
            $now = Carbon::now();
            $expiredAt = Carbon::parse($g->activecode[0]->expired_at);
            if (isset($g->activecode[0]->code) && !$expiredAt->lessThan($now)) {
                // dd();
                $code=$g->activecode[0]->code;
            }else {
                activecode::where('code', $g->activecode[0]->code)->delete();
                $code = activecode::createcode();
                activecode::create([

                    'user_id' =>$g->id,
                    'code' => $code,
                    'expired_at'=> now()->addMinutes(10)
                ]);
            }

            $u = $code;
            $error = '';
            return view('enter2',compact('u','error'));
        }else {

             User::create([
                 'phonenumber' => request('name')
             ]);
             $cb = User::where('phonenumber',$gnn)->get();
             $code = activecode::createcode();
             activecode::create([
                 'user_id' =>$cb[0]->id,
                 'code' => $code,
                 'expired_at'=> now()->addMinutes(10)
             ]);
            $u = $code;
            $error = '';
            return view('enter2',compact('u','error'));
        }
    }
    public function enter2(){
        $this->seo()->setTitle('صفحه ورود')
        ->setDescription('به صفحه ورود خوش آمدید')
        ->opengraph()->setTitle('صفحه ورود')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);
        return view('enter2');
    }
    public function log (){
        $vv = activecode::where('code',1111)->first();
        if ($vv) {
            return !! $vv;
        }
    }

    public function mm (Request $request){
        if ($request->code==$request->codeEnter) {
            $active=activecode::query();
            $active=activecode::all();
            $active = $active->where('code','LIKE',$request->code)->first();
            // $active = User::where('name','');
            // $user=$active->user();
            $id=$active->user->id;
            Auth::loginUsingId($id);
            Alert::success('ورود','با موفقیت وارد شدید');
            return redirect('/home');
        }else {
            $u = $request->code;
            $error = 'کد نوشته شده صحیح نمی باشد';
            return view('enter2',compact('u','error'));
        }
    }

    public function logout (){
        Auth::logout();
        return  redirect()->route('index');
    }
}
