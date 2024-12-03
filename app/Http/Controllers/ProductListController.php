<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\productcategory;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
/**
 * Displays a list of products with an optional search filter.
 * Sets up SEO and OpenGraph meta tags for the products page.
 */
public function products() {
    // Set SEO and OpenGraph meta tags for the products page
    $this->seo()->setTitle('Products')
        ->setDescription('View all products here')
        ->opengraph()->setTitle('Products')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);

    // Query to retrieve all products
    $products = Product::query();

    // Apply search filter if a keyword is provided in the request
    if ($keyword = request('search')) {
        $products = $products->where('name', 'LIKE', "%$keyword%")
            ->orWhere('Brand', 'LIKE', "%$keyword%")
            ->orderBy('failed_at'); // Assuming 'failed_at' is the correct sorting column
    }

    // Retrieve the top 4 product categories based on updated_at
    $categories = productcategory::orderBy('updated_at')->limit(4)->get();

    // Paginate the products (9 per page)
    $products = $products->paginate(9);

    // Return the products view with the products and categories data
    return view('products', compact('products', 'categories'));
}

/**
 * Displays a list of products that have a warranty.
 * Sets up SEO and OpenGraph meta tags for the products with warranty page.
 */
public function products_status() {
    // Set SEO and OpenGraph meta tags for products with warranty
    $this->seo()->setTitle('Products with Warranty')
        ->setDescription('View all products with warranty here')
        ->opengraph()->setTitle('Products with Warranty')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);

    // Query to retrieve products with a warranty
    $products = Product::query();
    $products = $products->where('garant', 'LIKE', true)->orderBy('failed_at');

    // Paginate the products (10 per page)
    $products = $products->paginate(10);

    // Retrieve the top 4 product categories based on updated_at
    $categories = productcategory::orderBy('updated_at')->limit(4)->get();

    // Return the products view with the products and categories data
    return view('products', compact('products', 'categories'));
}

/**
 * Displays a list of available products in stock.
 * Sets up SEO and OpenGraph meta tags for the in-stock products page.
 */
public function products_Existing() {
    // Set SEO and OpenGraph meta tags for in-stock products
    $this->seo()->setTitle('In-Stock Products')
        ->setDescription('View all available products here')
        ->opengraph()->setTitle('In-Stock Products')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);

    // Query to retrieve products that are in stock
    $products = Product::query();
    $products = $products->where('count', '>', 0)->orderBy('failed_at');

    // Paginate the products (10 per page)
    $products = $products->paginate(10);

    // Retrieve the top 4 product categories based on updated_at
    $categories = productcategory::orderBy('updated_at')->limit(4)->get();

    // Return the products view with the products and categories data
    return view('products', compact('products', 'categories'));
}

/**
 * Displays a list of the cheapest products.
 * Sets up SEO and OpenGraph meta tags for the cheapest products page.
 */
public function products_cheapest() {
    // Set SEO and OpenGraph meta tags for cheapest products
    $this->seo()->setTitle('Cheapest Products')
        ->setDescription('View all the cheapest products here')
        ->opengraph()->setTitle('Cheapest Products')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);

    // Query to retrieve products sorted by price
    $products = Product::query();
    $products = $products->orderBy('price'); // Assuming 'price' is the column to sort by

    // Paginate the products (10 per page)
    $products = $products->paginate(10);

    // Retrieve the top 4 product categories based on updated_at
    $categories = productcategory::orderBy('updated_at')->limit(4)->get();

    // Return the products view with the products and categories data
    return view('products', compact('products', 'categories'));
}

/**
 * Displays a list of the most popular products.
 * Sets up SEO and OpenGraph meta tags for the popular products page.
 */
public function products_popular() {
    // Set SEO and OpenGraph meta tags for popular products
    $this->seo()->setTitle('Popular Products')
        ->setDescription('View all the popular products here')
        ->opengraph()->setTitle('Popular Products')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);

    // Query to retrieve products sorted by view count (popularity)
    $products = Product::query();
    $products = $products->orderBy('count_view'); // Assuming 'count_view' is the correct column for popularity

    // Paginate the products (10 per page)
    $products = $products->paginate(10);

    // Retrieve the top 4 product categories based on updated_at
    $categories = productcategory::orderBy('updated_at')->limit(4)->get();

    // Return the products view with the products and categories data
    return view('products', compact('products', 'categories'));
}

/**
 * Displays products by category.
 * Sets up SEO and OpenGraph meta tags for the category products page.
 */
public function Cat_products() {
    // Set SEO and OpenGraph meta tags for products by category
    $this->seo()->setTitle('Products')
        ->setDescription('View all products here')
        ->opengraph()->setTitle('Products')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);

    // Query to retrieve products filtered by category name
    $products = Product::query();

    // Apply search filter if a keyword is provided for category name
    if ($keyword = request('search')) {
        $products = $products->WhereHas('category', function($query) use ($keyword) {
            $query->Where('name', 'LIKE', "%$keyword%");
        })->orderBy('failed_at');
    }

    // Retrieve the top 4 product categories based on updated_at
    $categories = productcategory::orderBy('updated_at')->limit(4)->get();

    // Paginate the products (9 per page)
    $products = $products->paginate(9);

    // Return the products view with the products and categories data
    return view('products', compact('products', 'categories'));
}

/**
 * Filters products by price range and availability options.
 * Returns the filtered products as a JSON response.
 */
public function filterByPrice(Request $request) {
    // Clean and convert the min and max price inputs
    $minPrice = preg_replace("/,/", '', $request->input('min_price'));
    $maxPrice = preg_replace("/,/", '', $request->input('max_price'));

    // Create a query to retrieve products based on filters
    $query = Product::query();

    // Apply filter for products that are ready to ship (if selected)
    if ($request->input('ready_to_ship')) {
        $query->where('count', '>', 0); // Filter for products with stock
    }
    if ($CategoryName=$request->input('cat')) {
        $query = productcategory::wherename($CategoryName)->first()->products();
        // dd($query);
        $query->where('count', '>', 0); // Filter for products with stock
    }

    // Apply filter for products with a warranty (if selected)
    if ($request->input('HasWarranty')) {
        $query->where('garant', '!=', 'بدون گارانتی'); // Filter for products with warranty
    }

    // Apply filter for price range
    if ($maxPrice && $minPrice) {
        $query->whereBetween('price', [$minPrice, $maxPrice]); // Filter by price range
    }

    // Include the product gallery and order by 'failed_at' (assuming it's the correct date column)
    $query->with('gallery')->orderBy('failed_at');

    // Execute the query and retrieve the filtered products
    $products = $query->get();

    // Return the filtered products as a JSON response
    return response()->json([
        'status' => 'success',
        'products' => $products,
        'all' => $products->count(),
    ]);
}


}
