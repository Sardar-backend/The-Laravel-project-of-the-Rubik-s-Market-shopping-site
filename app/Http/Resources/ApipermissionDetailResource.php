<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApipermissionDetailResource extends JsonResource
{
/**
 * @OA\Schema(
 *     schema="PermissionItem",
 *     type="object",
 *     title="Permission Item",
 *     description="An individual permission item",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The ID of the permission",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The name of the permission",
 *         example="Store_Update"
 *     ),
 *     @OA\Property(
 *         property="display_name",
 *         type="string",
 *         description="The display name of the permission",
 *         example="Store_Update of Object Models"
 *     ),

 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         nullable=true,
 *         description="The creation timestamp of the permission",
 *         example="2024-10-24T19:16:55.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         nullable=true,
 *         description="The update timestamp of the permission",
 *         example="2024-10-24T19:16:55.000000Z"
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="PermissionList",
 *     type="object",
 *     title="Permission List",
 *     description="Paginated list of permissions",
 *     @OA\Property(
 *         property="current_page",
 *         type="integer",
 *         description="The current page number",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         description="The list of permissions",
 *         @OA\Items(ref="#/components/schemas/PermissionItem")
 *     ),
 *     @OA\Property(
 *         property="first_page_url",
 *         type="string",
 *         format="url",
 *         description="The URL of the first page",
 *         example="http://127.0.0.1:8000/api/admin/permission?page=1"
 *     ),
 *     @OA\Property(
 *         property="from",
 *         type="integer",
 *         description="The starting item number on this page",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="last_page",
 *         type="integer",
 *         description="The last page number",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="last_page_url",
 *         type="string",
 *         format="url",
 *         description="The URL of the last page",
 *         example="http://127.0.0.1:8000/api/admin/permission?page=1"
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="array",
 *         description="Pagination links",
 *         @OA\Items(
 *             type="object",
 *             @OA\Property(
 *                 property="url",
 *                 type="string",
 *                 format="url",
 *                 nullable=true,
 *                 description="The URL for the page",
 *                 example="http://127.0.0.1:8000/api/admin/permission?page=1"
 *             ),
 *             @OA\Property(
 *                 property="label",
 *                 type="string",
 *                 description="The label of the page link",
 *                 example="&laquo; Previous"
 *             ),
 *             @OA\Property(
 *                 property="active",
 *                 type="boolean",
 *                 description="Indicates if the link is active",
 *                 example=false
 *             )
 *         )
 *     ),
 *     @OA\Property(
 *         property="next_page_url",
 *         type="string",
 *         format="url",
 *         nullable=true,
 *         description="The URL of the next page",
 *         example=null
 *     ),
 *     @OA\Property(
 *         property="path",
 *         type="string",
 *         format="url",
 *         description="The base URL path",
 *         example="http://127.0.0.1:8000/api/admin/permission"
 *     ),
 *     @OA\Property(
 *         property="per_page",
 *         type="integer",
 *         description="The number of items per page",
 *         example=10
 *     ),
 *     @OA\Property(
 *         property="prev_page_url",
 *         type="string",
 *         format="url",
 *         nullable=true,
 *         description="The URL of the previous page",
 *         example=null
 *     ),
 *     @OA\Property(
 *         property="to",
 *         type="integer",
 *         description="The ending item number on this page",
 *         example=3
 *     ),
 *     @OA\Property(
 *         property="total",
 *         type="integer",
 *         description="The total number of items",
 *         example=3
 *     )
 * )
 */


    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
