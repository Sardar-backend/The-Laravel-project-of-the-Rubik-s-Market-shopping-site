<?php

// namespace App\Http\Controllers;

// use App\Models\blog;
// use App\Models\blogcategory;
// use App\Models\Product;
// use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
// use Spatie\Sitemap\Sitemap;
// use Spatie\Sitemap\Tags\Url;

// class SitemapController extends Controller
// {
//     public function index(){
//     Sitemap::create()
//     ->add(Url::create('/home')->setPriority(1.0))
//     ->add(Url::create('/about')->setPriority(0.8))
//     ->add(Url::create('/contact')->setPriority(0.7))
//     ->add(Url::create('/error404')->setPriority(0.7))
//     ->add(Url::create('/faq')->setPriority(0.7))
//     ->add(Url::create('/contact')->setPriority(0.7))
//     ->add(Url::create('/products')->setPriority(0.7))
//     ->add(Url::create('/product-{id}')->setPriority(0.7))
//     ->add(Url::create('/cart')->setPriority(0.7))
//     ->add(Url::create('/checkout')->setPriority(0.7))
//     ->add(Url::create('/Addresses')->setPriority(0.7))
//     ->add(Url::create('/factors')->setPriority(0.7))
//     ->add(Url::create('/favorites')->setPriority(0.7))
//     ->add(Url::create('/personal')->setPriority(0.7))
//     ->add(Url::create('/blog')->setPriority(0.7))
//     ->add(Url::create('/blog-single-{id}')->setPriority(0.7))
//     ->add(Url::create('/edit')->setPriority(0.7))
//     ->add(Url::create('/blogs-{category}')->setPriority(0.7))
//     ->add(Url::create('/login_step2')->setPriority(0.7))
//     ->add(Url::create('/login')->setPriority(0.7))
//     ->add(Url::create('/logout')->setPriority(0.7))
//     ->add(Url::create('/products-list')->setPriority(0.7))
//     ->add(Url::create('/products')->setPriority(0.7))
//     ->add(Url::create('/products_popular')->setPriority(0.7))
//     ->add(Url::create('/products_cheapest')->setPriority(0.7))
//     ->add(Url::create('/products_Existing')->setPriority(0.7))
//     ->add(Url::create('/products_status')->setPriority(0.7))
//     ->add(Url::create('/cart')->setPriority(0.7))
//     ->writeToFile(public_path('sitemap.xml'));

// Route::get('/sitemap.xml', function () {
//     $sitemap = Sitemap::create();

//     $products = Product::all();

//     foreach ($products as $product) {
//         $sitemap->add(Url::create("/product-{$product->id}"));
//     }

//     $sitemap->writeToFile(public_path('sitemap.xml'));

//     return response()->file(public_path('sitemap.xml'));

// });

// Route::get('/sitemap.xml', function () {
//     $sitemap = Sitemap::create();

//     $blogs = blog::all();

//     foreach ($blogs as $blog) {
//         $sitemap->add(Url::create("/blog-single-{$blog->id}"));
//     }

//     $sitemap->writeToFile(public_path('sitemap.xml'));

//     return response()->file(public_path('sitemap.xml'));

// });


// Route::get('/sitemap.xml', function () {
//     $sitemap = Sitemap::create();

//     $blogcategorys = blogcategory::all();

//     foreach ($blogcategorys as $blogcategory) {
//         $sitemap->add(Url::create("/blogs-{$blogcategory->name}"));
//     }

//     $sitemap->writeToFile(public_path('sitemap.xml'));

//     return response()->file(public_path('sitemap.xml'));

// });
// }
// }

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Product;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL ;
use Spatie\Sitemap\Sitemap;
// use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create();

        // افزودن مسیرهای ثابت
        $sitemap->add(Url::create('/home')->setPriority(1.0))
                ->add(Url::create('/about')->setPriority(0.8))
                ->add(Url::create('/contact')->setPriority(0.7))
                ->add(Url::create('/faq')->setPriority(0.7))
                ->add(Url::create('/products')->setPriority(0.7))
                ->add(Url::create('/cart')->setPriority(0.7))
                ->add(Url::create('/checkout')->setPriority(0.7))
                ->add(Url::create('/Addresses')->setPriority(0.7))
                ->add(Url::create('/factors')->setPriority(0.7))
                ->add(Url::create('/favorites')->setPriority(0.7))
                ->add(Url::create('/personal')->setPriority(0.7))
                ->add(Url::create('/blog')->setPriority(0.7))
                ->add(Url::create('/edit')->setPriority(0.7))
                ->add(Url::create('/login_step2')->setPriority(0.7))
                ->add(Url::create('/login')->setPriority(0.7))
                ->add(Url::create('/logout')->setPriority(0.7))
                ->add(Url::create('/products_popular')->setPriority(0.7))
                ->add(Url::create('/products_cheapest')->setPriority(0.7))
                ->add(Url::create('/products_Existing')->setPriority(0.7))
                ->add(Url::create('/products_status')->setPriority(0.7));

        // افزودن محصولات
        $products = Product::all();
        foreach ($products as $product) {
            $sitemap->add(Url::create("/product-{$product->id}"));
        }

        // افزودن بلاگ‌ها
        $blogs = Blog::all();
        foreach ($blogs as $blog) {
            $sitemap->add(Url::create("/blog-single-{$blog->id}"));
        }

        // افزودن دسته‌بندی‌های بلاگ
        $blogCategories = BlogCategory::all();
        foreach ($blogCategories as $blogCategory) {
            $sitemap->add(Url::create("/blogs-{$blogCategory->name}"));
        }

        // نوشتن فایل سایت مپ
        $sitemap->writeToFile(public_path('sitemap.xml'));

        return response()->file(public_path('sitemap.xml'));
    }
}
