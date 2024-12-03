<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    // use HasFactory;
    protected $table = 'gallery';
    protected $fillable = ['image','alt'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
