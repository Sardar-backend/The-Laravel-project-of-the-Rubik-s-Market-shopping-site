<?php

namespace App\Services;
use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Helpers\TrendingContent;
use App\Models\blog;
use App\Models\Product;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Hash;
use App\Models\activecode;
use App\Models\adresse;
use App\Models\productcategory;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ProductServices
{
    public function getAll(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            $products=Product::query();

            if ($keyword=isset($inputs['search'])) {

                $products= $products->where('name','LIKE',"%$keyword%")->orWhere('Brand','LIKE',"%$keyword%")->orderBy('failed_at');
            }
            return $products->paginate(10);
    });
    }

    public function getInfo( $user):ServiceResult
    {
         $user = new Collection([Product::find(id: $user)]);
        // dd($user);
        return app(ServiceWrapper::class)(fn()=>$user);

    }


    public function registerProduct(array $inputs):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs){
            // $inputs['password'] = Hash::make($inputs['password']);
            $Product=Product::create($inputs);
            return $Product;
        });

}


    public function UpdateProduct(array $inputs,int $user):ServiceResult
    {
        return app(ServiceWrapper::class)(function() use($inputs,$user){
            // $inputs['password'] = Hash::make($inputs['password']);
            $Product = Product::find( $user);
            $Product->update($inputs);
            $Product = $Product->fresh();


            return $Product;
        });

}

public function DeleteProduct(int $user):ServiceResult
{
    $user = Product::find( $user);
    // dd($user);
    return app(ServiceWrapper::class)(fn()=>$user->delete());

}

public function lastblogproduct():ServiceResult
{
    return app(ServiceWrapper::class)(function() {

        return TrendingContent::getTopViewed();
    });
}


public function index():ServiceResult
{

    return app(ServiceWrapper::class)(function() {
        // $inputs['password'] = Hash::make($inputs['password']);
        $count_view=Product::orderBy('count_view')->limit(4)->get();
        $pro = Product::where('Chosen',1)->limit(4)->get();
        $Special_sale = Product::where('Special_sale',1)->limit(2)->get();
        $disusted = Product::where('discust','>',20)->limit(4)->get();
        $blogs =blog::orderBy('failed_at')->limit(3)->get();
        $merg=[
            'count_view' => $count_view,
            'pro' => $pro,
            'Special_sale' => $Special_sale,
            'disusted' => $disusted,
            'blogs' => $blogs
        ];

        return $merg;
    });
}

public function like_post( $inputs) : ServiceResult
{
    return app(ServiceWrapper::class)(function() use ($inputs) {
    $p=Product::find($inputs['product_id']);

    $all=Auth::user()->favorite()->get();
    $status=$all->contains($p);

    if(!$status){

        Auth::user()->favorite()->attach($p->id);
        return  new Collection([$p]) ;
    }
    return  new Collection([$p]) ;

});
}


public function dislike_post( $inputs) : ServiceResult
{
    return app(ServiceWrapper::class)(function() use ($inputs) {
    $p=Product::find($inputs['product_id']);

    $all=Auth::user()->favorite()->get();
    $status=$all->contains($p);

    if($status){

        Auth::user()->favorite()->detach($p->id);
        return  new Collection([$p]) ;
    }
    return  new Collection([$p]) ;

});
}


public function deleteadresses( $inputs) : ServiceResult
{
    return app(ServiceWrapper::class)(function() use ($inputs) {
    $adresses = Auth::user()->adresses()->where('id',$inputs['id'])->delete();
    return  new Collection([$adresses]) ;

});
}


public function selectadresses( $inputs) : ServiceResult
{
    return app(ServiceWrapper::class)(function() use ($inputs) {
        $address = adresse::where('id', $inputs['id'])->where('user_id', auth()->id())->first();
        if ($address) {
            $address->selectAsPrimary();
        }

    return  new Collection([$address]) ;

});
}



public function ProductList(){
    return app(ServiceWrapper::class)(function() {
    $products=Product::query();

    if ($keyword=request('search')) {

        $products= $products->where('name','LIKE',"%$keyword%")->orWhere('id','LIKE',"%$keyword%")->orWhere('Brand','LIKE',"%$keyword%");
        // $products= $products->where('name','LIKE',"%$keyword%")->orWhere('id','LIKE',"%$keyword%")->orWhere('Brand','LIKE',"%$keyword%")->orWhereHas('category', function($query) use($keyword){

        //     $query->orWhere('name','LIKE',"%$keyword%")->limit(1);

        // })->orderBy('failed_at');

    }

    $products = $products->paginate(9);

    return $products ;

});




}
}
