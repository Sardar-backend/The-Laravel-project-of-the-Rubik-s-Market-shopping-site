<?php

namespace App\Services;
use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\blogcategory;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;
use Illuminate\Database\Eloquent\Collection;

class blogcategoryServices
{
    public function getAll(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            return blogcategory::paginate(10);
    });
    }

    public function getInfo( $user):ServiceResult
    {
        // $user = blogcategory::find( $user);
        $user = new Collection([blogcategory::find( $user)]);
        // dd($user->name);
        return app(ServiceWrapper::class)(fn()=>$user);

    }


    public function registerblogcategory(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs){


            $blogcategory=blogcategory::create($inputs);
            return $blogcategory;
        });

}


    public function Updateblogcategory(array $inputs,int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs,$user){

            $blogcategory = blogcategory::find( $user);
            $blogcategory->update($inputs);
            $blogcategory = $blogcategory->fresh();


            return $blogcategory;
        });

}

public function Deleteblogcategory(int $user):ServiceResult
{
    $user = blogcategory::find( $user);
    return app(ServiceWrapper::class)(fn()=>$user->delete());

}
}
