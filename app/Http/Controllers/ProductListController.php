<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\productcategory;
use Illuminate\Http\Request;

class ProductListcontroller extends Controller
{
    public function products(){
        $this->seo()->setTitle('محصولات')
        ->setDescription('تمام محصولات اینجا ببینید')
        ->opengraph()->setTitle('محصولات')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);
        $products=Product::query();
        if ($keyword=request('search')) {
            $products= $products->where('name','LIKE',"%$keyword%")->orWhere('id','LIKE',"%$keyword%")->orWhere('Brand','LIKE',"%$keyword%")
            ->orderBy('failed_at');
        }
        if ($keyword=request('search')) {
            $products= $products->where('name','LIKE',"%$keyword%")->orWhere('id','LIKE',"%$keyword%")->orWhere('Brand','LIKE',"%$keyword%")->orWhereHas('category', function($query) use($keyword){
                $query->orWhere('name','LIKE',"%$keyword%")->limit(1);
            })->orderBy('failed_at');
        }
        if ( $to=request('up')){
            $from = preg_replace("/,/",'',request()->get('from'));
            $up = preg_replace("/,/",'',request()->get('up'));
            $products=Product::whereBetween('price' , [$from,$up]);
        }
        $categories=productcategory::orderBy('updated_at')->limit(4)->get();
        $products = $products->paginate(9);
        return view('products',compact('products','categories'));
    }


    public function products_status(){
        $this->seo()->setTitle('محصولات دارای گارانتی')
        ->setDescription('تمام محصولات دارای گارانتی اینجا ببینید')
        ->opengraph()->setTitle(' محصولات دارای گارانتی')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);
        $products=Product::query();
        $products= $products->where('garant','LIKE',true)->orderBy('failed_at');
        $products = $products->paginate(10);
        $categories=productcategory::orderBy('updated_at')->limit(4)->get();
        return view('products',compact('products','categories'));
    }

    public function products_Existing(){
        $this->seo()->setTitle('محصولات موجود')
        ->setDescription('تمام محصولات موجوداینجا ببینید')
        ->opengraph()->setTitle('محصولات موجود')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);
        $products=Product::query();
        $products= $products->where('count','>',0)->orderBy('failed_at');
        $products = $products->paginate(10);
        $categories=productcategory::orderBy('updated_at')->limit(4)->get();
            return view('products',compact('products','categories'));
        }

        public function products_cheapest(){
            $this->seo()->setTitle('ارزان ترین محصولات')
            ->setDescription('ارزان ترین محصولات اینجا ببینید')
            ->opengraph()->setTitle(' ارزان ترین محصولات')
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);
            $products=Product::query();
            $products= $products->orderBy('price');
            $products = $products->paginate(10);
            $categories=productcategory::orderBy('updated_at')->limit(4)->get();
            return view('products',compact('products','categories'));
        }

        public function products_popular(){
            $this->seo()->setTitle('محصولات محبوب')
            ->setDescription('تمام محصولات محبوب اینجا ببینید')
            ->opengraph()->setTitle('محصولات محبوب')
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);
            $products=Product::query();
            $products= $products->orderBy('count_view');
            $products = $products->paginate(10);
            $categories=productcategory::orderBy('updated_at')->limit(4)->get();
            return view('products',compact('products','categories'));
        }

        // public function products_list(){
        //     return view('products-list');
        // }

    }
