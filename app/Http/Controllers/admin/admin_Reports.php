<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class admin_Reports extends Controller
{
    public function Reports(){
        return view('admin.index2');
    }
}
