<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        return view('visi_misi', [
            'title' => 'Visi Misi',
        ]);
    }
}
