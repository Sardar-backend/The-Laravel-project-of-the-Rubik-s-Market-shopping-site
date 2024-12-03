<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class admin_blog extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=blog::query();
        if ($keyword=request('search')) {
            $blogs=$blogs->where('title','LIKE',"%$keyword%")->orWhere('content','LIKE',"%$keyword%")->orWhere('id','LIKE',"%$keyword%");
        }
        $blogs = $blogs->orderBy('failed_at')->paginate(20);
        return view('admin/componnets/blog',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin/componnets/blog_create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required','string'],
            'image' => ['required'],
            'categories'=> ['required','array'],
        ]);
        $data['image']='/storage/' . Storage::disk('public')->putFile( 'files', request()->file('image'));

        // dd($data);
        $obj=blog::create($data);
        $obj->category()->sync($data['categories']);
        return redirect()->route('admin_blog.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog=blog::find($id);
        return view('admin/componnets/blog_edit',compact('blog'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $data=$request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required','string'],
            'image' => ['required'],
            'categories'=> ['required','array'],
        ]);
        $data['image']=Storage::disk('public')->putFile( 'files', request()->file('image'));
        $blog=blog::find($id);
        $obj=$blog->update($data);
        $obj = $blog->fresh();
        $obj->category()->detach();
        // dd($obj->id);
        $obj->category()->sync($data['categories']);
        return redirect()->route('admin_blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        blog::find($id)->delete();
        return back();
    }
}
