<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\adresse;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class usercontorel extends Controller
{
    public function adresses (Request $request){
        $adresses = $request->user()->adresses()->get();

        return view('profile\addresses',compact('adresses'));
    }
    public function delete_adresses (Request $request , string $id){
        // dd('d');
        $adresses = $request->user()->adresses()->where('id',$id)->delete();
        Alert::success('عملیات موفق آمیز بود','آدرس شما حذف شد');
        return back();
    }
    public function adresses_post (Request $request){
        $data = $request->validate([
            'ostan' => ['required'],
            'user_id' => ['required'],
            'tahvil' => ['required'],
            'city' => ['required'],
            'adress' => ['required'],
            'number' => ['required'],
            'post_number' => ['required'],
        ]);
        try {
            adresse::create($data);
            Alert::success('عملیات موفق آمیز بود','آدرس شما اضافه شد');

        } catch (\Throwable $th) {
            //Alert::error('خطا','عملیات موفقیت آمیز نبود');
            Alert::error('خطا',$th->getMessage());
        }
        return back();
    }

    public function factors (Request $request){
        $unpaid = $request->user()->orders()->wherestatus('unpaid')->with('products')->get();
        $paid = $request->user()->orders()->wherestatus('paid')->with('products')->get();
        $posted = $request->user()->orders()->wherestatus( 'posted')->with('products')->get();
        $recieved =  $request->user()->orders()->wherestatus('recieved')->with('products')->get();
        // dd($orders);

        // foreach ($recieved as $value) {
        //     dd($value->products()->first()->get());
        // }

        return view('profile\factors' , compact('unpaid','paid','posted','recieved'));
    }

    public function favorites (Request $request){
        $id=$request->user()->id;
        $favorite=User::find($id);

        $favorites=$favorite->favorite()->get();



        return view('profile\favorites',compact('favorites'));
    }

    public function personal (Request $request){
        $order = $request->user()->orders()->with('products')->get()->last();

        return view('profile\personal-info' , compact('order'));
    }
}
