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
    /**
     * Display a listing of the resource.
     */
    public function __construct(private blogcategoryServices $BlogcategoryServices) {
    }
    public function index(Request $request)
    {
        $result = $this->BlogcategoryServices->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiBlogCategoryListResource::collection($result->data)->resource)->build()->Response();
    }

    public function store(BlogcategoryRequest $request )
    {


        $result = $this->BlogcategoryServices->registerblogcategory($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

    public function show(  $user )
    {
        $result = $this->BlogcategoryServices->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiBlogCategoryListResource::collection($result->data))->build()->Response();

    }


    public function update(BlogcategoryRequest $request , int $user)
    {


        $result = $this->BlogcategoryServices->Updateblogcategory($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

    public function destroy(int $user)
    {
        $result = $this->BlogcategoryServices->Deleteblogcategory( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Adress Deleted successfully')->build()->Response();
    }
}
