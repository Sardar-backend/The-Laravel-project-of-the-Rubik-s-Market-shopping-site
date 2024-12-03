<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\BlogRequest;
use App\http\ApiRequest\RoleRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiRoleDetailResource;
use App\Http\Resources\ApiRoleListResource;
use App\RestfulApi\Fecades\ApiResponseFacade;
use App\Services\roleServices;
use Illuminate\Http\Request;

class ApiRoleController extends Controller
{
    public function __construct(private roleServices $RoleServices) {
    }

/**
 * @OA\Get (
 *    path="/admin/Role",
 *    summary="Get Role List",
 *    tags={"Admin Role"},
 *    security={{"sanctum":{}}},
 *    @OA\Response(
 *        response=200,
 *        description="List of Role resources",
 *        @OA\JsonContent(
 *            ref="#/components/schemas/RoleListResponse"
 *        )
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




    public function index(RoleRequest $request)
    {
        $result = $this->RoleServices->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiRoleListResource::collection($result->data)->resource)->build()->Response();
    }


/**
 * @OA\Get(
 *    path="/admin/Role/{id}",
 *    summary="Get Role Details",
 *    tags={"Admin Role"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the Role",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Details of the specified role",
 *        @OA\JsonContent(ref="#/components/schemas/RoleResource")
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized: You do not have permission to access this resource."
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Not Found: The specified role could not be found."
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error: Something went wrong on the server."
 *    )
 * )
 */



    public function show(  $user )
    {
        $result = $this->RoleServices->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        // dd(vars: $result->data);
        return ApiResponseFacade::withData(ApiRoleDetailResource::collection($result->data))->build()->Response();

    }

/**
 * @OA\Post(
 *    path="/admin/Role",
 *    summary="Create a new Role",
 *    tags={"Admin Role"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="name",
 *        in="query",
 *        required=true,
 *        description="The name of the role",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="display_name",
 *        in="query",
 *        required=true,
 *        description="The display name for the role",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="permissions",
 *        in="query",
 *        required=true,
 *        description="Array of permission IDs associated with the role",
 *        @OA\Schema(
 *            type="array",
 *            @OA\Items(type="integer")
 *        ),
 *        style="form",
 *        explode=true
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Role created successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Role created successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad Request: Invalid or missing parameters"
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized: You do not have permission to perform this action"
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error: Something went wrong on the server"
 *    )
 * )
 */



    public function store(RoleRequest $request )
    {


        $result = $this->RoleServices->registerrole($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Role created successfully')->build()->Response();
    }

/**
 * @OA\Put(
 *    path="/admin/Role/{id}",
 *    summary="Update Role",
 *    tags={"Admin Role"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the Role",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Parameter(
 *        name="name",
 *        in="query",
 *        required=true,
 *        description="Name of the role",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="display_name",
 *        in="query",
 *        required=true,
 *        description="Display name of the role",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="permissions",
 *        in="query",
 *        required=false,
 *        description="Array of permission IDs",
 *        @OA\Schema(
 *            type="array",
 *            @OA\Items(type="integer")
 *        ),
 *        style="form",
 *        explode=true
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Role updated successfully"
 *    )
 * )
 *
 * @OA\Patch(
 *    path="/admin/Role/{id}",
 *    summary="Partially Update Role",
 *    tags={"Admin Role"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the Role",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Parameter(
 *        name="name",
 *        in="query",
 *        required=false,
 *        description="Name of the role",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="display_name",
 *        in="query",
 *        required=false,
 *        description="Display name of the role",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="permissions",
 *        in="query",
 *        required=false,
 *        description="Array of permission IDs",
 *        @OA\Schema(
 *            type="array",
 *            @OA\Items(type="integer")
 *        ),
 *        style="form",
 *        explode=true
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Role partially updated successfully"
 *    )
 * )
 */


    public function update(BlogRequest $request , int $user)
    {


        $result = $this->RoleServices->Updaterole($request->all(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

            /**
     * @OA\Delete (
     *    path="/admin/Role/{id}",
     *    summary="Delete Role",
     *     @OA\Parameter(
    *         name="id",
    *         in="path",
    *         required=true,
    *         description="ID of the user",
    *         @OA\Schema(type="integer")
    *     ),
     *
     *    tags={"Admin Role"},
     *    security ={{"sanctum":{}}},
            *    @OA\Response(
        *        response=200,
        *        description="Show blog ",
        *        @OA\JsonContent(
                    *     @OA\Property(
                    *         property="message",
                    *         type="string",
                    *         example="Role Deleted successfully"
                    *     ),
        *        )

        *    ),

     *
     *
     *)
     */
    public function destroy(int $user)
    {
        $result = $this->RoleServices->Deleterole( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Role Deleted successfully')->build()->Response();
    }
}
