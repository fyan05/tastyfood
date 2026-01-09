<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gambar_tentang;

class GambarTentangController extends Controller
{
    //
    public function gambar()
    {
        return view('admin.tentangG');
    }
      public function store ( Request $request, $id){
        $validate = $request->validate ([
            'nama_file' => 'required|file|mimes:jpg,jpeg,png|max:307200',
            'tipe' => 'required|in:perushaan,visi,misi',
        ]);
        if ( $request->hasFile('nama_file')){
            $file = $request->file('nama_file');
            $filename = time() .'-'. $validate['tipe'].'.'.$file->getClientOriginalExtension();
            $file->storeAs('tentang', $filename, 'public');
        }
        gambar_tentang::create([
            'nama_file'=>$filename,
            'tipe'=>$request->tipe,
            'tentang_id'=>$id,
        ]);
        return redirect()->route('admin.tentang')->with('success','Gambar Tentang Perusahaan Berhasil Ditambahkan');
    }
}
