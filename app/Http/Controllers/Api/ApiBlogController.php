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
    /**
     * Display a listing of the resource.
     */
    public function __construct(private blogServices $BlogServices) {
    }
    public function index(Request $request)
    {
        $result = $this->BlogServices->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiBlogListResource::collection($result->data)->resource)->build()->Response();
    }


    public function show(  $user )
    {
        $result = $this->BlogServices->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiBlogDetialResource::collection($result->data))->build()->Response();

    }

    public function store(BlogRequest $request )
    {


        $result = $this->BlogServices->registerblog($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }


    public function update(BlogRequest $request , int $user)
    {


        $result = $this->BlogServices->Updateblog($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

    public function destroy(int $user)
    {
        $result = $this->BlogServices->Deleteblog( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Adress Deleted successfully')->build()->Response();
    }
}
