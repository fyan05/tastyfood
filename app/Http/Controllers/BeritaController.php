<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class BeritaController extends Controller
{
    public function berita()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita', compact('beritas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string',
            'isi' => 'required',
            'nama_penulis' => 'required|string',
            'tanggal' => 'required|date',
            'kategori' => 'required|in:Makanan,Minuman',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:204800',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')
                ->store('berita', 'public');
        }

        Berita::create([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'nama_penulis' => $validated['nama_penulis'],
            'tanggal' => $validated['tanggal'],
            'kategori' => $validated['kategori'],
            'foto' => $foto,
        ]);

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string',
            'isi' => 'required',
            'nama_penulis' => 'required|string',
            'tanggal' => 'required|date',
            'kategori' => 'required|in:Makanan,Minuman',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $berita->foto = $request->file('foto')
                ->store('berita', 'public');
        }

        $berita->update($validated);

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function delete($id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            return redirect()
                ->route('admin.berita')
                ->with('error', 'ID tidak valid');
        }

        Berita::findOrFail($id)->delete();

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berita berhasil dihapus');
    }

    public function show($id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            return redirect()
                ->route('berita')
                ->with('error', 'ID tidak valid');
        }

        $berita = Berita::findOrFail($id);

        $komentar = Ulasan::where('berita_id', $berita->id)
            ->latest()
            ->get();

        return view('detail', compact('berita', 'komentar'));
    }
}
