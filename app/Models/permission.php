<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class permission extends Model
{
    use HasFactory ;

    protected $fillable = ['name','display_name'];
    public function role(){
        return $this->belongsToMany(role::class);
    }
}
