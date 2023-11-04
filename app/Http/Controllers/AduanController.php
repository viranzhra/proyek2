<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AduanController extends Controller
{
    public function kelas7 () {
        $title = route('aduan.kelas7')->getName();
        return view('aduan.kelas7');
    }

    public function kelas8 () {
        $title = route('aduan.kelas8')->getName();
        return view('aduan.kelas8');
    }

    public function kelas9 () {
        $title = route('aduan.kelas9')->getName();
        return view('aduan.kelas9');
    }
}
