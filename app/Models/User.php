<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Base\traits\HasRules;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Modules\Discount\Models\Discount;

class User extends Authenticatable
{
    use HasFactory, Notifiable , HasRules  , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phonenumber',
        'meli_code',
        'password',
        'image',
        'is_superuser',
        'birthday',
        'cart_number',
        'home_number'
    ];

    protected static $rules = [
        'name' => ['required', 'string', 'max:255'],
        'phonenumber' => ['required' ,'max:255'],
        'meli_code' => ['required', 'max:255'],
        // 'image' => ['required'],
        'cart_number' => ['required',  'max:255'],
        'home_number' => ['required'  , 'max:255'],
        'email' => ['required',  'email', 'max:255'],
        'birthday' => ['required'],
        'is_superuser' => ['nullable']
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function activecode(){
        return $this->hasMany(Activecode::class);
    }

    public function is_staff(){

        return $this->is_staff;
    }

    public function is_superuser(){
        return $this->is_superuser;
    }
    // public function permission (){
    //     return $this->belongsToMany(permission::class);
    // }

    public function role (){
        return $this->belongsToMany(role::class);
    }

    // public function hasRole($role){
    //     return !! $role->intersect($this->roles)->all();
    // }

    // public function hasPermission($key){
    //     return $this->permisons->contains('name', $key->name) || $this->hasRole($key->roles);
    // }

    public function adresses() {
        return $this->hasMany(adresse::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }



    public function favorite (){
        return $this->belongsToMany(Product::class);
    }

    public function Discounts (){
        return $this->belongsToMany(Discount::class);
    }
}
