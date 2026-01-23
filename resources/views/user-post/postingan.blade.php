@extends('user-post.template')
@section('title','Kelola Postingan')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Kelola Postingan</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fa-solid fa-plus me-1"></i> Tambah Postingan
        </button>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>deskripsi</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Foto</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ Str::limit($item->isi, 50) }}</td>
                        <td>
                            <span class="badge badge-kategori
                                {{ $item->kategori == 'Makanan' ? 'bg-success' : 'bg-info' }}">
                                {{ $item->kategori }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                         <td>
                        @if ($item->foto)
                            <img src="{{ asset('storage/berita/'.$item->foto) }}"
                                 class="rounded shadow-sm"
                                 width="55" height="55"
                                 style="object-fit:cover">
                        @else
                            <span class="text-muted fst-italic">–</span>
                        @endif
                    </td>
                        <td>
                            <button class="btn btn-sm btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEdit{{ $item->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>

                            <button class="btn btn-sm btn-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#modalHapus{{ $item->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    {{-- ================= MODAL EDIT ================= --}}
                    <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ route('user.postingan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Postingan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Judul</label>
                                            <input type="text" name="judul" class="form-control" value="{{ $item->judul }}">
                                        </div>

                                        <div class="mb-3">
                                            <label>Isi</label>
                                            <textarea name="isi" rows="5" class="form-control">{{ $item->isi }}</textarea>
                                        </div>

                                       <select name="kategori" class="form-control mb-2" required>
                                            <option value="Makanan" {{ $item->kategori=='Makanan'?'selected':'' }}>Makanan</option>
                                            <option value="Minuman" {{ $item->kategori=='Minuman'?'selected':'' }}>Minuman</option>
                                        </select>
                                        <div class="mb-3">
                                            <label>Gambar</label>
                                            <input type="file" name="gambar" class="form-control">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button class="btn btn-warning">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- ================= MODAL HAPUS ================= --}}
                    <div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ route('user.postingan.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger">Hapus Postingan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        Yakin mau hapus postingan:
                                        <strong>{{ $item->judul }}</strong> ?
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

{{-- ================= MODAL TAMBAH ================= --}}
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('user.postingan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Postingan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Isi</label>
                        <textarea name="isi" rows="5" class="form-control"></textarea>
                    </div>

                <select name="kategori" class="form-control mb-2" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                </select>

                    <div class="mb-3">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
