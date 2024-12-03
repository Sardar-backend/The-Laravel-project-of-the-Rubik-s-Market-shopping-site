<?php

namespace App\Http\Controllers\admin;
use App\Models\permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPermissions extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions=permission::query();
        if ($keyword=request('search')) {
            $blogs=$permissions->where('name','LIKE',"%$keyword%")->orWhere('display_name','LIKE',"%$keyword%")->orWhere('id','LIKE',"%$keyword%");
        }
        $permissions = $permissions->orderBy('updated_at')->paginate(20);
        return view('admin/componnets/ACL/permission/index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin/componnets/ACL/permission/permission_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name' => ['required'],
            'display_name' => ['required']
        ]);
        permission::create($data);

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission=permission::find($id);
        return view('admin/componnets/ACL/permission/permission_edit',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'name' => ['required'],
            'display_name' => ['required']
        ]);
        permission::findOrFail($id)->update($data);

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        permission::find($id)->delete();
        return back();
    }
}
