<?php

namespace Modules\Discount\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Discount\Models\Discount;
use Nwidart\Modules\Facades\Module;
use RealRashid\SweetAlert\Facades\Alert;

class DiscountController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all=Discount::all();
        $module= Module::find('Discount');
        return view('discount::admin.index', compact('all','module'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {

        return view('discount::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data=$request->validate(
            [
                'code' => ['required', 'string', 'max:50'],
                'percent' => ['required', 'numeric', 'between:1,100'],
                'Users' => ['nullable', 'array', 'exists:users,id'],
                'productcategory' => ['nullable', 'array', 'exists:productcategory,id'],
                'Products' => ['nullable', 'array', 'exists:products,id'],
                'expired_at'=> ['nullable']
            ],[
                'code.required' => 'وارد کردن کد تخفیف الزامی است.',
                'code.string' => 'کد تخفیف باید به صورت متن باشد.',
                'code.max' => 'طول کد تخفیف نباید بیشتر از ۵۰ کاراکتر باشد.',

                'percent.required' => 'درصد تخفیف باید وارد شود.',
                'percent.numeric' => 'درصد تخفیف باید به صورت عددی باشد.',
                'percent.between' => 'درصد تخفیف باید بین ۱ تا ۱۰۰ باشد.',


                'Users.array' => 'فرمت کاربران باید به صورت آرایه باشد.',
                'Users.exists' => 'کاربر انتخاب شده معتبر نمی‌باشد.',


                'productcategory.array' => 'فرمت دسته‌بندی‌ها باید به صورت آرایه باشد.',
                'productcategory.exists' => 'دسته‌بندی انتخاب شده معتبر نمی‌باشد.',



                'Products.array' => 'فرمت محصولات باید به صورت آرایه باشد.',
                'Products.exists' => 'محصول انتخاب شده معتبر نمی‌باشد.',
            ]
        );

        $discount=Discount::create($data);
        if (isset($data['Users'])) {
            $discount->users()->sync($data['Users']);
            # code...
        }
        if (isset($data['Products'])) {
            $discount->products()->sync($data['Products']);

        }
        if (isset($data['productcategory'])) {
            $discount->categories()->sync($data['productcategory']);

        }

        return redirect()->route('discount.index');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $Discount=Discount::findOrFail($id);
        $users=$Discount->users()->get();
        $products=$Discount->products()->get();
        $categories=$Discount->categories()->get();
        return view('discount::admin.edit',compact('users', 'products', 'categories', 'Discount'));
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
    public function update(Request $request, $id): RedirectResponse
    {
        $data=$request->validate(
            [
                'code' => ['required', 'string', 'max:50'],
                'percent' => ['required', 'numeric', 'between:1,100'],
                'Users' => ['nullable', 'array', 'exists:users,id'],
                'productcategory' => ['nullable', 'array', 'exists:productcategory,id'],
                'Products' => ['nullable', 'array', 'exists:products,id'],
                'expired_at'=> ['nullable']
            ],[
                'code.required' => 'وارد کردن کد تخفیف الزامی است.',
                'code.string' => 'کد تخفیف باید به صورت متن باشد.',
                'code.max' => 'طول کد تخفیف نباید بیشتر از ۵۰ کاراکتر باشد.',

                'percent.required' => 'درصد تخفیف باید وارد شود.',
                'percent.numeric' => 'درصد تخفیف باید به صورت عددی باشد.',
                'percent.between' => 'درصد تخفیف باید بین ۱ تا ۱۰۰ باشد.',


                'Users.array' => 'فرمت کاربران باید به صورت آرایه باشد.',
                'Users.exists' => 'کاربر انتخاب شده معتبر نمی‌باشد.',


                'productcategory.array' => 'فرمت دسته‌بندی‌ها باید به صورت آرایه باشد.',
                'productcategory.exists' => 'دسته‌بندی انتخاب شده معتبر نمی‌باشد.',



                'Products.array' => 'فرمت محصولات باید به صورت آرایه باشد.',
                'Products.exists' => 'محصول انتخاب شده معتبر نمی‌باشد.',
            ]
        );

        $discount=Discount::find($id);
        $discount->update($data);
        $discount = $discount->fresh();
        if (isset($data['Users'])) {
            $discount->users()->sync($data['Users']);

        }
        if (isset($data['Products'])) {
            $discount->products()->sync($data['Products']);

        }
        if (isset($data['productcategory'])) {
            $discount->categories()->sync($data['productcategory']);

        }

        return redirect()->route('discount.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Discount::findOrFail($id)->delete();
        Alert::success('Discount deleted');
        return back();
    }
}
