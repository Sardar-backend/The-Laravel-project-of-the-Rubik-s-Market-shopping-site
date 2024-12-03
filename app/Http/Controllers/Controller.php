<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

/**
 * @OA\Info(
 *      title="Documentary of the Rubik's Market Laravel project",
 *      version="1.0.0"
 * )
 *
 * @OA\Tag(
 *     name="Admin Blog",
 *     description="APIs for managing blogs in admin panel"
 * )
 *
 * @OA\Tag(
 *     name="Admin Users",
 *     description="APIs for managing users in admin panel"
 * )
 *
 * @OA\Tag(
 *     name="Admin BlogCategory",
 *     description="APIs for managing blog categories in admin panel"
 * )
 *
 * @OA\Tag(
 *     name="Admin ProductCategory",
 *     description="APIs for managing product categories in admin panel"
 * )
 *
 * @OA\Tag(
 *     name="Admin Comment",
 *     description="APIs for managing comments in admin panel"
 * )
 *
 * @OA\Tag(
 *     name="Admin Role",
 *     description="APIs for managing roles in admin panel"
 * )
 *
 * @OA\Tag(
 *     name="Admin Permission",
 *     description="APIs for managing permissions in admin panel"
 * )
 *
 * @OA\Tag(
 *     name="Cart",
 *     description="APIs for Cart"
 * )
 *
 * @OA\Tag(
 *     name="Admin Product",
 *     description="APIs for managing permissions in admin panel"
 * )
 * @OA\Tag(
 *     name="Contact",
 *     description="APIs for managing Contact in admin panel"
 * )
 * @OA\Tag(
 *     name="profile",
 *     description="APIs for managing  profile"
 * )
 * @OA\Tag(
 *     name="Other",
 *     description="APIs for managing"
 * )
 * @OA\Tag(
 *     name="Auth",
 *     description="APIs for user authentication"
 * )
 *
 * @OA\Schema(
 *     schema="403ErrorResponse",
 *     type="object",
 *     description="Response for access denied errors",
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Access denied"
 *     )
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests ,SEOToolsTrait;
}
