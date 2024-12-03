<?php

namespace Modules\Discount\Http\Controllers\Frontend;

use App\Helpers\Cart\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Discount\Models\Discount;

class CheckDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function check(Request $request){
        $data=$request->validate([
            'cart'=>['required'],
            'discount'=>['required','exists:discounts,code'],
        ],
    ['exists'=>'این کد تخفیف وجود ندارد','discount.required'=>'اگر کد تخفیف دارید وارد کنید']);

        $discount=Discount::where('code',$data['discount'])->first();

        if (!auth()->check()) {
            return back()->withErrors([
                'discount' => 'برای استفاده از این کد تخفیف باید وارد شوید'
            ]);
        }

        if ($discount->users()->count()) {
            if (! in_array( auth()->user()->id,$discount->users()->pluck('id')->toArray())) {
                return back()->withErrors([
                    'discount' => 'شما قادر به استفاده از این کد تخفیف نیستید'
                ]);
            }
        }
        // dd($discount->expired_at < now());
        if ($discount->expired_at < now()) {
            return back()->withErrors([
                'discount' => 'مهلت استفاده از این کد به اتمام رسیده است'
            ]);
        }

        Cart::Change($discount);

        return back()->withErrors([
            'discount' => 'کد تخفیف   ' . $discount->code . 'اعمال شده است'
        ]);
    }

    public function index()
    {
        return view('discount::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('discount::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('discount::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('discount::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
