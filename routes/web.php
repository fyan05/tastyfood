<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\GambarTentangController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });

//Admin
Route::get('admin/dashboard/', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('loginpost', [AdminController::class, 'loginpost'])->name('loginpost');
Route::get('logout', [AdminController::class, 'logout'])->name('logout');

//Tentang
Route::get('admin/tentang', [TentangController::class, 'index'])->name('admin.tentang');
Route::post('admin/tenstore',[TentangController::class,'store'])->name('tenstore');
Route::put('admin/tenupdate/{id}',[TentangController::class,'update'])->name('tenupdate');
Route::delete('admin/tendestroy/{id}',[TentangController::class,'delete'])->name('tendestroy');

//Tentang Gambar
Route::get('admin/tentang/gambar', [GambarTentangController::class, 'gambar'])->name('admin.tentang.gambar');
Route::post('admin/gambarstore',[GambarTentangController::class,'store'])->name('admin.gamabrstore');
Route::put('admin/gambarupdate/{id}',[GambarTentangController::class,'update'])->name('admin.gambarupdate');
Route::delete('admin/gambardestroy/{id}',[GambarTentangController::class,'delete'])->name('admin.gambardestroy');

//Kontak
Route::get('admin/kontak', [KontakController::class, 'kontak'])->name('admin.kontak');
Route::post('admin/kontakstore',[KontakController::class,'store'])->name('kontakstore');
Route::put('admin/kontakupdate/{id}',[KontakController::class,'update'])->name('kontakupdate');
Route::delete('admin/kontakdestroy/{id}',[KontakController::class,'delete'])->name('kontakdestroy');

//Berita
Route::get('admin/berita', [BeritaController::class, 'berita'])->name('admin.berita');
Route::post('admin/beritastore',[BeritaController::class,'store'])->name('berita.store');
Route::put('admin/beritaupdate/{id}',[BeritaController::class,'update'])->name('berita.update');
Route::delete('admin/beritadestroy/{id}',[BeritaController::class,'delete'])->name('berita.destroy');

//Gallery
Route::get('admin/gambar',[GaleryController::class,'index'])->name('admin.gambar');
Route::post('admin/galerystore',[GaleryController::class,'store'])->name('gallery-store');
Route::put('admin/galeryupdate/{id}',[GaleryController::class,'update'])->name('gallery-update');
Route::delete('admin/galerydestroy/{id}',[GaleryController::class,'delete'])->name('gallery-delete');


// user
Route::get('/',[UserController::class, 'home'])->name('home');
Route::get('/kontak',[UserController::class, 'kontak'])->name('kontak');
Route::get('/tentang',[UserController::class, 'tentang'])->name('tentang');
Route::get('/berita',[UserController::class, 'berita'])->name('berita');
Route::get('/detailberita/{id}',[UserController::class, 'detailberita'])->name('detailberita');
Route::get('/galeri',[UserController::class, 'galeri'])->name('galeri');


