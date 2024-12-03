<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      schema="ProductDetailResourcee",
 *      type="object",
 *      title="Product List Resource",
 *      description="Schema for a single product in the list",
*     @OA\Property(
*         property="current_page",
*         type="integer",
*         description="The current page number"
*     ),
*     @OA\Property(
*         property="data",
*         type="array",
*         description="List of contact records",
*         @OA\Items(
*             type="object",
 *      @OA\Property(
 *          property="id",
 *          type="integer",
 *          description="Product ID",
 *          example=1
 *      ),
 *
 *      @OA\Property(
 *          property="name",
 *          type="string",
 *          description="Product name",
 *          example="گوشی موبایل شیائومی مدل POCO X3 M2007J20CG دو سیم‌ کارت"
 *      ),
 *
 *      @OA\Property(
 *          property="price",
 *          type="integer",
 *          description="Price of the product",
 *          example=11000000
 *      ),
 *
 *      @OA\Property(
 *          property="stars",
 *          type="integer",
 *          nullable=true,
 *          description="Star rating of the product",
 *          example=3
 *      ),
  *             @OA\Property(
 *                 property="brand",
 *                 type="string",
 *                 description="The brand of the product, null if not available",
 *                 example=null
 *             ),

 *

 *     @OA\Property(
 *         property="image",
 *         type="string",
 *         description="Path to the image",
 *         example="/storage/photos/1/p103.png"
 *     ),

 *      ))),
       *     @OA\Property(
     *         property="first_page_url",
     *         type="string",
     *         format="url",
     *         description="URL to the first page"
     *     ),
     *     @OA\Property(
     *         property="from",
     *         type="integer",
     *         description="The starting index of records on the current page"
     *     ),
     *     @OA\Property(
     *         property="last_page",
     *         type="integer",
     *         description="The last page number"
     *     ),
     *     @OA\Property(
     *         property="last_page_url",
     *         type="string",
     *         format="url",
     *         description="URL to the last page"
     *     ),
     *     @OA\Property(
     *         property="links",
     *         type="array",
     *         description="Pagination navigation links",
     *         @OA\Items(
     *             type="object",
     *             @OA\Property(
     *                 property="url",
     *                 type="string",
     *                 format="url",
     *                 nullable=true,
     *                 description="URL of the pagination link"
     *             ),
     *             @OA\Property(
     *                 property="label",
     *                 type="string",
     *                 description="Label for the pagination link"
     *             ),
     *             @OA\Property(
     *                 property="active",
     *                 type="boolean",
     *                 description="Whether the link is active or not"
     *             )
     *         )
     *     ),
     *     @OA\Property(
     *         property="next_page_url",
     *         type="string",
     *         format="url",
     *         nullable=true,
     *         description="URL to the next page, if available"
     *     ),
     *     @OA\Property(
     *         property="path",
     *         type="string",
     *         format="url",
     *         description="Base path for the API endpoint"
     *     ),
     *     @OA\Property(
     *         property="per_page",
     *         type="integer",
     *         description="Number of records per page"
     *     ),
     *     @OA\Property(
     *         property="prev_page_url",
     *         type="string",
     *         format="url",
     *         nullable=true,
     *         description="URL to the previous page, if available"
     *     ),
     *     @OA\Property(
     *         property="to",
     *         type="integer",
     *         description="The ending index of records on the current page"
     *     ),
     *     @OA\Property(
     *         property="total",
     *         type="integer",
     *         description="Total number of records"
     *     )
     * )

 *
 * )
 * @OA\Schema(
 *     schema="ProductResponsece",
 *     type="object",
 *     description="Response schema for product details",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         description="List of products",
 *         @OA\Items(
 *             type="object",
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 description="Unique ID of the product",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the product",
 *                 example="گوشی موبایل سامسونگ مدل Galaxy A12"
 *             ),
 *             @OA\Property(
 *                 property="price",
 *                 type="integer",
 *                 description="Price of the product in Rials",
 *                 example=10000000
 *             ),
 *             @OA\Property(
 *                 property="count",
 *                 type="integer",
 *                 description="Stock count of the product",
 *                 example=5
 *             ),
 *             @OA\Property(
 *                 property="count_view",
 *                 type="integer",
 *                 description="Number of views for the product",
 *                 example=66
 *             ),
 *             @OA\Property(
 *                 property="stars",
 *                 type="integer",
 *                 description="Rating of the product (1 to 5)",
 *                 example=3
 *             ),
 *             @OA\Property(
 *                 property="discount_percent",
 *                 type="integer",
 *                 description="Discount percentage on the product",
 *                 example=10
 *             ),
 *             @OA\Property(
 *                 property="garant",
 *                 type="string",
 *                 description="Warranty details of the product",
 *                 example="12 ماهه گارانتی"
 *             ),
 *             @OA\Property(
 *                 property="Special_sale",
 *                 type="integer",
 *                 description="Indicates if the product is on special sale (1 for yes, 0 for no)",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="description",
 *                 type="string",
 *                 description="Detailed description of the product",
 *                 example="گوشی موبایل سامسونگ Galaxy A12 دارای طراحی زیبا و باتری قوی است."
 *             ),
 *             @OA\Property(
 *                 property="Brand",
 *                 type="string",
 *                 description="Brand of the product",
 *                 example="سامسونگ"
 *             ),
 *             @OA\Property(
 *                 property="failed_at",
 *                 type="string",
 *                 format="date-time",
 *                 description="The timestamp when the product became unavailable",
 *                 example="2024-11-21 14:17:09"
 *             )
 *         )
 *     )
 * )
 */


class ApiProductDetialResource extends JsonResource
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
            'image' => $this->gallery()->pluck('image'),
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'stars' => $this->stars,
            'width' => $this->width,
            'length' => $this->length,
            'discount' => $this->discount,
            'chosen' => $this->chosen,
            'guarantee' => $this->guarantee,
            'count' => $this->count,
            'count_view' => $this->count_view,
            'criticism' => $this->criticism,
            'special_sale' => $this->special_sale,
            'brand' => $this->brand,
        ];
    }
}


// *      @OA\Property(
//     *          property="description",
//     *          type="string",
//     *          nullable=true,
//     *          description="Product description",
//     *          example=null
//     *      ),
//     *
//     *      @OA\Property(
//     *          property="count",
//     *          type="integer",
//     *          description="Available stock for the product",
//     *          example=5
//     *      ),
//     *
//     *      @OA\Property(
//     *          property="count_view",
//     *          type="integer",
//     *          description="Number of views for the product",
//     *          example=12
//     *      ),
