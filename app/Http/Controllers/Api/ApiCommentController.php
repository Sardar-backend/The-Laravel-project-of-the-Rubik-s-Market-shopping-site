<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\Admin\Comment\CommentRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiCommentResource;
use App\RestfulApi\Fecades\ApiResponseFacade;
use App\Services\commentServices;
use Illuminate\Http\Request;

class ApiCommentController extends Controller
{
    public function __construct(private commentServices $CommentService) {
    }

/**
 * @OA\Get(
 *     path="/admin/Comment",
 *     summary="Retrieve the list of comments",
 *     tags={"Admin Comment"},
 *     security={{"sanctum": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="List of comments retrieved successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(
 *                     property="comments",
 *                     type="array",
 *                     @OA\Items(
 *                         ref="#/components/schemas/commentListResource"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="meta",
 *                     type="object",
 *                     description="Pagination information",
 *                     @OA\Property(
 *                         property="current_page",
 *                         type="integer",
 *                         example=1
 *                     ),
 *                     @OA\Property(
 *                         property="last_page",
 *                         type="integer",
 *                         example=5
 *                     ),
 *                     @OA\Property(
 *                         property="total",
 *                         type="integer",
 *                         example=50
 *                     )
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Authentication required"
 *             )
 *         )
 *     )
 * )
 */

    public function index(Request $request)
    {
        $result = $this->CommentService->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiCommentResource::collection($result->data)->resource)->build()->Response();
    }





    public function show(  $user )
    {
        $result = $this->CommentService->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiCommentResource::collection($result->data))->build()->Response();

    }


/**
 * @OA\Post(
 *     path="/admin/Comment",
 *     summary="Create a new comment",
 *     tags={"Admin Comment"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="parent_id",
 *         in="query",
 *         required=false,
 *         description="Parent comment ID (if this is a reply)",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Parameter(
 *         name="user_id",
 *         in="query",
 *         required=true,
 *         description="ID of the user who is creating the comment",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Parameter(
 *         name="commenttable_id",
 *         in="query",
 *         required=true,
 *         description="ID of the resource being commented on",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Parameter(
 *         name="commenttable_type",
 *         in="query",
 *         required=true,
 *         description="Type of the resource being commented on (e.g., Post, Product)",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="content",
 *         in="query",
 *         required=true,
 *         description="The content of the comment",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Comment created successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Comment created successfully"
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
 *                     property="parent_id",
 *                     type="integer",
 *                     example=null
 *                 ),
 *                 @OA\Property(
 *                     property="user_id",
 *                     type="integer",
 *                     example=12
 *                 ),
 *                 @OA\Property(
 *                     property="commenttable_id",
 *                     type="integer",
 *                     example=45
 *                 ),
 *                 @OA\Property(
 *                     property="commenttable_type",
 *                     type="string",
 *                     example="Post"
 *                 ),
 *                 @OA\Property(
 *                     property="content",
 *                     type="string",
 *                     example="This is a sample comment."
 *                 ),
 *                 @OA\Property(
 *                     property="created_at",
 *                     type="string",
 *                     format="date-time",
 *                     example="2024-11-25T12:34:56Z"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Invalid data provided"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Authentication required"
 *             )
 *         )
 *     )
 * )
 */


    public function store(CommentRequest $request )
    {


        $result = $this->CommentService->registercomment($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Comment sent successfully')->withData($result->data)->build()->Response();
    }

/**
 * @OA\Patch(
 *     path="/admin/Comment/{id}",
 *     summary="Confirm Comment",
 *     tags={"Admin Comment"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the comment to be confirmed",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Comment confirmed successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Comment approved successfully"
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
 *                     property="status",
 *                     type="string",
 *                     example="approved"
 *                 ),
 *                 @OA\Property(
 *                     property="updated_at",
 *                     type="string",
 *                     format="date-time",
 *                     example="2024-11-25T14:32:00Z"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Comment not found",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Comment not found"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Authentication required"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid request",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Invalid data provided"
 *             )
 *         )
 *     )
 * )
 */


    public function update( int $user)
    {


        $result = $this->CommentService->Updatecomment( $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Comment Approved successfully')->build()->Response();
    }

/**
 * @OA\Delete(
 *     path="/admin/Comment/{id}",
 *     summary="Delete Comment",
 *     tags={"Admin Comment"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the comment to be deleted",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Comment deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Comment deleted successfully"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Comment not found",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Comment not found"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Authentication required"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid request",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Invalid data provided"
 *             )
 *         )
 *     )
 * )
 */


    public function destroy(int $user)
    {
        $result = $this->CommentService->Deletecomment( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Comment Deleted successfully')->build()->Response();
    }
}
