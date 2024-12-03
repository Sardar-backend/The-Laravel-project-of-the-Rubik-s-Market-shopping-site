<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\RestfulApi\Fecades\ApiResponseFacade;
use Illuminate\Http\Request;

class GetCurrentUserController extends Controller
{
    public function __invoke(){
        return ApiResponseFacade::withAppends([
            'Token' => auth()->user()->currentAccessToken()
        ])->build()->Response();
    }
}
