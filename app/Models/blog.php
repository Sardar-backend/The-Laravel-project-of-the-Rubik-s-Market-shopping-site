<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{

    public $timestamps = false;
    public $fillable = [ 'id', 'title','image', 'content','count_view'];

    public static $rules = [
        'title' => ['required', 'string', 'max:255'],
        // 'image' => ['required'],
        'content' => ['required'],
        'categories' => ['nullable']
    ];

    public  function comment() {
        return $this->morphMany(comment::class, 'commenttable');
    }

    public function category() {

        return $this->belongsToMany(blogcategory::class,'blogcategorys_blog');
    }
}
