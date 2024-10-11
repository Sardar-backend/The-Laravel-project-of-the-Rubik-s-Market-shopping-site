<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productcategory extends Model
{
    protected $table = 'productcategory';
    protected $fillable = ['name', 'parent'];


    public function parentCategory(){
        return $this->hasMany(productcategory::class, 'parent', 'id');
    }

    public function products () {
        return $this->belongsToMany(Product::class);
    }


}
