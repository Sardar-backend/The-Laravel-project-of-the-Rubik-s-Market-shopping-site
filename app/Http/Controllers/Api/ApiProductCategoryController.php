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
    /**
     * Display a listing of the resource.
     */
    public function __construct(private productcategoryServices $ProductategoryService) {
    }
    public function index(Request $request)
    {
        $result = $this->ProductategoryService->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiProductCategoryListResource::collection($result->data)->resource)->build()->Response();
    }


    public function show(  $user )
    {
        $result = $this->ProductategoryService->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiProductCategoryDetialResource::collection($result->data))->build()->Response();

    }


    public function store(productcategoryRequest $request )
    {


        $result = $this->ProductategoryService->registerproductcategory($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }
    public function update(productcategoryRequest $request , int $user)
    {


        $result = $this->ProductategoryService->Updateproductcategory($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

    public function destroy(int $user)
    {
        $result = $this->ProductategoryService->Deleteproductcategory( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Adress Deleted successfully')->build()->Response();
    }
}
