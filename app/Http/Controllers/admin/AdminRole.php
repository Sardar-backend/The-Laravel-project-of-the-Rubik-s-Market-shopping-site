<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\role as Role;
use Illuminate\Http\Request;

class AdminRole extends Controller
{
    public function index()
    {
        $Roles=Role::query();
        if ($keyword=request('search')) {
            $blogs=$Roles->where('name','LIKE',"%$keyword%")->orWhere('display_name','LIKE',"%$keyword%")->orWhere('id','LIKE',"%$keyword%");
        }
        $Roles = $Roles->orderBy('updated_at')->paginate(20);
        return view('admin/componnets/ACL/Role/index', compact('Roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin/componnets/ACL/Role/Role_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name' => ['required'],
            'display_name' => ['required'],
            'permissions' => ['required']
        ]);
        $role=Role::create($data);
        $role->permissions()->attach($data['permissions']);
        return redirect()->route('Roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Role=Role::find($id);
        return view('admin/componnets/ACL/Role/Role_edit',compact('Role'));
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
            'display_name' => ['required'],
            'permissions' => ['required']
        ]);
        $role=Role::findOrFail($id);
        $role->update($data);
        $role->permissions()->sync($data['permissions']);

        return redirect()->route('Roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::find($id)->delete();
        return back();
    }
}
