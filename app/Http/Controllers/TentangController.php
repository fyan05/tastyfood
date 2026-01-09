<?php

namespace App\Http\Controllers;

use App\Models\gambar_tentang;
use App\Models\tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    //
    public function index()
    {
        $data['tentang'] = Tentang::all();
        $data['gambartentang'] = gambar_tentang::all();
        return view('admin.tentang',$data);
    }
    //
   public function store(Request $request)
{

    $request->validate([
        'nama' => 'required|string',
        'deskripsi' => 'required|string',
        'visi' => 'required|string',
        'misi' => 'required|string',
        'gmail' => 'required|string',
        'no_telp' => 'required|string',
        'alamat' => 'required|string',
    ]);

    Tentang::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'visi' => $request->visi,
        'misi' => $request->misi,
        'gmail' => $request->gmail,
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat,
    ]);

    return redirect()->route('admin.tentang')
        ->with('success','Data Tentang Perusahaan Berhasil Ditambahkan');
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'gmail' => 'required|string',
            'no_telp' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $tentang = Tentang::findOrFail($id);
        $tentang->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'gmail' => $request->gmail,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.tentang')
            ->with('success','Data Tentang Perusahaan Berhasil Diupdate');
    }
    

}
