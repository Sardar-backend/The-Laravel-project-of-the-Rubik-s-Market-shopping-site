<?php

namespace App\Http\Controllers\Api;

use App\http\ApiRequest\admin\product\productRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiBlogCategoryListResource;
use App\Http\Resources\ApiProductDetialResource;
use App\Http\Resources\ApiProductListResource;
use App\Models\blog;
use App\Models\Product;
use App\RestfulApi\Fecades\ApiResponseFacade;
use App\Services\ProductServices;
use Illuminate\Http\Request;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\DB;

class ApiProductController extends Controller
{
    public function __construct(private ProductServices $productServices) {
    }
/**
 * @OA\Get(
 *    path="/admin/product",
 *    summary="Get a list of products",
 *    tags={"Admin Product"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="search",
 *        in="query",
 *        description="Keyword to search for products by name or category",
 *        required=false,
 *        @OA\Schema(
 *            type="string",
 *            example="شیائومی"
 *        )
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="A list of products retrieved successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="data",
 *                type="array",
 *                @OA\Items(
 *                    ref="#/components/schemas/ProductDetailResource"
 *                )
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="Unauthorized"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="error",
 *                type="string",
 *                example="An internal server error occurred"
 *            )
 *        )
 *    )
 * )
 */

    public function index(productRequest $request)
    {
        $result = $this->productServices->getAll($request->all());

        if (!$result->ok) {
            return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiProductListResource::collection($result->data)->resource)->build()->Response();
    }

/**
 * @OA\Get(
 *    path="/admin/product/{id}",
 *    summary="Get a specific product by ID",
 *    tags={"Admin Product"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the product",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Product retrieved successfully",
 *        @OA\JsonContent(ref="#/components/schemas/ProductResponse")
 *    ),
 *    @OA\Response(
 *        response=403,
 *        description="Forbidden: You are not authorized to access this resource",
 *        @OA\JsonContent(ref="#/components/schemas/403ErrorResponse")
 *    ),
 *    @OA\Examples(
 *        example="result1",
 *        summary="A sample response",
 *        value={"data": {"id": 123, "name": "Product Name", "price": 100, "category": "Electronics"}}
 *    )
 * )
 */


    public function show(  $user )
    {
        $result = $this->productServices->getInfo($user);

        // dd($result->ok);
        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData(ApiProductDetialResource::collection($result->data))->build()->Response();

    }

/**
 * @OA\Post(
 *    path="/admin/product",
 *    summary="Create Product",
 *    tags={"Admin Product"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="image",
 *        in="query",
 *        required=false,
 *        description="Product image",
 *        @OA\Schema(type="string", format="binary")
 *    ),
 *    @OA\Parameter(
 *        name="name",
 *        in="query",
 *        required=true,
 *        description="Product name",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="price",
 *        in="query",
 *        required=true,
 *        description="Product price",
 *        @OA\Schema(type="number", format="float")
 *    ),
 *    @OA\Parameter(
 *        name="description",
 *        in="query",
 *        required=false,
 *        description="Product description",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="stars",
 *        in="query",
 *        required=false,
 *        description="Number of stars",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Parameter(
 *        name="width",
 *        in="query",
 *        required=false,
 *        description="Product width",
 *        @OA\Schema(type="number", format="float")
 *    ),
 *    @OA\Parameter(
 *        name="length",
 *        in="query",
 *        required=false,
 *        description="Product length",
 *        @OA\Schema(type="number", format="float")
 *    ),
 *    @OA\Parameter(
 *        name="discount",
 *        in="query",
 *        required=false,
 *        description="Product discount",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="chosen",
 *        in="query",
 *        required=false,
 *        description="Whether the product is chosen",
 *        @OA\Schema(type="boolean")
 *    ),
 *    @OA\Parameter(
 *        name="warranty",
 *        in="query",
 *        required=false,
 *        description="Warranty period",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Parameter(
 *        name="count",
 *        in="query",
 *        required=false,
 *        description="Product stock",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Parameter(
 *        name="count_view",
 *        in="query",
 *        required=false,
 *        description="Number of views",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Parameter(
 *        name="criticism",
 *        in="query",
 *        required=false,
 *        description="Product criticism",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Parameter(
 *        name="special_sale",
 *        in="query",
 *        required=false,
 *        description="Special sale status",
 *        @OA\Schema(type="boolean")
 *    ),
 *    @OA\Parameter(
 *        name="brand",
 *        in="query",
 *        required=false,
 *        description="Product brand",
 *        @OA\Schema(type="string")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Product created successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Product created successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Unauthorized access"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="An unexpected error occurred"
 *            )
 *        )
 *    )
 * )
 */


    public function store(productRequest $request )
    {


        $result = $this->productServices->registerProduct($request->validated());


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('product Created successfully')->build()->Response();
    }

/**
 * @OA\Put(
 *    path="/api/admin/Product/{id}",
 *    summary="Update Product",
 *    tags={"Admin Product"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the product",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Product updated successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Product updated successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Product not found",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Product not found"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="An unexpected error occurred"
 *            )
 *        )
 *    )
 * )
 */

/**
 * @OA\Patch(
 *    path="/api/admin/Product/{id}",
 *    summary="Partially update Product",
 *    tags={"Admin Product"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the product",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Product partially updated successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Product partially updated successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Product not found",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Product not found"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="An unexpected error occurred"
 *            )
 *        )
 *    )
 * )
 */

    public function update(productRequest $request , int $user)
    {


        $result = $this->productServices->UpdateProduct($request->validated(), $user);


        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('product updated successfully')->withData($result->data)->build()->Response();
    }


/**
 * @OA\Delete(
 *    path="/admin/Product/{id}",
 *    summary="Delete Product",
 *    tags={"Admin Product"},
 *    security={{"sanctum":{}}},
 *    @OA\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        description="ID of the product",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Product deleted successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Product deleted successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Product not found",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Product not found"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="An unexpected error occurred"
 *            )
 *        )
 *    )
 * )
 */


    public function destroy(int $user)
    {
        $result = $this->productServices->DeleteProduct( $user);

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withMessage('Product Deleted successfully')->build()->Response();
    }

/**
 * @OA\Get(
 *    path="/last_blogproduct",
 *    summary="Retrieve the latest blog products",
 *    tags={"Other"},
 *    @OA\Response(
 *        response=200,
 *        description="A list of product resources",
 *        @OA\JsonContent(
 *            type="array",
 *            @OA\Items(
 *                ref="#/components/schemas/ProductDetailResourcee"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Products not found",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="No products found"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="An unexpected error occurred"
 *            )
 *        )
 *    )
 * )
 */



    public function last_blog_product(){


        $result = $this->productServices->lastblogproduct();

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData($result->data)->withMessage('last blog and product')->build()->Response();

    }
/**
 * @OA\Get(
 *    path="/indexview",
 *    summary="Retrieve the list of products",
 *    tags={"Other"},
 *    @OA\Response(
 *        response=200,
 *        description="A list of product resources",
 *        @OA\JsonContent(
 *            type="array",
 *            @OA\Items(
 *                ref="#/components/schemas/ProductDetailResourcee"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="No products found",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="No products found"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="An unexpected error occurred"
 *            )
 *        )
 *    )
 * )
 */



    public function indexView(){
        $result = $this->productServices->index( );

        if (!$result->ok) {
            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();
        }
        return ApiResponseFacade::withData($result->data)->withMessage('last blog and product')->build()->Response();

    }

/**
 * @OA\Get(
 *    path="/ProductList",
 *    summary="Retrieve the list of products with optional search functionality",
 *    tags={"Other"},
 *    @OA\Parameter(
 *         name="search",
 *         in="query",
 *         required=false,
 *         description="Keyword to search for products by name or category",
 *         @OA\Schema(
 *             type="string",
 *             example="شیائومی"
 *         )
 *     ),
 *    @OA\Response(
 *        response=200,
 *        description="List of Product resources",
 *        @OA\JsonContent(
 *            type="array",
 *            @OA\Items(
 *                ref="#/components/schemas/ProductDetailResourcee"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Invalid request parameters",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Invalid search query"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="No products found",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="No products found for the given search"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="An unexpected error occurred"
 *            )
 *        )
 *    )
 * )
 */




    public function ProductList(){

        $result = $this->productServices->ProductList( );

        if (!$result->ok) {

            return ApiResponseFacade::withMessage('error')->withStatus(500)->build()->Response();

        }

        return ApiResponseFacade::withData(ApiBlogCategoryListResource::collection($result->data))->withMessage('last blog and product')->build()->Response();


    }


/**
 * @OA\Post (
 *    path="/Like",
 *    summary="Like a Product",
 *    tags={"Other"},
 *    @OA\Parameter(
 *        name="product_id",
 *        in="query",
 *        required=true,
 *        description="ID of the product to be liked",
 *        @OA\Schema(type="integer")
 *    ),
 *    security ={{"sanctum":{}}},
 *    @OA\Response(
 *        response=200,
 *        description="Successfully liked the product",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Product liked successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad request",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Invalid product ID"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Unauthorized access"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal server error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="An unexpected error occurred"
 *            )
 *        )
 *    )
 * )
 */



    public function like_post (Request $request){

        $result = $this->productServices->like_post( $request);

        if (!$result->ok) {

            return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();

        }

        return ApiResponseFacade::withMessage('last blog and product')->build()->Response();

    }


/**
 * @OA\Post (
 *    path="/disLike",
 *    summary="Dislike a Product",
 *    tags={"Other"},
 *    @OA\Parameter(
 *        name="product_id",
 *        in="query",
 *        required=true,
 *        description="ID of the product to be disliked",
 *        @OA\Schema(type="integer")
 *    ),
 *    security ={{"sanctum":{}}},
 *    @OA\Response(
 *        response=200,
 *        description="Successfully disliked the product",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Product disliked successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=400,
 *        description="Bad request",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Invalid product ID"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=401,
 *        description="Unauthorized",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Unauthorized access"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal server error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="An unexpected error occurred"
 *            )
 *        )
 *    )
 * )
 */



        public function dislike_post (Request $request){

            $result = $this->productServices->dislike_post( $request->all());

        if (!$result->ok) {

            return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();

        }

        return ApiResponseFacade::withMessage('last blog and product')->build()->Response();

    }


/**
 * @OA\Delete(
 *    path="/deleteadresses",
 *    summary="Delete an address",
 *    tags={"Other"},
 *    @OA\Parameter(
 *        name="id",
 *        in="query",
 *        required=true,
 *        description="ID of the address to delete",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Response(
 *        response=204,
 *        description="Address successfully deleted"
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Address not found",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Address not found"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="An unexpected error occurred"
 *            )
 *        )
 *    )
 * )
 */



            public function deleteadresses (Request $request){

                $result = $this->productServices->deleteadresses( $request->all());

                if (!$result->ok) {

                    return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();

                }

                return ApiResponseFacade::withMessage('last blog and product')->build()->Response();

            }


/**
 * @OA\Post(
 *    path="/selectaddresses",
 *    summary="Select an address",
 *    tags={"Other"},
 *    @OA\Parameter(
 *        name="id",
 *        in="query",
 *        required=true,
 *        description="ID of the address to select",
 *        @OA\Schema(type="integer")
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="Address selected successfully",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Address selected successfully"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=404,
 *        description="Address not found",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="Address not found"
 *            )
 *        )
 *    ),
 *    @OA\Response(
 *        response=500,
 *        description="Internal Server Error",
 *        @OA\JsonContent(
 *            @OA\Property(
 *                property="message",
 *                type="string",
 *                example="An unexpected error occurred"
 *            )
 *        )
 *    )
 * )
 */


    public function selectadresses(Request $request)
    {
        $result = $this->productServices->selectadresses( $request->all());

        if (!$result->ok) {

            return ApiResponseFacade::withMessage($result->data)->withStatus(500)->build()->Response();

        }

        return ApiResponseFacade::withMessage('last blog and product')->build()->Response();

    }


}
