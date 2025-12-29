<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\galery;
use App\Models\kontak;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
    return view('admin.dashboard', [
        'totalBerita' => berita::count(),
        'totalGaleri' => galery::count(),
        'totalKontak' => kontak::count(),
        'beritaTerbaru' => Berita::latest()->take(5)->get(),
    ]);
    }
}
