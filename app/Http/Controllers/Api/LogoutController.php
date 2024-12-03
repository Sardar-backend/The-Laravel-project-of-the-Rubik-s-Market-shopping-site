<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use App\RestfulApi\Facades\ApiResponseFacade;
use App\RestfulApi\Facades\ApiResponseFacade;
use Illuminate\Http\Request;
class LogoutController extends Controller
{
    public function __invoke(){
        auth()->user()->currentAccessToken()->delete();

        return ApiResponseFacade::withMessage('Token has been deleted')->build()->Response();
    }
}
