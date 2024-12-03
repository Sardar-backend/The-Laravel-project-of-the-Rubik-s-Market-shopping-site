<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiAdressDetailResource extends JsonResource
{
    /**
 * @OA\Schema(
 *     schema="AddressResponse",
 *     type="object",
 *     description="Response schema for address list",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         description="List of addresses",
 *         @OA\Items(
 *             type="object",
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 description="Unique ID of the address",
 *                 example=9
 *             ),
 *             @OA\Property(
 *                 property="user_id",
 *                 type="integer",
 *                 description="ID of the user associated with this address",
 *                 example=26
 *             ),
 *             @OA\Property(
 *                 property="ostan",
 *                 type="string",
 *                 description="Province of the address",
 *                 example="tehran"
 *             ),
 *             @OA\Property(
 *                 property="city",
 *                 type="string",
 *                 description="City of the address",
 *                 example="tehran"
 *             ),
 *             @OA\Property(
 *                 property="tahvil",
 *                 type="string",
 *                 description="Receiver's name or delivery information",
 *                 example="سیبیسب"
 *             ),
 *             @OA\Property(
 *                 property="adress",
 *                 type="string",
 *                 description="Detailed address",
 *                 example="سبیسیب"
 *             ),
 *             @OA\Property(
 *                 property="is_selected",
 *                 type="integer",
 *                 description="Indicates whether the address is selected (1 for selected, 0 for not selected)",
 *                 example=0
 *             ),
 *             @OA\Property(
 *                 property="number",
 *                 type="integer",
 *                 description="Phone number associated with the address",
 *                 example=22265
 *             ),
 *             @OA\Property(
 *                 property="post_number",
 *                 type="integer",
 *                 description="Postal code of the address",
 *                 example=26565
 *             ),
 *             @OA\Property(
 *                 property="failed_at",
 *                 type="string",
 *                 format="date-time",
 *                 description="The timestamp when the address became invalid or failed",
 *                 example="2024-11-21 14:17:09"
 *             )
 *         )
 *     )
 * )
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
