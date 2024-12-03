<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\LoginApiRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiUserListResource;
use App\Models\User;
use App\RestfulApi\Facades\ApiResponseFacade;
use App\Services\authServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct(private authServices $authServices) {
    }

    /**
    * @OA\Post (
    *    path="/Login_step1",
    *    summary="Get Token ",
    *     @OA\Parameter(
    *         name="phonenumber",
    *         in="query",
    *         required=true,
    *         description="User's phone number",
    *         @OA\Schema(type="string", maxLength=255)
    *     ),
    *
    *    tags={"Auth"},

    *    @OA\Response(
    *    response=200,
    *    description="List of Role resources"
    * )
    *)
    */
    public function step1(Request $request){

        $result = $this->authServices->step1($request->all());

        if (!$result->ok) {

            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();

        }

        return ApiResponseFacade::withMessage('Code sent')->build()->Response();

    }

        /**
    * @OA\Post (
    *    path="/Login_step2",
    *    summary="Get Token ",
    *     @OA\Parameter(
    *         name="code",
    *         in="query",
    *         required=true,
    *         description="User's phone number",
    *         @OA\Schema(type="string", maxLength=255)
    *     ),
    *
    *    tags={"Auth"},

    *    @OA\Response(
    *    response=200,
    *    description="List of Role resources"
    * )
    *)
    */

    public function step2(Request $request){

        $result = $this->authServices->step2($request->all());

        // dd($result);
        if (!$result->ok) {

            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();

        }
        $token=auth()->user()->createToken('API Token')->plainTextToken;
        return ApiResponseFacade::withMessage('Login Successful')->withData(array('token' => $token))->build()->Response();

        // return ApiResponseFacade::withMessage('Code sent')->build()->Response();

    }



    // public function __invoke(LoginApiRequest $Request){
    //     $f=User::where('phonenumber', $Request->phonenumber )->first();
    //     if (!$f) {
    //         return ApiResponseFacade::withMessage(__('auth.failed'))->withStatus(401)->build()->Response();
    //     }
    //     Auth::loginUsingId($f->id);

    //     $token=auth()->user()->createToken('API Token')->plainTextToken;
    //     return ApiResponseFacade::withMessage('Login Successful')->withData(array('token' => $token))->build()->Response();
    // }
}
