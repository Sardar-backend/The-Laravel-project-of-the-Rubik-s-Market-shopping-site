<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    // use HasFactory;
    public $timestamps = false;
    protected $table = 'contactss';
    protected $fillable = ['name', 'email', 'number_phone', 'content','subject'];
}
