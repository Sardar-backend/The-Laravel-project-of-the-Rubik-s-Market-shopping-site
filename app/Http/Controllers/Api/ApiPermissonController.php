<?php

namespace App\Http\Controllers\Api;
use App\http\ApiRequest\Admin\permission\permissionRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApipermissionDetailResource;
use App\Http\Resources\ApipermissionListResource;
use App\RestfulApi\Fecades\ApiResponseFacade;
use Illuminate\Http\Request;
use App\Services\permissionServices;
class ApiPermissonController extends Controller
{
    public function __construct(private permissionServices $permissionServices) {
    }


/**
 * @OA\Get(
 *    path="/admin/permission",
 *    summary="Get Permission List",
 *    tags={"Admin Permission"},
 *    security={{"sanctum":{}}},
 *    @OA\Response(
 *        response=200,
 *        description="List of permissions",
 *        @OA\JsonContent(
 *            ref="#/components/schemas/PermissionList"
 *        )
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Unauthorized access"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Something went wrong on the server"
 *            )
 *        )
 *    )
 * )
 */


    public function index(permissionRequest $request)
    {
        $result = $this->permissionServices->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApipermissionListResource::collection($result->data)->resource)->build()->Response();
    }


            /**
 * @OA\Get(
 *    path="/admin/permission/{id}",
 *    summary="Get permission",
 *    tags={"Admin Permission"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the permission ",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Show blog category",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="data",
 *                type="object",
 *                @OA\Property(
 *                    property="data",
 *                    type="array",
 *                    @OA\Items(
 *                        ref="#/components/schemas/PermissionItem"
 *                    )
 *                )
 *            )
 *        )
 *    ),
 *    @OA\Examples(
 *        example="result1",
 *        summary="The result 1",
 *        value={"data":{"data":{{"id":123}}}}
 *    )
 * )
 */

    public function show(  $user )
    {
        $result = $this->permissionServices->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApipermissionDetailResource::collection($result->data))->build()->Response();

    }

/**
 * @OA\Post(
 *    path="/admin/permission",
 *    summary="Create a new permission",
 *    tags={"Admin Permission"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="name",
 *        in="query",
 *        required=true,
 *        description="The unique identifier for the permission (e.g., 'edit_posts')",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="display_name",
 *        in="query",
 *        required=true,
 *        description="A user-friendly name for the permission (e.g., 'Edit Posts')",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Permission created successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Permission created successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad request, invalid input data",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Invalid input data"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Unauthorized access"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal server error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="An error occurred while creating the permission"
 *            )
 *        )
 *    )
 * )
 */


    public function store(permissionRequest $request )
    {


        $result = $this->permissionServices->registerpermission($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('permission created  successfully')->build()->Response();
    }

/**
 * @OA\Put(
 *    path="/admin/permission/{id}",
 *    summary="Update a permission",
 *    tags={"Admin Permission"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="The ID of the permission to update",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Parameter(
 *        name="name",
 *        in="query",
 *        required=true,
 *        description="The unique identifier for the permission (e.g., 'edit_posts')",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="display_name",
 *        in="query",
 *        required=true,
 *        description="A user-friendly name for the permission (e.g., 'Edit Posts')",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Permission updated successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Permission updated successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad request, invalid input data",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Invalid input data"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Unauthorized access"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal server error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="An error occurred while updating the permission"
 *            )
 *        )
 *    )
 * )
 */

/**
 * @OA\Patch(
 *    path="/admin/permission/{id}",
 *    summary="Update a permission (partial)",
 *    tags={"Admin Permission"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="The ID of the permission to update",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Parameter(
 *        name="name",
 *        in="query",
 *        required=true,
 *        description="The unique identifier for the permission (e.g., 'edit_posts')",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="display_name",
 *        in="query",
 *        required=true,
 *        description="A user-friendly name for the permission (e.g., 'Edit Posts')",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Permission updated successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Permission updated successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad request, invalid input data",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Invalid input data"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Unauthorized access"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal server error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="An error occurred while updating the permission"
 *            )
 *        )
 *    )
 * )
 */


    public function update(permissionRequest $request , int $user)
    {


        $result = $this->permissionServices->Updatepermission($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('permission updated successfully')->build()->Response();
    }

/**
 * @OA\Delete(
 *    path="/api/admin/permission/{id}",
 *    summary="Delete a permission",
 *    tags={"Admin Permission"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="The ID of the permission to delete",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Permission deleted successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Permission deleted successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Permission not found",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Permission not found"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Unauthorized access"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal server error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="An error occurred while deleting the permission"
 *            )
 *        )
 *    )
 * )
 */

    public function destroy(int $user)
    {
        $result = $this->permissionServices->Deletepermission( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('permission Deleted successfully')->build()->Response();
    }
}
