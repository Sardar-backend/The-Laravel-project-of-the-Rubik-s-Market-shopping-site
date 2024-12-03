<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\Admin\User\UserStoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiAdressListResource;
use App\Http\Resources\ApiBlogListResource;
use App\Http\Resources\ApiDetailUser;
use App\Http\Resources\ApiProductCategoryListResource;
use App\Http\Resources\ApiProductListResource;
use App\Http\Resources\ApiUserListResource;
use App\RestfulApi\Fecades\ApiResponseFacade;
use App\Services\profileServices;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiprofileController extends Controller
{
    public function __construct(private profileServices $userService) {
    }

/**
 * @OA\Get (
 *     path="/profile/favorate",
 *     summary="Get favorite List",
 *     tags={"profile"},
 *     security={{"sanctum":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="List of favorite products",
 *         @OA\JsonContent(ref="#/components/schemas/ProductResponse")
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal Server Error"
 *     )
 * )
 */


    public function favorate(){
        $result = $this->userService->getAllfavoriets();
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiProductListResource::collection($result->data)->resource)->build()->Response();
    }


/**
 * @OA\Get (
 *     path="/profile/orders",
 *     summary="Get orders List",
 *     tags={"profile"},
 *     security={{"sanctum":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="List of orders resources"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal Server Error"
 *     )
 * )
 */


    public function orders(){
        $result = $this->userService->orders();
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiBlogListResource::collection($result->data)->resource)->build()->Response();
    }



    /**
     * @OA\Get (
     *    path="/profile/Adresses",
     *    summary="Get Adresses List",
     *
     *
     *    tags={"profile"},
     *    security ={{"sanctum":{}}},
         *    @OA\Response(
    *        response=200,
    *        description="List of Role resources",
    *        @OA\JsonContent(ref="#/components/schemas/AddressResponse")
    *    ),
     *)
     */


    public function Adresses(){
        $result = $this->userService->Adresses();
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiAdressListResource::collection($result->data)->resource)->build()->Response();
    }

/**
 * @OA\Post (
 *    path="/profile/logout",
 *    summary="Logout",
 *    tags={"profile"},
 *    security={{"sanctum":{}}},
 *    @OA\Response(
 *        response=200,
 *        description="Logout successful response",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Logout was successful"
 *            )
 *        )
 *    )
 * )
 */


    public function logout(){
        Auth::logout();
        return ApiResponseFacade::withMessage('Logout was successful')->build()->Response();
    }


            /**
 * @OA\Get(
 *    path="/profile",
 *    summary="Get user",
 *    tags={"profile"},
 *    security={{"sanctum":{}}},

     *    @OA\Response(
    *        response=200,
    *        description="List of Role resources",
    *        @OA\JsonContent(ref="#/components/schemas/ProfileResponse")
    *    ),
    *    @OA\Response(
    *        response=401,
    *        description="Unauthorized"
    *    ),
    *    @OA\Response(
    *        response=500,
    *        description="Internal Server Error"
    *    )

 * )
 */



    public function show()
    {
        $result = $this->userService->getInfo();

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiDetailUser::collection($result->data))->build()->Response();

    }



/**
 * @OA\Patch (
 *    path="/profile/edit/{id}",
 *    summary="Update user profile (partial)",
 *    description="Partially update the user's profile information",
 *    tags={"profile"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the user to update",
 *         @OA\Schema(type="integer")
 *     ),
 *    @OA\Parameter(
 *         name="name",
 *         in="query",
 *         required=true,
 *         description="User's name",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 *    @OA\Parameter(
 *         name="phonenumber",
 *         in="query",
 *         required=true,
 *         description="User's phone number",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 * @OA\Parameter(
 *     name="birthday",
 *     in="query",
 *     required=true,
 *     description="User's birthday in the format YYYY-MM-DD HH:MM:SS",
 *     @OA\Schema(
 *         type="string",
 *         pattern="^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$",
 *         example="2024-10-25 00:00:00"
 *     )
 * ),
 *    @OA\Parameter(
 *         name="meli_code",
 *         in="query",
 *         required=true,
 *         description="User's national ID code",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 *    @OA\Parameter(
 *         name="image",
 *         in="query",
 *         required=true,
 *         description="Profile image URL or base64 string",
 *         @OA\Schema(type="string", format="binary")
 *     ),
 *    @OA\Response(
 *         response=200,
 *         description="User profile updated successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Profile updated successfully"
 *             )
 *         )
 *     ),
 *    @OA\Response(
 *         response=400,
 *         description="Bad request",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Invalid parameters provided"
 *             )
 *         )
 *     )
 * )
 *
 * @OA\Put (
 *    path="/profile/edit/{id}",
 *    summary="Update user profile (full)",
 *    description="Fully update the user's profile information",
 *    tags={"profile"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the user to update",
 *         @OA\Schema(type="integer")
 *     ),
 *    @OA\Parameter(
 *         name="name",
 *         in="query",
 *         required=true,
 *         description="User's name",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 *    @OA\Parameter(
 *         name="phonenumber",
 *         in="query",
 *         required=true,
 *         description="User's phone number",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 *    @OA\Parameter(
 *         name="meli_code",
 *         in="query",
 *         required=true,
 *         description="User's national ID code",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 *    @OA\Parameter(
 *         name="image",
 *         in="query",
 *         required=true,
 *         description="Profile image URL or base64 string",
 *         @OA\Schema(type="file", format="binary")
 *     ),
 *    @OA\Parameter(
 *         name="cart_number",
 *         in="query",
 *         required=true,
 *         description="User's cart number",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 * @OA\Parameter(
 *     name="birthday",
 *     in="query",
 *     required=true,
 *     description="User's birthday in the format YYYY-MM-DD HH:MM:SS",
 *     @OA\Schema(
 *         type="string",
 *         pattern="^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$",
 *         example="2024-10-25 00:00:00"
 *     )
 * ),
 *    @OA\Parameter(
 *         name="home_number",
 *         in="query",
 *         required=true,
 *         description="User's home phone number",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 *    @OA\Parameter(
 *         name="email",
 *         in="query",
 *         required=true,
 *         description="User's email address",
 *         @OA\Schema(type="string", format="email", maxLength=255)
 *     ),
 *    @OA\Response(
 *         response=200,
 *         description="User profile updated successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Profile updated successfully"
 *             )
 *         )
 *     ),
 *    @OA\Response(
 *         response=400,
 *         description="Bad request",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Invalid parameters provided"
 *             )
 *         )
 *     )
 * )
 */



    public function update(UserStoreRequest $request , int $user)
    {


        $result = $this->userService->UpdateUser($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

}
