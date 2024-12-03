<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\Admin\Blogcategory\BlogcategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiBlogCategoryListResource;
use App\RestfulApi\Fecades\ApiResponseFacade;
use App\Services\blogcategoryServices;
use Illuminate\Http\Request;

class ApiBlogCategoryController extends Controller
{
    public function __construct(private blogcategoryServices $BlogcategoryServices) {
    }
/**
 * @OA\Get(
 *     path="/admin/BlogCategory",
 *     summary="Get BlogCategory List",
 *     tags={"Admin BlogCategory"},
 *     security={{"sanctum": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="List of BlogCategory resources",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(
 *                     property="data",
 *                     type="array",
 *                     @OA\Items(ref="#/components/schemas/BlogCategoryListResource")
 *                 )
 *             )
 *         )
 *     )
 * )
 */

    public function index(Request $request)
    {
        $result = $this->BlogcategoryServices->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiBlogCategoryListResource::collection($result->data)->resource)->build()->Response();
    }

/**
 * @OA\Post(
 *     path="/admin/BlogCategory",
 *     summary="Create BlogCategory",
 *     tags={"Admin BlogCategory"},
 *     security={{"sanctum": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Create BlogCategory",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Blogcategory create successfully"
 *             ),
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(
 *                     property="data",
 *                     type="array",
 *                     @OA\Items(ref="#/components/schemas/BlogCategoryListResource")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         required=true,
 *         description="Name of the BlogCategory",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="parent",
 *         in="query",
 *         required=false,
 *         description="Parent of the BlogCategory",
 *         @OA\Schema(type="integer")
 *     )
 * )
 */

    public function store(BlogcategoryRequest $request )
    {


        $result = $this->BlogcategoryServices->registerblogcategory($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Blogcategory create successfully')->withData($result->data)->build()->Response();
    }


/**
 * @OA\Get(
 *     path="/admin/BlogCategory/{id}",
 *     summary="Retrieve a specific BlogCategory by ID",
 *     tags={"Admin BlogCategory"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="The unique ID of the blog category",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Details of the specified BlogCategory",
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
 *     ),

 * )
 */



    public function show(  $user )
    {
        $result = $this->BlogcategoryServices->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiBlogCategoryListResource::collection($result->data))->build()->Response();

    }

 /**
 * @OA\Put(
 *     path="/admin/BlogCategory/{id}",
 *     summary="Update BlogCategory",
 *     tags={"Admin BlogCategory"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the blog category",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         required=true,
 *         description="Name of the blog category",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="parent",
 *         in="query",
 *         required=false,
 *         description="ID of the parent category (if applicable)",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="BlogCategory updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Blogcategory updated successfully"
 *             ),
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
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Not Found: BlogCategory not found",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="BlogCategory with the given ID does not exist."
 *             )
 *         )
 *     )
 * )
 *
 * @OA\Patch(
 *     path="/admin/BlogCategory/{id}",
 *     summary="Partial update of BlogCategory",
 *     tags={"Admin BlogCategory"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the blog category",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         required=false,
 *         description="New name of the blog category",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="parent",
 *         in="query",
 *         required=false,
 *         description="New parent ID for the blog category",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="BlogCategory partially updated",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Blogcategory updated successfully"
 *             ),
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
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Not Found: BlogCategory not found",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="BlogCategory with the given ID does not exist."
 *             )
 *         )
 *     )
 * )
 */


    public function update(BlogcategoryRequest $request , int $user)
    {


        $result = $this->BlogcategoryServices->Updateblogcategory($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Blogcategory updated successfully')->withData($result->data)->build()->Response();
    }

/**
 * @OA\Delete(
 *     path="/admin/BlogCategory/{id}",
 *     summary="Delete BlogCategory",
 *     tags={"Admin BlogCategory"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the blog category to delete",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="BlogCategory deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="BlogCategory deleted successfully"
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
 *         description="Not Found: BlogCategory not found",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="BlogCategory with the given ID does not exist."
 *             )
 *         )
 *     )
 * )
 */

    public function destroy(int $user)
    {
        $result = $this->BlogcategoryServices->Deleteblogcategory( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('BlogCategory Deleted successfully')->build()->Response();
    }
}
