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


    public function store(CommentRequest $request )
    {


        $result = $this->CommentService->registercomment($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

    public function update( int $user)
    {


        $result = $this->CommentService->Updatecomment( $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

    public function destroy(int $user)
    {
        $result = $this->CommentService->Deletecomment( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Adress Deleted successfully')->build()->Response();
    }
}
