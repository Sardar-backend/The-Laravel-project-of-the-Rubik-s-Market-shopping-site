<?php

namespace App\Services;
use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\comment;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;

class commentServices
{
    public function getAll(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            return comment::paginate(10);
    });
    }

    public function getInfo(comment $user):ServiceResult
    {
        $user = comment::find(id: $user);
        return app(ServiceWrapper::class)(fn()=>$user);

    }


    public function registercomment(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs){
            $comment=comment::create($inputs);
            return $comment;
        });

}


    public function Updatecomment(int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($user){
            // $inputs['password'] = Hash::make($inputs['password']);
            $comment = comment::find( $user);
            $comment->update(['status' => 1]);
            $comment = $comment->fresh();


            return $comment;
        });

}

public function Deletecomment(int $user):ServiceResult
{
    $user = comment::find( $user);
    return app(ServiceWrapper::class)(fn()=>$user->delete());

}
}
