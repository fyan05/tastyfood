<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
          $beritaUtama = [
            'judul' => 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus...',
            'gambar' => 'images/berita-utama.jpg'
        ];

        $berita = [
            [
                'judul' => 'LOREM IPSUM',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'gambar' => 'images/berita1.jpg'
            ],
            [
                'judul' => 'LOREM IPSUM',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'gambar' => 'images/berita2.jpg'
            ],
            [
                'judul' => 'LOREM IPSUM',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'gambar' => 'images/berita3.jpg'
            ],
            [
                'judul' => 'LOREM IPSUM',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'gambar' => 'images/berita4.jpg'
            ],
        ];

        $galeri = [
            'images/galeri1.jpg',
            'images/galeri2.jpg',
            'images/galeri3.jpg',
            'images/galeri4.jpg',
            'images/galeri5.jpg',
            'images/galeri6.jpg',
        ];
        return view('user.home',compact('beritaUtama','berita','galeri'));
    }
    public function kontak(){
        return view('user.kontak');
    }
    public function tentang(){
        return view('user.tentang');
    }
    public function berita(){
        return view('user.berita');
    }
    public function detailberita($id){
        return view('user.detailberita', compact('id'));
    }
    public function galeri(){
        return view('user.galeri');
    }
}
