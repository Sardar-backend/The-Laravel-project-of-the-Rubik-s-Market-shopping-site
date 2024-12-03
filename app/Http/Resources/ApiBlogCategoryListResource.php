<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
/**
* @OA\Schema(
        *       schema = "BlogCategoryListResource",
      *             @OA\Property(
     *              property = "id",
     *              type="integer",
     *               example=1
     *               ),
     *             @OA\Property(
     *              property = "name",
     *              type="string",
     *               example="موبایل"
     *               ),
     *             @OA\Property(
     *              property = "parent",
     *              type="integer",
     *               example=0
     *               ),
     *             @OA\Property(
     *              property = "updated_at",
     *              type="string",
     *               example="2024-10-05T17:44:12.000000Z"
     *               ),
)
 */
class ApiBlogCategoryListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'parent' => $this->parent,
            'updated_at' => $this->updated_at,
            // 'count_view' => $this->count_view,
            // 'content' =>substr(strip_tags($this->content),0,462) ,
            // 'image' => $this->image,
            // 'failed_at' => $this->failed_at
        ];
    }
}
