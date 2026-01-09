<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    public function index()
    {
        $galeries = Galery::latest()->get();
        return view('admin.galery', compact('galeries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png',
            'video'  => 'nullable|mimes:mp4,mov,avi|max:20480'
        ]);

        $data = $request->only('judul');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('galery', 'public');
        }

        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('galery', 'public');
        }

        Galery::create($data);

        return back()->with('success', 'Galeri berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $galery = Galery::findOrFail($id);

        $request->validate([
            'judul'  => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png',
            'video'  => 'nullable|mimes:mp4,mov,avi|max:20480'
        ]);

        $data = $request->only('judul');

        if ($request->hasFile('gambar')) {
            if ($galery->gambar) Storage::disk('public')->delete($galery->gambar);
            $data['gambar'] = $request->file('gambar')->store('galery', 'public');
        }

        if ($request->hasFile('video')) {
            if ($galery->video) Storage::disk('public')->delete($galery->video);
            $data['video'] = $request->file('video')->store('galery', 'public');
        }

        $galery->update($data);

        return back()->with('success', 'Galeri berhasil diupdate');
    }

    public function delete($id)
    {
        $galery = Galery::findOrFail($id);

        if ($galery->gambar) Storage::disk('public')->delete($galery->gambar);
        if ($galery->video) Storage::disk('public')->delete($galery->video);

        $galery->delete();

        return back()->with('success', 'Galeri berhasil dihapus');
    }
}
