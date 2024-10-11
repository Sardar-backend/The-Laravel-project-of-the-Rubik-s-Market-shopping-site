<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiDetailUser extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ,
            'name' => $this->name,
            'home_number' => $this->home_number,
            'cart_number' => $this->cart_number,
            'birthday' => $this->birthday,
            'email' => $this->email,
            'phonenumber'=>$this->phonenumber,
            'meli_code'=>$this->meli_code,
            'image'=>$this->image
        ];
    }
}
