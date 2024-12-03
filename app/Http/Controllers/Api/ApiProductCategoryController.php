<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\Admin\productcategory\productcategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiProductCategoryDetialResource;
use App\Http\Resources\ApiProductCategoryListResource;
use App\RestfulApi\Fecades\ApiResponseFacade;
use App\Services\productcategoryServices;
use Illuminate\Http\Request;

class ApiProductCategoryController extends Controller
{
    public function __construct(private productcategoryServices $ProductategoryService) {
    }

/**
 * @OA\Get(
 *     path="/admin/ProductCategory",
 *     summary="Get ProductCategory List",
 *     tags={"Admin ProductCategory"},
 *     security={{"sanctum": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="List of ProductCategory resources",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(
 *                     property="data",
 *                     type="array",
 *                     @OA\Items(
 *                         ref="#/components/schemas/BlogCategoryListResource"
 *                     )
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized: Authentication required",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Authentication required. Please log in."
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Forbidden: Access denied",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="You do not have permission to access this resource."
 *             )
 *         )
 *     )
 * )
 */


    public function index(Request $request)
    {
        $result = $this->ProductategoryService->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiProductCategoryListResource::collection($result->data)->resource)->build()->Response();
    }


/**
 * @OA\Get(
 *     path="/admin/ProductCategory/{id}",
 *     summary="Get ProductCategory",
 *     tags={"Admin ProductCategory"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the ProductCategory",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Details of the specified ProductCategory",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     example=123
 *                 ),
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     example="Electronics"
 *                 ),
 *                 @OA\Property(
 *                     property="parent_id",
 *                     type="integer",
 *                     nullable=true,
 *                     example=5
 *                 ),
 *                 @OA\Property(
 *                     property="created_at",
 *                     type="string",
 *                     format="date-time",
 *                     example="2024-11-01T10:00:00Z"
 *                 ),
 *                 @OA\Property(
 *                     property="updated_at",
 *                     type="string",
 *                     format="date-time",
 *                     example="2024-11-05T15:30:00Z"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized: Authentication required",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Authentication required. Please log in."
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Forbidden: Access denied",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="You do not have permission to access this resource."
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Not Found: ProductCategory does not exist",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="The specified ProductCategory does not exist."
 *             )
 *         )
 *     )
 * )
 */



    public function show(  $user )
    {
        $result = $this->ProductategoryService->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiProductCategoryDetialResource::collection($result->data))->build()->Response();

    }

/**
 * @OA\Post(
 *     path="/admin/ProductCategory",
 *     summary="Create ProductCategory",
 *     tags={"Admin ProductCategory"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         required=true,
 *         description="Name of the ProductCategory",
 *         @OA\Schema(type="string", example="Electronics")
 *     ),
 *     @OA\Parameter(
 *         name="parent",
 *         in="query",
 *         required=false,
 *         description="Parent ID of the ProductCategory (nullable)",
 *         @OA\Schema(type="integer", nullable=true, example=5)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="ProductCategory created successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="ProductCategory created successfully"
 *             ),
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     example=123
 *                 ),
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     example="Electronics"
 *                 ),
 *                 @OA\Property(
 *                     property="parent_id",
 *                     type="integer",
 *                     nullable=true,
 *                     example=5
 *                 ),
 *                 @OA\Property(
 *                     property="created_at",
 *                     type="string",
 *                     format="date-time",
 *                     example="2024-11-01T10:00:00Z"
 *                 ),
 *                 @OA\Property(
 *                     property="updated_at",
 *                     type="string",
 *                     format="date-time",
 *                     example="2024-11-01T10:00:00Z"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Validation failed for the request data."
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized: Authentication required",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Authentication required. Please log in."
 *             )
 *         )
 *     )
 * )
 */


    public function store(productcategoryRequest $request )
    {


        $result = $this->ProductategoryService->registerproductcategory($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('ProductCategory created successfully')->withData($result->data)->build()->Response();
    }

/**
 * @OA\Put(
 *     path="/admin/ProductCategory/{id}",
 *     summary="Update ProductCategory",
 *     tags={"Admin ProductCategory"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the ProductCategory to update",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         required=true,
 *         description="New name of the ProductCategory",
 *         @OA\Schema(type="string", example="Updated Category Name")
 *     ),
 *     @OA\Parameter(
 *         name="parent",
 *         in="query",
 *         required=false,
 *         description="Parent ID of the ProductCategory (nullable)",
 *         @OA\Schema(type="integer", nullable=true, example=5)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="ProductCategory updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="ProductCategory updated successfully"
 *             ),
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     example=1
 *                 ),
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     example="Updated Category Name"
 *                 ),
 *                 @OA\Property(
 *                     property="parent_id",
 *                     type="integer",
 *                     nullable=true,
 *                     example=5
 *                 ),
 *                 @OA\Property(
 *                     property="updated_at",
 *                     type="string",
 *                     format="date-time",
 *                     example="2024-11-25T10:00:00Z"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Validation failed for the request data."
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="ProductCategory not found",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="ProductCategory not found."
 *             )
 *         )
 *     )
 * )
 */

/**
 * @OA\Patch(
 *     path="/admin/ProductCategory/{id}",
 *     summary="Partial Update ProductCategory",
 *     tags={"Admin ProductCategory"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the ProductCategory to update",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         required=false,
 *         description="New name of the ProductCategory",
 *         @OA\Schema(type="string", example="Partially Updated Name")
 *     ),
 *     @OA\Parameter(
 *         name="parent",
 *         in="query",
 *         required=false,
 *         description="Parent ID of the ProductCategory (nullable)",
 *         @OA\Schema(type="integer", nullable=true, example=5)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="ProductCategory updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="ProductCategory partially updated successfully"
 *             ),
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     example=1
 *                 ),
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     example="Partially Updated Name"
 *                 ),
 *                 @OA\Property(
 *                     property="parent_id",
 *                     type="integer",
 *                     nullable=true,
 *                     example=5
 *                 ),
 *                 @OA\Property(
 *                     property="updated_at",
 *                     type="string",
 *                     format="date-time",
 *                     example="2024-11-25T10:00:00Z"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Validation failed for the request data."
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="ProductCategory not found",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="ProductCategory not found."
 *             )
 *         )
 *     )
 * )
 */

    public function update(productcategoryRequest $request , int $user)
    {


        $result = $this->ProductategoryService->Updateproductcategory($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

        /**
     * @OA\Delete (
     *    path="/admin/ProductCategory/{id}",
     *    summary="Delete ProductCategory",
     *     @OA\Parameter(
    *         name="id",
    *         in="path",
    *         required=true,
    *         description="ID of the user",
    *         @OA\Schema(type="integer")
    *     ),
     *
     *    tags={"Admin ProductCategory"},
     *    security ={{"sanctum":{}}},
        *    @OA\Response(
     *    response=200,
     *    description="Delete  productcategory ",
     *        @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property = "message",
     *             type="string",
     *             example = "Blogcategory Deleted successfully"
     *        ),

    *        )
     *     ),
     *)
     */
    public function destroy(int $user)
    {
        $result = $this->ProductategoryService->Deleteproductcategory( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Adress Deleted successfully')->build()->Response();
    }
}
