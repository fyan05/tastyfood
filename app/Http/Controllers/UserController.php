<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\galery;
use App\Models\gambar_tentang;
use App\Models\Komentar;
use App\Models\tentang;
use Illuminate\Contracts\Encryption\DecryptException;
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
        $data['tentang'] = tentang::first();
        $data['gambartentang'] = gambar_tentang::all();
        return view('user.tentang', $data);
    }
    public function berita(){
        $data['berita'] = berita::latest()->first();
        $data['lainnya'] = berita::latest()->skip(1)->take(8)->get();
        return view('user.berita', $data);
    }
    public function detailberita($id)
    {
        $berita = Berita::findOrFail($id);

        $komentar = Komentar::where('berita_id',$berita->id)
            ->orderBy('created_at','desc')
            ->get();

        $ratingSum = Komentar::where('berita_id',$berita->id)
            ->sum('rating');
        $ratingCount = Komentar::where('berita_id',$berita->id)
            ->count();
        return view('user.detail-berita', compact('berita','komentar'));
    }
    public function galeri(){
            $foto = Galery::latest()->get();

        $data['caraousel'] = $foto->take(3);
        $data['lainnya'] = $foto->slice(3)->take(12);
        return view('user.galeri', $data);
    }



}
