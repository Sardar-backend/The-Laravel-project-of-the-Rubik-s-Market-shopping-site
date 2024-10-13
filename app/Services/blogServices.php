<?php

namespace App\Services;
use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\blog;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;

class blogServices
{
    public function getAll(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            return blog::paginate(10);
    });
    }

    public function getInfo(blog $user):ServiceResult
    {
        $user = blog::find(id: $user);
        return app(ServiceWrapper::class)(fn()=>$user);

    }


    public function registerblog(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs){
            // $inputs['password'] = Hash::make($inputs['password']);
            $blog=blog::create($inputs);
            return $blog;
        });

}


    public function Updateblog(array $inputs,int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs,$user){
            // $inputs['password'] = Hash::make($inputs['password']);
            $blog = blog::find( $user);
            $blog->update($inputs);
            $blog = $blog->fresh();


            return $blog;
        });

}

public function Deleteblog(int $user):ServiceResult
{
    $user = blog::find( $user);
    return app(ServiceWrapper::class)(fn()=>$user->delete());

}
}
