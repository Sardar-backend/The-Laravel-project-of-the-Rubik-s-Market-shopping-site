<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\Admin\Adresses\AdressStoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiAdressDetailResource;
use App\Http\Resources\ApiAdressListResource;
use App\Models\adresse;
use App\Models\blogcategory;
use App\Models\contacts;
use App\Models\Product;
use App\Models\productcategory;
use App\Models\User;
use App\RestfulApi\Fecades\ApiResponseFacade;
use App\Services\adresseServices;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use NunoMaduro\Collision\Adapters\Laravel\ExceptionHandler as LaravelExceptionHandler;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isNull;


class ApiAdressController extends Controller
{
    //This controller has methods to show a single address object and a list of addresses, as well as delete and update the address, the logic part of it is done in the adresseServices.

    public function __construct(private adresseServices $adresseServices) {
    }
    public function index(Request $request)
    {
        $result = $this->adresseServices->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiAdressListResource::collection($result->data)->resource)->build()->Response();
    }

    public function store(AdressStoreRequest $request )
    {


        $result = $this->adresseServices->registeradresse($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }


    public function show(  $user )
    {
        $result = $this->adresseServices->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiAdressDetailResource::collection($result->data))->build()->Response();

    }


    public function update(AdressStoreRequest $request , int $user)
    {


        $result = $this->adresseServices->Updateadresse($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('User updated successfully')->withData($result->data)->build()->Response();
    }

    public function destroy(int $user)
    {
        $result = $this->adresseServices->Deleteadresse( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Adress Deleted successfully')->build()->Response();
    }
}
