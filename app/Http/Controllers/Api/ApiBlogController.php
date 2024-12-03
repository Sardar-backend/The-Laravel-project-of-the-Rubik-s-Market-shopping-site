<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\BlogRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiBlogDetialResource;
use App\Http\Resources\ApiBlogListResource;
use Illuminate\Http\Request;
use App\RestfulApi\Fecades\ApiResponseFacade;
use App\Services\blogServices;

class ApiBlogController extends Controller
{

    public function __construct(private blogServices $BlogServices) {
    }
    /**
     * @OA\Get (
     *    path="/admin/blog",
     *    summary="List of articles",
     *    tags={"Admin Blog"},
     *    security ={{"sanctum":{}}},
 *    @OA\Response(
 *        response=200,
 *        description="Show blog ",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="data",
 *                type="object",
 *                @OA\Property(
 *                    property="data",
 *                    type="array",
 *                    @OA\Items(
 *                        ref="#/components/schemas/BlogListResource"
 *                    )
 *                )
 *            )
 *        )
 *    ),
     *)
     */
    public function index(BlogRequest $request)
    {
        $result = $this->BlogServices->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiBlogListResource::collection($result->data)->resource)->build()->Response();
    }

    /**
 * @OA\Get(
 *    path="/admin/blog/{id}",
 *    summary="Get article",
 *    tags={"Admin Blog"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the blog ",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Show blog ",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="data",
 *                type="object",
 *                @OA\Property(
 *                    property="data",
 *                    type="array",
 *                    @OA\Items(
 *                        ref="#/components/schemas/BlogDetailResource"
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
        $result = $this->BlogServices->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiBlogDetialResource::collection($result->data))->build()->Response();

    }

/**
 * @OA\Post(
 *    path="/admin/blog",
 *    summary="Create article",
 *    tags={"Admin Blog"},
 *    security={{"sanctum":{}}},
 *
 *    @OA\Parameter(
 *        name="title",
 *        in="query",
 *        required=true,
 *        description="Title of the article",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="content",
 *        in="query",
 *        required=true,
 *        description="The text of the article",
 *        @OA\Schema(type="string")
 *    ),
 *
 *    @OA\RequestBody(
 *        required=true,
 *        description="Photo of the article and categories",
 *        content={
 *            @OA\MediaType(
 *                mediaType="multipart/form-data",
 *                @OA\Schema(
 *                    type="object",
 *                    required={"image", "categories"},
 *                    @OA\Property(
 *                        property="image",
 *                        type="string",
 *                        format="binary",
 *                        description="Photo of the article"
 *                    ),
 *                    @OA\Property(
 *                        property="categories",
 *                        type="array",
 *                        @OA\Items(type="integer"),
 *                        description="Category related to the article"
 *                    )
 *                )
 *            )
 *        }
 *    ),
 *
 *    @OA\Response(
 *        response=200,
 *        description="Create blog"
 *    )
 * )
 */

    public function store(BlogRequest $request )
    {


        $result = $this->BlogServices->registerblog($request);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('article updated successfully')->withData($result->data)->build()->Response();
    }

        /**
     * @OA\Put (
     *    path="/admin/blog/{id}",
     *    summary="Update article",
     *     @OA\Parameter(
    *         name="id",
    *         in="path",
    *         required=true,
    *         description="ID of the article",
    *         @OA\Schema(type="integer")
    *     ),
 *    @OA\Parameter(
 *        name="title",
 *        in="query",
 *        required=true,
 *        description="Title of the article",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="content",
 *        in="query",
 *        required=true,
 *        description="The text of the article",
 *        @OA\Schema(type="string")
 *    ),
 *
 *    @OA\RequestBody(
 *        required=true,
 *        description="Photo of the article and categories",
 *        content={
 *            @OA\MediaType(
 *                mediaType="multipart/form-data",
 *                @OA\Schema(
 *                    type="object",
 *                    required={"image", "categories"},
 *                    @OA\Property(
 *                        property="image",
 *                        type="string",
 *                        format="binary",
 *                        description="Photo of the article"
 *                    ),
 *                    @OA\Property(
 *                        property="categories",
 *                        type="array",
 *                        @OA\Items(type="integer"),
 *                        description="Category related to the article"
 *                    )
 *                )
 *            )
 *        }
 *    ),
     *    tags={"Admin Blog"},
     *    security ={{"sanctum":{}}},
     *    @OA\Response(
     *    response=200,
     *    description="Update  article "
     * )
     *)
     * @OA\patch (
     *    path="/admin/blog/{id}",
     *    summary="Update blog",
     *     @OA\Parameter(
    *         name="id",
    *         in="path",
    *         required=true,
    *         description="ID of the article",
    *         @OA\Schema(type="integer")
    *     ),
                *    @OA\Parameter(
        *        name="title",
        *        in="query",
        *        required=false,
        *        description="ID of the blog ",
        *        @OA\Schema(type="integer")
        *    ),
        *    @OA\Parameter(
        *        name="discription",
        *        in="query",
        *        required=false,
        *        description="ID of the blog ",
        *        @OA\Schema(type="string")
        *    ),
        *    @OA\Parameter(
        *        name="image",
        *        in="query",
        *        required=false,
        *        description="ID of the blog ",
        *        @OA\Schema(type="string", format="binary")
        *    ),
        *    @OA\Parameter(
        *        name="categories",
        *        in="query",
        *        required=false,
        *        description="ID of the blog ",
        *        @OA\Schema(type="array",
        *            @OA\Items(type="integer")
             )
        *    ),
     *    tags={"Admin Blog"},
     *    security ={{"sanctum":{}}},
     *    @OA\Response(
     *    response=200,
     *    description="Craete  blog "
     * )
     *)
     */

    public function update(BlogRequest $request , int $user)
    {


        $result = $this->BlogServices->Updateblog($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('article updated successfully')->withData($result->data)->build()->Response();
    }

        /**
     * @OA\Delete (
     *    path="/admin/blog/{id}",
     *    summary="Delete blog",
     *     @OA\Parameter(
    *         name="id",
    *         in="path",
    *         required=true,
    *         description="ID of the article",
    *         @OA\Schema(type="integer")
    *     ),
     *
     *    tags={"Admin Blog"},
     *    security ={{"sanctum":{}}},
     *    @OA\Response(
     *    response=200,
     *    description="Delete  blog "
     * )
     *)
     */
    public function destroy(int $user)
    {
        $result = $this->BlogServices->Deleteblog( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('article Deleted successfully')->build()->Response();
    }
}
