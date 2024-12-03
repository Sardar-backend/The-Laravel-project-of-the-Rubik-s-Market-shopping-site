<?php

namespace App\Models;

use App\ProductAttributeValues;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //  use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'image',
        'name',
        'price'
        ,'discription',
        'stars',
        'with',
        'length',
        'discust',
        'Chosen',
        'garant',
        'count',
        'count_view'
        ,'Criticism',
        'Special_sale',
        'Brand'
    ];

    public function comment() {
        return $this->morphMany(comment::class,'commenttable');
    }


    public function category() {

        return $this->belongsToMany(productcategory::class);
    }

    public function attribute () {
        return $this->belongsToMany(Attributes::class,'attribute_product')->using(ProductAttributeValues::class)->withPivot('value_id');
    }

    public function gallery() {
        return $this->hasMany(gallery::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
    // public function favorite (){
    //     return $this->belongsToMany(User::class,'favorites','user_id','products_id','id','id');
    // }

}
