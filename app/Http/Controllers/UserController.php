<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\galery;
use App\Models\gambar_tentang;
use App\Models\tentang;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        //   $beritaUtama = Berita::latest()->first();

        // $berita =

        // $galeri =
        $data['beritaUtama'] = berita::latest()->first();
        $data['berita'] = berita::latest()->skip(1)->take(5)->get();
        $data['galeri'] = galery::latest()->take(6)->get();
        return view('user.home',$data);
    }
    public function kontak(){
        return view('user.kontak');
    }
    public function tentang(){
        $data['tentang'] = tentang::all();
        $data['gambartentang'] = gambar_tentang::all();
        return view('user.tentang', $data);
    }
    public function berita(){
        $data['berita'] = berita::latest()->first();
        
        return view('user.berita');
    }
    public function detailberita($id){
        return view('user.detailberita', compact('id'));
    }
    public function galeri(){
        $foto = galery::Where('tipe', 'foto')->latest()->get();
        $data['caraousel'] = $foto->take(3);
        $data['lainnya'] = $foto->slice(3)->take(12);
        return view('user.galeri', $data);
    }

}
