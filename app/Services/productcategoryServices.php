<?php

namespace App\Services;
use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\productcategory;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;

class productcategoryServices
{
    public function getAll(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            return productcategory::paginate(10);
    });
    }

    public function getInfo(productcategory $user):ServiceResult
    {
        $user = productcategory::find(id: $user);
        return app(ServiceWrapper::class)(fn()=>$user);

    }


    public function registerproductcategory(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs){
            // $inputs['password'] = Hash::make($inputs['password']);
            $productcategory=productcategory::create($inputs);

            return $productcategory;
        });

}


    public function Updateproductcategory(array $inputs,int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs,$user){
            // $inputs['password'] = Hash::make($inputs['password']);
            $productcategory = productcategory::find( $user);
            $productcategory->update($inputs);
            $productcategory = $productcategory->fresh();


            return $productcategory;
        });

}

public function Deleteproductcategory(int $user):ServiceResult
{
    $user = productcategory::find( $user);
    return app(ServiceWrapper::class)(fn()=>$user->delete());

}
}
