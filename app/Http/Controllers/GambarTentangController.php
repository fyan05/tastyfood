<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GambarTentangController extends Controller
{
    //
    public function gambar()
    {
        return view('admin.tentangG');
    }
}
