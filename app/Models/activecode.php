<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class activecode extends Model
{

    protected $fillable = [
        'user_id',
        'code',
        'expired_at'
    ];
    
    public $timestamps = false ;

    public function user(){
        return $this->belongsTo(User::class);
    }



    public function scopecreatecode($query){


    do {
        $code= mt_rand(10000,99999);


    } while ($this->checkcode($code));

        return $code;

    }

    private function checkcode(int $code){

        return !! activecode::where('code',$code)->first();

    }



}
