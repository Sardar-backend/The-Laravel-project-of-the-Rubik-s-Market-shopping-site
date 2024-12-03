<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
* @OA\Schema(
        *       schema = "ProductDetailResource",
      *
      *
      *             @OA\Property(
     *              property = "id",
     *              type="integer",
     *               example=1
     *
     *               )
)
 */

class ApiProductListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'name' => $this->name,
            'price' => $this->price,
            'stars' => $this->stars,

            'brand' => $this->brand,
            'image' => $this->gallery()->first()->image,
        ];
    }
}
