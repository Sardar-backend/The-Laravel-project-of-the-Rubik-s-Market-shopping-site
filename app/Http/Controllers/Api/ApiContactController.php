<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\ApiContactsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiContactsListResource;
use App\RestfulApi\Fecades\ApiResponseFacade;
use App\Services\contactsServices;
use Illuminate\Http\Request;

class ApiContactController extends Controller
{

    public function __construct(private contactsServices $contactsServices) {
        $this->middleware('auth:sanctum')->only(['index', 'show']);
    }
    /**
     * @OA\Get (
     *    path="/admin/contact",
     *    summary="Get blogs List",
     *    tags={"Contact"},
     *    security ={{"sanctum":{}}},
    *    @OA\Response(
    *        response=200,
    *        description="List of Role resources",
    *        @OA\JsonContent(ref="#/components/schemas/ContactPagination")
    *    ),
    *    @OA\Response(
    *        response=401,
    *        description="Unauthorized"
    *    ),
    *    @OA\Response(
    *        response=500,
    *        description="Internal Server Error"
    *    )
     *)
     */
    public function index(Request $request)
    {
        $result = $this->contactsServices->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiContactsListResource::collection($result->data)->resource)->build()->Response();
    }

    /**
 * @OA\Get(
 *    path="/admin/contact/{id}",
 *    summary="Get Contact",
 *    tags={"Contact"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the Contact ",
 *        @OA\Schema(type="integer")
 *    ),

 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized"
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error"
 *    ),
*
    *    @OA\Response(
    *    response=200,
    *    description="Craete  productcategory ",
    *        @OA\JsonContent(
    *            @OA\Property(
    *                property="data",
    *                type="object",
    *                @OA\Property(
    *                    property="data",
    *                    type="array",
    *                    @OA\Items(
    *                        ref="#/components/schemas/Contact"
    *                    )
    *                )
    *            )
    *        )
     *     ),
 * )
 */

    public function show(  $user )
    {
        $result = $this->contactsServices->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiContactsListResource::collection($result->data))->build()->Response();

    }

    /**
     * @OA\Post (
     *    path="/admin/contact",
     *    summary="Create Contact",
     *    tags={"Contact"},
           *    @OA\Parameter(
        *        name="name",
        *        in="query",
        *        required=true,
        *        description="ID of the Contact ",
        *        @OA\Schema(type="string")
        *    ),
        *    @OA\Parameter(
        *        name="number_phone",
        *        in="query",
        *        required=true,
        *        description="ID of the Contact ",
        *        @OA\Schema(type="integer")
        *    ),
        *    @OA\Parameter(
        *        name="email",
        *        in="query",
        *        required=true,
        *        description="ID of the Contact ",
        *        @OA\Schema(type="string",format="email")
        *    ),
        *    @OA\Parameter(
        *        name="subject",
        *        in="query",
        *        required=true,
        *        description="ID of the Contact ",
        *        @OA\Schema(type="string")
        *    ),
        *    @OA\Parameter(
        *        name="content",
        *        in="query",
        *        required=true,
        *        description="ID of the Contact ",
        *        @OA\Schema(type="string",format="textarea")
        *    ),
        *

     *

                  *    @OA\Response(
        *        response=200,
        *        description="Show blog ",
        *        @OA\JsonContent(
                    *     @OA\Property(
                    *         property="message",
                    *         type="string",
                    *         example="Your message has been sent successfully"
                    *     ),
        *        )

        *    ),
     *)
     */

    public function store(ApiContactsRequest $request )
    {

        // dd($request->validated());
        $result = $this->contactsServices->registercontacts($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Your message has been sent successfully')->build()->Response();
    }
}
