@extends('admin.template')

@section('content')
<h3 class="mb-3">
    <i class="fa-solid fa-newspaper"></i> Data Berita
</h3>

<a href="#" class="btn btn-primary mb-3">
    <i class="fa-solid fa-plus"></i> Tambah Berita
</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($beritas as $b)
        <tr>
            <td>{{ $b->judul }}</td>
            <td>{{ $b->kategori }}</td>
            <td>{{ $b->nama_penulis }}</td>
            <td>
                <button class="btn btn-warning btn-sm">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button class="btn btn-danger btn-sm">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted">
                Data berita belum ada
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
