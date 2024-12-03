<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\Admin\User\UserStoreRequest;

use App\Http\Resources\ApiDetailUser;

use App\Http\Controllers\Controller;

use App\Http\Resources\ApiUserListResource;

use App\Models\User;

use App\RestfulApi\Fecades\ApiResponseFacade;

use Illuminate\Http\Request;

use App\Services\UserServices;


class ApiUserController extends Controller
{
    public function __construct(private UserServices $userService) {
    }
/**
 * @OA\Get (
 *     path="/admin/user",
 *     summary="Get User List",
 *     tags={"Admin Users"},
 *     security={{"sanctum":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="List of User resources",
 *         @OA\JsonContent(ref="#/components/schemas/UserListResource")
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

    public function index(Request $request)
    {
        $result = $this->userService->getAll($request->all());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiUserListResource::collection($result->data)->resource)->build()->Response();
    }

/**
 * @OA\Post(
 *     path="/api/user",
 *     summary="Create a new user",
 *     tags={"Admin Users"},
 *     security={{"sanctum":{}}},
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         required=true,
 *         description="User's full name",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 *     @OA\Parameter(
 *         name="phonenumber",
 *         in="query",
 *         required=true,
 *         description="User's phone number",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 *     @OA\Parameter(
 *         name="meli_code",
 *         in="query",
 *         required=true,
 *         description="User's national ID code",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 *     @OA\Parameter(
 *         name="image",
 *         in="query",
 *         required=true,
 *         description="User's profile image in URL or base64 format",
 *         @OA\Schema(type="string", format="binary")
 *     ),
 *     @OA\Parameter(
 *         name="cart_number",
 *         in="query",
 *         required=true,
 *         description="User's card number",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 *     @OA\Parameter(
 *         name="home_number",
 *         in="query",
 *         required=true,
 *         description="User's home phone number",
 *         @OA\Schema(type="string", maxLength=255)
 *     ),
 *     @OA\Parameter(
 *         name="is_superuser",
 *         in="query",
 *         required=false,
 *         description="Specifies if the user is a superuser",
 *         @OA\Schema(
 *             type="boolean",
 *             default=false
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="email",
 *         in="query",
 *         required=true,
 *         description="User's email address",
 *         @OA\Schema(type="string", format="email", maxLength=255)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User created successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="User created successfully"
 *             ),
 *             @OA\Property(
 *                 property="user_id",
 *                 type="integer",
 *                 example=101
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input or missing required fields",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Bad request: Missing required fields"
 *             )
 *         )
 *     )
 * )
 */


    public function store(UserStoreRequest $request )
    {

            $result = $this->userService->registerUser($request->validated());


            if (!$result->ok) {
                return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
            }
            return ApiResponseFacade::withMessage('User created successfully')->withData($result->data)->build()->Response();

    }

 /**
 * @OA\Get(
 *    path="/admin/user/{id}",
 *    summary="Retrieve User Information",
 *    tags={"Admin Users"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the user to retrieve",
 *        @OA\Schema(
 *            type="integer",
 *            example=1
 *        )
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="User information retrieved successfully",
 *        @OA\JsonContent(
 *            ref="#/components/schemas/ProfileResponse"
 *        )
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Invalid request parameters"
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="User not found"
 *    ),
 *    @OA\Examples(
 *        example="Success",
 *        summary="Example of successful response",
 *        value={
 *            "data": {
 *                "id": 123,
 *                "name": "John Doe",
 *                "email": "john.doe@example.com"
 *            }
 *        }
 *    ),
 *    @OA\Examples(
 *        example="NotFound",
 *        summary="Example of user not found",
 *        value={
 *            "error": "User not found"
 *        }
 *    )
 * )
 */


    public function show( User $user )
    {
        $result = $this->userService->getInfo($user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiDetailUser::collection($result->data))->build()->Response();

    }

/**
 * @OA\Patch(
 *    path="/admin/user/{id}",
 *    summary="Update User Information",
 *    tags={"Admin Users"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the user to update",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Parameter(
 *        name="name",
 *        in="query",
 *        required=true,
 *        description="User's name",
 *        @OA\Schema(type="string", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="phonenumber",
 *        in="query",
 *        required=true,
 *        description="User's phone number",
 *        @OA\Schema(type="string", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="meli_code",
 *        in="query",
 *        required=true,
 *        description="User's national ID code",
 *        @OA\Schema(type="string", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="image",
 *        in="query",
 *        required=false,
 *        description="Profile image URL or base64 string",
 *        @OA\Schema(type="string", format="binary")
 *    ),
 *    @OA\Parameter(
 *        name="cart_number",
 *        in="query",
 *        required=true,
 *        description="User's cart number",
 *        @OA\Schema(type="string", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="home_number",
 *        in="query",
 *        required=true,
 *        description="User's home phone number",
 *        @OA\Schema(type="string", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="email",
 *        in="query",
 *        required=true,
 *        description="User's email address",
 *        @OA\Schema(type="string", format="email", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="is_superuser",
 *        in="query",
 *        required=false,
 *        description="Is the user a superuser?",
 *        @OA\Schema(
 *            type="boolean",
 *            enum={true, false},
 *            default=true
 *        )
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="User updated successfully"
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Invalid request parameters"
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="User not found"
 *    )
 * )
 *
 * @OA\Put(
 *    path="/admin/user/{id}",
 *    summary="Replace User Information",
 *    tags={"Admin Users"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the user to replace",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Parameter(
 *        name="name",
 *        in="query",
 *        required=true,
 *        description="User's name",
 *        @OA\Schema(type="string", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="phonenumber",
 *        in="query",
 *        required=true,
 *        description="User's phone number",
 *        @OA\Schema(type="string", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="meli_code",
 *        in="query",
 *        required=true,
 *        description="User's national ID code",
 *        @OA\Schema(type="string", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="image",
 *        in="query",
 *        required=false,
 *        description="Profile image URL or base64 string",
 *        @OA\Schema(type="string", format="binary")
 *    ),
 *    @OA\Parameter(
 *        name="cart_number",
 *        in="query",
 *        required=true,
 *        description="User's cart number",
 *        @OA\Schema(type="string", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="home_number",
 *        in="query",
 *        required=true,
 *        description="User's home phone number",
 *        @OA\Schema(type="string", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="email",
 *        in="query",
 *        required=true,
 *        description="User's email address",
 *        @OA\Schema(type="string", format="email", maxLength=255)
 *    ),
 *    @OA\Parameter(
 *        name="is_superuser",
 *        in="query",
 *        required=false,
 *        description="Is the user a superuser?",
 *        @OA\Schema(
 *            type="boolean",
 *            enum={true, false},
 *            default=true
 *        )
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="User replaced successfully"
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Invalid request parameters"
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="User not found"
 *    )
 * )
 */


    public function update(UserStoreRequest $request , int $user)
    {


        $result = $this->userService->UpdateUser($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

/**
 * @OA\Delete(
 *    path="/admin/user/{id}",
 *    summary="Delete User",
 *    tags={"Admin Users"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the user to delete",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="User deleted successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="User deleted successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Invalid request parameters",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Invalid user ID"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="User not found",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="User not found"
 *            )
 *        )
 *    )
 * )
 */

    public function destroy(int $user)
    {
        $result = $this->userService->DeleteUser( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User Deleted successfully')->build()->Response();
    }
}
