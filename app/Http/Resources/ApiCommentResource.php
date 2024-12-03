<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ApiCommentResource extends JsonResource
{
    /**
* @OA\Schema(
        *       schema = "commentListResource",
      *             @OA\Property(
     *              property = "id",
     *              type="integer",
     *               example=1
     *               ),
     *             @OA\Property(
     *              property = "content",
     *              type="string",
     *               example="این نظر منه میتونه درست باشه"
     *               ),
     *             @OA\Property(
     *              property = "status",
     *              type="integer",
     *               example=0
     *               ),
     *             @OA\Property(
     *              property = "user_name",
     *              type="string",
     *               example="Ali"
     *               ),
     *             @OA\Property(
     *              property = "updated_at",
     *              type="string",
     *               example="2024-10-05T17:44:12.000000Z"
     *               ),
       *     @OA\Property(property="first_page_url", type="string", example="http://127.0.0.1:8000/api/admin/Comment?page=1"),
 *     @OA\Property(property="from", type="integer", example=1),
 *     @OA\Property(property="last_page", type="integer", example=1),
 *     @OA\Property(property="last_page_url", type="string", example="http://127.0.0.1:8000/api/admin/Comment?page=1"),
 *     @OA\Property(
 *         property="links",
 *         type="array",
 *         description="Pagination links",
 *         @OA\Items(
 *             type="object",
 *             @OA\Property(property="url", type="string", nullable=true, example="http://127.0.0.1:8000/api/admin/Comment?page=1"),
 *             @OA\Property(property="label", type="string", example="&laquo; Previous"),
 *             @OA\Property(property="active", type="boolean", example=false)
 *         )
 *     ),
 *     @OA\Property(property="next_page_url", type="string", nullable=true, example=null),
 *     @OA\Property(property="path", type="string", example="http://127.0.0.1:8000/api/admin/Comment"),
 *     @OA\Property(property="per_page", type="integer", example=10),
 *     @OA\Property(property="prev_page_url", type="string", nullable=true, example=null),
 *     @OA\Property(property="to", type="integer", example=6),
 *     @OA\Property(property="total", type="integer", example=6)
)

 * @OA\Schema(
 *     schema="CommentResponse",
 *     type="object",
 *     description="Response schema for a successful user update",
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Comment sent successfully"
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         description="Details of the updated user",
 *         @OA\Property(property="content", type="string", example="fesfsefes"),
 *         @OA\Property(property="user_id", type="string", example="26"),
 *         @OA\Property(property="commenttable_type", type="string", example="App\\Models\\blog"),
 *         @OA\Property(property="commenttable_id", type="string", example="2"),
 *         @OA\Property(property="id", type="integer", example=19)
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="ProductResponse",
 *     type="object",
 *     description="Response schema for product list",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         description="List of products",
 *         @OA\Items(
 *             type="object",
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="The name of the product",
 *                 example="گوشی موبایل سامسونگ مدل Galaxy A21s"
 *             ),
 *             @OA\Property(
 *                 property="price",
 *                 type="integer",
 *                 description="The price of the product",
 *                 example=35000000
 *             ),

* @OA\Property(
*     property="description",
*     type="string",
*     description="Product description",
*     nullable=true,
*     example=null
* ),

 *             @OA\Property(
 *                 property="stars",
 *                 type="integer",
 *                 description="The star rating of the product",
 *                 example=3
 *             ),
      * @OA\Property(
     *     property="width",
     *     type="integer",
     *     description="Width of the product",
     *     nullable=true,
     *     example=null
     * ),




     * @OA\Property(
     *     property="length",
     *     type="integer",
     *     description="Length of the product",
     *     example=17
     * ),



     * @OA\Property(
     *     property="discount",
     *     type="integer",
     *     description="Discount percentage",
     *     nullable=true,
     *     example=null
     * ),




     * @OA\Property(
     *     property="count",
     *     type="integer",
     *     description="Available stock count",
     *     example=10
     * ),




     * @OA\Property(
     *     property="count_view",
     *     type="integer",
     *     description="Number of views for the product",
     *     example=202
     * ),

 *
 *
* @OA\Property(
*     property="image",
*     type="array",
*     @OA\Items(
*         type="string",
*         description="Path to the image",
*         example="/storage/photos/1/p103.png"
*     )
* ),
 *             @OA\Property(
 *                 property="brand",
 *                 type="string",
 *                 description="The brand of the product, null if not available",
 *                 example=null
 *             )
 *         )
 *     )
 * )
 *
 */



    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'content' => $this->content,
           'status' => $this->status,
            'user_name' => optional($this->user)->name,
            'updated_at' => $this->updated_at,
        ];
    }
}
