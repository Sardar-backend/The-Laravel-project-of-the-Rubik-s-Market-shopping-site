<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class role extends Model
{



    protected  $fillable = [
        'display_name',
        'name'
    ];
    protected static $rules = [
        'display_name ' => ['required'],
        'name' => ['required'],
        'permission'=>['required']
    ];

    public function permissions(){
        return $this->belongsToMany(permission::class);
    }

}
