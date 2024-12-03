<?php

namespace App\Services;
use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Helpers\Cart\Cart;

// use App\Models\Cart;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;
use App\Models\Product;

class CartServices
{
    public function getAll(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            // dd(session()->all());
            return Cart::all();
    });
    }

    public function getInfo(Cart $user):ServiceResult
    {
        $user = Cart::find(id: $user);
        return app(ServiceWrapper::class)(fn()=>$user);

    }


    public function registerCart(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs){
            // $inputs['password'] = Hash::make($inputs['password']);

            $product = Product::find($inputs['id']);
            if(Cart::has($product)){
                Cart::update($product ,$inputs['quantity'] );
            }
            else{
                Cart::put(
                    [
                        'quantity' => $inputs['quantity'] ,
                        'price' => $product->price,
                        'color' => $inputs['color'] ?? 'default'
                    ],
                 $product
                );}
            return $product;
        });

}


    public function UpdateCart(array $inputs,int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs,$user){

            Cart::delete($user);
            return null;
        });
}

public function DeleteCart():ServiceResult
{
    return app(ServiceWrapper::class)(function() {
    session()->forget('cart');
    return null;
    });
}
}
