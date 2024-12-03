<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blogcategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isNull;

class admin_blogCategory extends Controller
{
    public function index()
    {
        $category = blogcategory::query();
        if ($keyword = request('search')) {
            $category= $category->where('name', 'LIKE',"%$keyword%")->orWhere('id', 'LIKE',"%$keyword%");
        }

        $category = $category->orderBy('updated_at')->paginate(20);
        return view('admin/componnets/admin_blogCategory/categry',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/componnets/admin_blogCategory/create_cat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {

        $cat = $request->validate([
            'name' => ['required','string','max:255'],
            'parent' => ['required','string','max:255'],
        ]);
         $parent=blogcategory::firstWhere('name', $cat['parent']);

         if (!$parent and  !isNull($cat['parent'])) {
            Alert::error('خطا','دسته بندی والد موجود نمی باشد');

            return back();
        }
        $cat['parent'] =0;
        if ($parent) {
            $cat['parent'] = $parent->id;
        }
        blogcategory::create($cat);
        return redirect()->route('admin_blogCategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat=blogcategory::find($id);
        return view('admin/componnets/admin_blogCategory/edit_cat', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blogcategory $blogcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request ,blogcategory $blogcategory)
    {
        $user= blogcategory::find($id);
        $data=$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'parent' => ['required', 'string', 'max:255'],

        ]);
        $parent=blogcategory::firstWhere('name', $data['parent']);
        $parent=blogcategory::firstWhere('name', $data['parent']);
        if (!$parent and  ! isNull($data['parent'])) {
            Alert::error('خطا','دسته بندی والد موجود نمی باشد');
            return back();
        }
        $data['parent'] =0;
        if ($parent) {
            $data['parent'] = $parent->id;
        }
        $user->update($data);

        return redirect()->route('admin_blogCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        blogcategory::find($id)->delete();
        return redirect()->route('admin_blogCategory.index');
    }
}
