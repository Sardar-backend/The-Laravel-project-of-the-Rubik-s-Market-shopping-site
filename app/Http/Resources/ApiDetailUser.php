<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiDetailUser extends JsonResource
{

    /**
 * @OA\Schema(
 *     schema="ProfileResponse",
 *     type="object",
 *     description="Response schema for profile details",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(
 *             type="object",
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 example=26
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 example="Admin"
 *             ),
 *             @OA\Property(
 *                 property="home_number",
 *                 type="integer",
 *                 example=56266
 *             ),
 *             @OA\Property(
 *                 property="cart_number",
 *                 type="integer",
 *                 example=2652561
 *             ),
 *             @OA\Property(
 *                 property="birthday",
 *                 type="string",
 *                 format="date-time",
 *                 example="2005-11-23 00:00:00"
 *             ),
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 format="email",
 *                 example="jww@email.com"
 *             ),
 *             @OA\Property(
 *                 property="phonenumber",
 *                 type="integer",
 *                 example=9209293499
 *             ),
 *             @OA\Property(
 *                 property="meli_code",
 *                 type="integer",
 *                 example=2211241
 *             ),
 *             @OA\Property(
 *                 property="image",
 *                 type="string",
 *                 example="ProfilePhoto/CScWcYdpROEVjNMrHkHbSyJIdpOUZB2n19PVlV9Y.jpg"
 *             )
 *         )
 *     )
 * ),
 *
 /**
 * @OA\Schema(
 *     schema="UserListResource",
 *     type="object",
 *     title="User List Resource",
 *     description="Schema for paginated list of users",
 *
 *     @OA\Property(
 *         property="current_page",
 *         type="integer",
 *         description="The current page number",
 *         example=1
 *     ),
 *
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         description="List of user records",
 *         @OA\Items(
 *             type="object",
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 description="User ID",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the user",
 *                 example="Admin"
 *             ),
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 format="email",
 *                 description="Email address of the user",
 *                 example="jww@email.com"
 *             ),
 *             @OA\Property(
 *                 property="phonenumber",
 *                 type="integer",
 *                 description="Phone number of the user",
 *                 example=9209293499
 *             ),
 *             @OA\Property(
 *                 property="image",
 *                 type="string",
 *                 description="Profile photo path",
 *                 example="ProfilePhoto/CScWcYdpROEVjNMrHkHbSyJIdpOUZB2n19PVlV9Y.jpg"
 *             )
 *         )
 *     ),
 *
 *     @OA\Property(
 *         property="first_page_url",
 *         type="string",
 *         format="url",
 *         description="URL to the first page",
 *         example="http://api.example.com/users?page=1"
 *     ),
 *
 *     @OA\Property(
 *         property="from",
 *         type="integer",
 *         description="The starting index of records on the current page",
 *         example=1
 *     ),
 *
 *     @OA\Property(
 *         property="last_page",
 *         type="integer",
 *         description="The last page number",
 *         example=10
 *     ),
 *
 *     @OA\Property(
 *         property="last_page_url",
 *         type="string",
 *         format="url",
 *         description="URL to the last page",
 *         example="http://api.example.com/users?page=10"
 *     ),
 *
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
 *                 description="URL of the pagination link",
 *                 example="http://api.example.com/users?page=2"
 *             ),
 *             @OA\Property(
 *                 property="label",
 *                 type="string",
 *                 description="Label for the pagination link",
 *                 example="Next"
 *             ),
 *             @OA\Property(
 *                 property="active",
 *                 type="boolean",
 *                 description="Whether the link is active or not",
 *                 example=true
 *             )
 *         )
 *     ),
 *
 *     @OA\Property(
 *         property="next_page_url",
 *         type="string",
 *         format="url",
 *         nullable=true,
 *         description="URL to the next page, if available",
 *         example="http://api.example.com/users?page=2"
 *     ),
 *
 *     @OA\Property(
 *         property="path",
 *         type="string",
 *         format="url",
 *         description="Base path for the API endpoint",
 *         example="http://api.example.com/users"
 *     ),
 *
 *     @OA\Property(
 *         property="per_page",
 *         type="integer",
 *         description="Number of records per page",
 *         example=15
 *     ),
 *
 *     @OA\Property(
 *         property="prev_page_url",
 *         type="string",
 *         format="url",
 *         nullable=true,
 *         description="URL to the previous page, if available",
 *         example=null
 *     ),
 *
 *     @OA\Property(
 *         property="to",
 *         type="integer",
 *         description="The ending index of records on the current page",
 *         example=15
 *     ),
 *
 *     @OA\Property(
 *         property="total",
 *         type="integer",
 *         description="Total number of records",
 *         example=150
 *     )
 * )
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
