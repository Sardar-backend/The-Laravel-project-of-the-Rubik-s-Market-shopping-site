<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\CartRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiCartResource;
use App\RestfulApi\Fecades\ApiResponseFacade;
use App\Services\CartServices;
use Illuminate\Http\Request;

class ApiCartController extends Controller
{
    public function __construct(private CartServices $cartServices) {
    }
/**
 * @OA\Get(
 *     path="/Cart",
 *     summary="Retrieve cart items",
 *     tags={"Cart"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful response"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Cart not found"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */

    public function index(Request $request)
    {
        $result = $this->cartServices->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiCartResource::collection($result->data)->resource)->build()->Response();
    }



/**
 * @OA\Post(
 *     path="/Cart",
 *     summary="Create Cart",
 *     tags={"Cart"},
 *     security={{"sanctum":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="query",
 *         required=true,
 *         description="ID of the product to add to the cart",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Parameter(
 *         name="quantity",
 *         in="query",
 *         required=true,
 *         description="Quantity of the product",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="The item has been successfully added to the cart",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="The item has been added to the shopping cart"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request or validation error"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */


     public function store(Request $request )
     {


         $result = $this->cartServices->registerCart($request->all());


         if (!$result->ok) {
             return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
         }
         return ApiResponseFacade::withMessage('The item has been added to the shopping cart')->build()->Response();
     }









/**
 * @OA\Delete(
 *     path="/Cart/{id}",
 *     summary="Delete Single Item from Cart",
 *     tags={"Cart"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the product to delete from the cart",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Item successfully deleted",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Item deleted successfully"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Item not found"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */


    public function destroySingle(Request $request,  int $user)
    {
        $result = $this->cartServices->UpdateCart($request->all(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('item deleted successfully')->build()->Response();
    }

/**
 * @OA\Delete(
 *     path="/Cart",
 *     summary="Delete All Items from Cart",
 *     tags={"Cart"},
 *     @OA\Response(
 *         response=200,
 *         description="All products in your cart have been removed",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="All products in your cart have been removed"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="No items found in the cart"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */

        public function destroyAll()
    {

        $result = $this->cartServices->DeleteCart();

        // if (!$result->ok) {
        //     return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        // }
        return ApiResponseFacade::withMessage('All products in your cart have been removed')->build()->Response();

    }
}
