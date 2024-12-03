<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiRoleListResource extends JsonResource
{

    /**
 * @OA\Schema(
 *     schema="RoleListResponse",
 *     type="object",
 *     description="Paginated list of roles",
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         @OA\Property(property="current_page", type="integer", example=1),
 *         @OA\Property(
 *             property="data",
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="Admin"),
 *                 @OA\Property(property="display_name", type="string", example="Admin Site"),
 *                 @OA\Property(property="deleted_at", type="string", format="date-time", example="2024-10-25 16:49:08"),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-24T21:55:14.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-25T16:49:08.000000Z")
 *             )
 *         ),
 *         @OA\Property(property="first_page_url", type="string", format="url", example="http://127.0.0.1:8000/api/admin/Role?page=1"),
 *         @OA\Property(property="from", type="integer", example=1),
 *         @OA\Property(property="last_page", type="integer", example=1),
 *         @OA\Property(property="last_page_url", type="string", format="url", example="http://127.0.0.1:8000/api/admin/Role?page=1"),
 *         @OA\Property(
 *             property="links",
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="url", type="string", nullable=true, example=null),
 *                 @OA\Property(property="label", type="string", example="&laquo; Previous"),
 *                 @OA\Property(property="active", type="boolean", example=false)
 *             )
 *         ),
 *         @OA\Property(property="next_page_url", type="string", nullable=true, example=null),
 *         @OA\Property(property="path", type="string", format="url", example="http://127.0.0.1:8000/api/admin/Role"),
 *         @OA\Property(property="per_page", type="integer", example=10),
 *         @OA\Property(property="prev_page_url", type="string", nullable=true, example=null),
 *         @OA\Property(property="to", type="integer", example=6),
 *         @OA\Property(property="total", type="integer", example=6)
 *     )
 * )
 *
 *
 *
 * @OA\Schema(
 *     schema="RoleResource",
 *     type="object",
 *     title="Role Resource",
 *     description="Schema for a single role resource",
 *     @OA\Property(property="id", type="integer", example=2),
 *     @OA\Property(property="name", type="string", example="d"),
 *     @OA\Property(property="display_name", type="string", example="d"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-24T21:55:14.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-24T21:55:17.000000Z")
 * )
 */





    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
