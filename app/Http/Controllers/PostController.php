<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // ================= DASHBOARD =================
  public function dashboard()
{
     $user = Auth::user()->name;

    $totalPostingan = berita::where('nama_penulis', $user)->count();

    $latestPost = berita::where('nama_penulis', $user)
                    ->orderBy('tanggal', 'desc')
                    ->limit(5)
                    ->get();

    return view('user-post.dashboard', compact(
        'totalPostingan',
        'latestPost'
    ));
}



    // ================= PROFILE =================
    public function profile()
    {
        $profile = Post::where('user_id', Auth::id())->first();
        return view('user-post.setting-profile', compact('profile'));
    }

    public function updateprofile(Request $request, $id)
    {
        $request->validate([
            'bio' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'usia' => 'required',
            'gender' => 'required|in:laki-laki,perempuan',
        ]);

        $profile = Post::where('user_id', $id)->first();

        if ($request->hasFile('image_path')) {
            $foto = $request->file('image_path');
            $filename = time() . '-' . $id . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('postImages', $filename, 'public');
        } else {
            $filename = $profile->image_path ?? null;
        }

        if ($profile) {
            $profile->update([
                'bio' => $request->bio,
                'usia' => $request->usia,
                'jenis_kelamin' => $request->gender,
                'profile_picture' => $filename,
            ]);
        } else {
            Post::create([
                'user_id' => $id,
                'bio' => $request->bio,
                'usia' => $request->usia,
                'jenis_kelamin' => $request->gender,
                'profile_picture' => $filename,
            ]);
        }

        return back()->with('success', 'Profile berhasil diperbarui');
    }


    // ================= POSTINGAN USER =================
    public function postingan()
    {
        $data = berita::where('nama_penulis', Auth::user()->name)->get();
        return view('user-post.postingan', compact('data'));
    }

    public function storepostingan(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'kategori' => 'required',
        ]);

        $foto = $request->file('gambar');
        $filename = time() . '-' . $request->judul . '.' . $foto->getClientOriginalExtension();
        $foto->storeAs('berita', $filename, 'public');

        berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $filename,
            'nama_penulis' => Auth::user()->name,
            'tanggal' => now(),
            'kategori' => $request->kategori,
        ]);

        return back()->with('success', 'Postingan berhasil ditambahkan');
    }

    public function updatepostingan(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'kategori' => 'required',
        ]);

        $berita = berita::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $filename = time() . '-' . $request->judul . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('berita', $filename, 'public');
            $berita->foto = $filename;
        }

        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->kategori = $request->kategori;
        $berita->tanggal = now();
        $berita->author = Auth::user()->name;
        $berita->save();

        return back()->with('success', 'Postingan berhasil diperbarui');
    }

    public function deletepostingan($id)
    {
        berita::findOrFail($id)->delete();
        return back()->with('success', 'Postingan berhasil dihapus');
    }
}
