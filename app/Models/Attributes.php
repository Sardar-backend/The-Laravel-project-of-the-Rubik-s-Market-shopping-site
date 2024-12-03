<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $fillable =['name'];
    protected $table = 'attribute';
    public function values () {
        return $this->hasMany(Attribute_values::class,'attribute_id');
    }
}
