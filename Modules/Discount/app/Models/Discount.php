<?php

namespace Modules\Discount\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Discount\Database\Factories\DiscountFactory;
use App\Models\User;
use App\Models\Product;
use App\Models\productcategory;

class Discount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.categories
     */
    public $timestamps = false;
    public $fillable = [ 'id', 'code','percent', 'expired_at'];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function categories(){
        return $this->belongsToMany(productcategory::class);
    }

}
