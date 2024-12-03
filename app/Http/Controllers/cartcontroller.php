<?php

namespace App\Http\Controllers;

use App\Helpers\Cart\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Nwidart\Modules\Facades\Module;

class cartcontroller extends Controller
{
    /**
     * Display the shopping cart page.
     * Sets up SEO metadata for the page.
     *
     * @return \Illuminate\View\View
     */
    public function Cart()
    {
        $this->seo()->setTitle('Shopping Cart')
            ->setDescription('View your shopping cart here')
            ->opengraph()->setTitle('Shopping Cart')
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);

        // Get module settings (e.g., discount)
        $module = Module::find('Discount');
        // Fetch top 10 products with more than 20 views
        $products = Product::where('count_view', '>', 20)
            ->orderBy('failed_at')
            ->limit(10)
            ->get();
        $totalPrice=Cart::all()->sum(function($cart){
            return $cart['price'] * $cart['quantity'];
        });
        $totalDiscust =Cart::all()->sum(function($cart){return ((  $cart['discount_percent'] ?:  $cart['product']->discust)/100 * $cart['price'])* $cart['quantity'];});
        $FinalPrice = $totalPrice - $totalDiscust;

        return view('cart', compact('products', 'module','totalPrice','totalDiscust','FinalPrice'));
    }

    /**
     * Add a product to the shopping cart.
     * If the product already exists in the cart, update the quantity.
     *
     * @param \App\Models\Product $product
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart(Product $product, Request $request)
    {
        // Check if the product is already in the cart
        if (Cart::has($product)) {
            // Update quantity if the product is already in the cart
            Cart::update($product, $request->quantity);
        } else {
            // Add the product to the cart with its quantity, price, and color
            Cart::put(
                [
                    'quantity' => $request->quantity,
                    'price' => $product->price,
                    'color' => $request->color
                ],
                $product
            );

            // Show success alert after adding the product
            Alert::success('عملیات موفق آمیز بود',' محصول به سبد خرید شما اضافه شد');        }

        // Redirect back to the previous page
        return back();
    }

    /**
     * Remove a product from the cart.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteFromCart(Product $product)
    {
        // Delete the product from the cart
        Cart::delete($product);

        // Redirect back to the previous page
        return back();
    }

    /**
     * Remove all items from the cart.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAll()
    {
        // Clear the entire cart
        session()->forget('cart');

        // Redirect back to the previous page
        return back();
    }

    /**
     * Update the quantity of a product in the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCart(Request $request)
    {
        // Get product ID and quantity from the request
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Find the product in the cart
        $cartItem = Cart::where('product_id', $productId)->first();

        // Update the quantity if the product exists in the cart
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();

            return response()->json(['success' => true]);
        }

        // Return an error if the product is not found
        return response()->json(['success' => false], 400);
    }
}
