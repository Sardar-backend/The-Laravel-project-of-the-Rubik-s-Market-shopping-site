<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\productcategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isNull;

class admin_category extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = productcategory::query();
        if ($keyword = request('search')) {
            $category= $category->where('name', 'LIKE',"%$keyword%")->orWhere('id', 'LIKE',"%$keyword%");
        }

        $category = $category->orderBy('updated_at')->paginate(10);
        return view('admin/componnets/categry',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/componnets/create_cat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $cat = $request->validate([
            'name' => ['required','string','max:255'],
            'parent' => ['nullable','string','max:255'],
        ]);

         $parent=productcategory::firstWhere('name', $cat['parent']);
        if (!$parent and  !isNull($cat['parent'])) {
            Alert::error('خطا','دسته بندی والد موجود نمی باشد');

            return back();
        }
        $cat['parent'] =0;
        if ($parent) {
            $cat['parent'] = $parent->id;
        }
        productcategory::create($cat);
        return redirect()->route('admin_category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat=productcategory::find($id);
        return view('admin/componnets/edit_cat', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(productcategory $productcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request ,productcategory $productcategory)
    {
        $user= productcategory::find($id);
        $data=$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'parent' => ['required', 'string', 'max:255'],

        ]);
        $parent=productcategory::firstWhere('name', $data['parent']);
        if (!$parent and  !isNull($data['parent'])) {
            Alert::error('خطا','دسته بندی والد موجود نمی باشد');

            return back();
        }
        $data['parent'] =0;
        if ($parent) {
            $data['parent'] = $parent->id;
        }
        $user->update($data);

        return redirect()->route('admin_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        productcategory::find($id)->delete();
        return redirect()->route('admin_category.index');
    }
}
