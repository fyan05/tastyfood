<?php

namespace App\Http\Controllers;

use App\Models\kontak;
use App\Models\ulasan;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    //
    public function kontak()
    {
        $data = kontak::all();
        return view('admin.kontak', compact('data'));
    }

    public function markAsRead($id){
        $kontak = ulasan::findOrFail($id);
        $kontak->status = 'terbaca';
        $kontak->save();
        return redirect()->route('admin.kontak')->with('success','Pesan telah ditandai sebagai terbaca');
    }
    public function store ( Request $request){

        $request->validate([
            'Name'=>'required|string',
            'Email'=>'required|email',
            'Subject'=>'required|string',
            'Message'=>'required|string',
        ]);

        kontak::create([
            'nama'=>$request->Name,
            'email'=>$request->Email,
            'subject'=>$request->Subject,
            'pesan'=>$request->Message,
            'status'=>'belum terbaca',
        ]);

        return redirect()->route('kontak')->with('success','Pesan Anda telah terkirim');
    }
}
