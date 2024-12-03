<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adresse extends Model
{
    // use HasFactory;
    public $timestamps = false;
    public $fillable = ['user_id','ostan','tahvil','city','adress','number','post_number','failed_at','is_selected'];

    public function selectAsPrimary()
    {

        self::where('user_id', $this->user_id)->update(['is_selected' => 0]);


        $this->update(['is_selected' => 1]);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
