<?php

namespace App\Helpers\Cart;

use Illuminate\Support\Facades\Facade;

/**
 * class Cart
 * @package App\Helpers\Cart
 * @method static bool has($id);
 * @method static Collection all();
 * @method static array get($id);
 * @method static Cart put(array $value , Models $obj = null);
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor() : string
    {
        return 'cart';
    }

}
