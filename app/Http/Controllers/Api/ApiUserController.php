<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\Admin\User\UserStoreRequest;

use App\Http\Resources\ApiDetailUser;

use App\Http\Controllers\Controller;

use App\Http\Resources\ApiUserListResource;

use App\Models\User;

use App\RestfulApi\Fecades\ApiResponseFacade;

use Illuminate\Http\Request;

use App\Services\UserServices;


class ApiUserController extends Controller
{
    public function __construct(private UserServices $userService) {
    }
    public function index(Request $request)
    {
        $result = $this->userService->getAll($request->all());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiUserListResource::collection($result->data)->resource)->build()->Response();
    }

    public function store(UserStoreRequest $request )
    {

            $result = $this->userService->registerUser($request->validated());


            if (!$result->ok) {
                return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
            }
            return ApiResponseFacade::withMessage('User created successfully')->withData($result->data)->build()->Response();

    }

    /**
     * Display the specified resource.
     */
    public function show( User $user )
    {
        $result = $this->userService->getInfo($user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiDetailUser::collection($result->data))->build()->Response();

    }


    public function update(UserStoreRequest $request , int $user)
    {


        $result = $this->userService->UpdateUser($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

    public function destroy(int $user)
    {
        $result = $this->userService->DeleteUser( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User Deleted successfully')->build()->Response();
    }
}
