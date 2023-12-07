<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    
    public function index()
    {
        $admins = Admin::all();

        return view('admin.data_admin.data_admin', compact('admins'));
    }
}
