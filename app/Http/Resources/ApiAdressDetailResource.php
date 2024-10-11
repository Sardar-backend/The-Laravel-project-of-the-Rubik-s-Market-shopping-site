<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiAdressDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ostan' => $this->ostan,
            'city' => $this->city,
            'address' => $this->address,
            'tahvil' => $this->tahvil,
            'is_selected' => $this->is_selected,
            'number' => $this->number,
            'post_number' => $this->post_number,
            'failed_at' => $this->failed_at,
        ];
    }
}
