<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\contacts;
use Illuminate\Http\Request;

class admin_comment extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = comment::query();
        if ($keywords = request('search')) {
            $comments=$comments->where('content','LIKE', "%$keywords%")->orWhereHas('user', function ($query) use ($keywords) {
                $query->where('name', 'LIKE', "%$keywords%");
            });
        }
        $comments = $comments->orderBy('failed_at')->paginate(10);
        return view('admin/componnets/comment',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $comment)
    {
        $comment=comment::find($comment);
        $comment->update(['status' => 1]);
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        comment::find($id)->delete();
        return back();
    }
    public function massage()
    {
        $users = contacts::query();
        if ($keyword=request('search')) {
            $users = $users->where('name', 'LIKE', "%{$keyword}%")->orWhere('content', 'LIKE', "%{$keyword}%")->orWhere('id', 'LIKE', "%{$keyword}%");
        }
        $all=$users->paginate(20);
        return view('admin.componnets.massage',compact('all'));
        // $all=contacts::orderBy('failed_at')->get();
        // return view('admin/componnets/massage',compact('all'));
    }
}
