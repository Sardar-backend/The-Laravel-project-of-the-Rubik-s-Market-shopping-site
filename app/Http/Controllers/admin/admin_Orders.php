<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\notificationCode;
use Illuminate\Http\Request;

class admin_Orders extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Orders = Order::query();

        if ($keywords = request('search')) {
            $Orders = $Orders->where('tracking_serial', 'LIKE', "%$keywords%")
                ->orWhereHas('user', function ($query) use ($keywords) {
                    $query->where('name', 'LIKE', "%$keywords%");
                });
        }

        $Orders = $Orders->orderByRaw("FIELD(status, 'paid', 'posted', 'recieved', 'unpaid', 'cancelled')")
            ->orderBy('updated_at')
            ->paginate(10);


        return view('admin.componnets.Order', compact('Orders'));

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->status =='paid') {
            Order::findOrFail($id)->update(['status'=>'posted']);
            $request->user()->notify(new notificationCode($request->user()->name,$request->user()->phonenumber , 'Ghasedak'));
        }else {
            Order::findOrFail($id)->update(['status'=>'recieved']);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
