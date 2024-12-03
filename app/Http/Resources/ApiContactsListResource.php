<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiContactsListResource extends JsonResource
{

        /**
     * @OA\Schema(
     *     schema="ContactPagination",
     *     type="object",
     *     description="Paginated list of contacts",
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
     *             @OA\Property(
     *                 property="id",
     *                 type="integer",
     *                 description="The unique ID of the contact"
     *             ),
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 description="The name of the contact"
     *             ),
     *             @OA\Property(
     *                 property="number_phone",
     *                 type="string",
     *                 description="The phone number of the contact"
     *             ),
     *             @OA\Property(
     *                 property="content",
     *                 type="string",
     *                 description="The content of the contact message"
     *             ),
     *             @OA\Property(
     *                 property="email",
     *                 type="string",
     *                 format="email",
     *                 description="The email address of the contact"
     *             ),
     *             @OA\Property(
     *                 property="subject",
     *                 type="string",
     *                 description="The subject of the contact message"
     *             ),
     *             @OA\Property(
     *                 property="failed_at",
     *                 type="string",
     *                 format="date-time",
     *                 description="The failure date and time"
     *             )
     *         )
     *     ),
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
    * @OA\Schema(
    *     schema="Contact",
    *     type="object",
    *     title="Contact",
    *     description="Schema for a single contact record",
    *     @OA\Property(
    *         property="id",
    *         type="integer",
    *         description="The ID of the contact",
    *         example=1
    *     ),
    *     @OA\Property(
    *         property="name",
    *         type="string",
    *         description="The name of the contact",
    *         example="محمد جواد سردار آبادی"
    *     ),
    *     @OA\Property(
    *         property="number_phone",
    *         type="integer",
    *         description="The phone number of the contact",
    *         example=9209293499
    *     ),
    *     @OA\Property(
    *         property="content",
    *         type="string",
    *         description="The content of the contact message",
    *         example="سایت خوبی داری"
    *     ),
    *     @OA\Property(
    *         property="email",
    *         type="string",
    *         format="email",
    *         description="The email address of the contact",
    *         example="ef@email.com"
    *     ),
    *     @OA\Property(
    *         property="subject",
    *         type="string",
    *         description="The subject of the contact message",
    *         example="پیشنهاد"
    *     ),
    *     @OA\Property(
    *         property="failed_at",
    *         type="string",
    *         format="date-time",
    *         description="The date and time when the contact failed",
    *         example="2024-10-26 15:02:23"
    *     )
    * )
    *
    * @OA\Schema(
    *     schema="ContactList",
    *     type="object",
    *     title="Contact List",
    *     description="A list of contacts",
    *     @OA\Property(
    *         property="data",
    *         type="array",
    *         @OA\Items(ref="#/components/schemas/Contact")
    *     )
    * )
    */


    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
