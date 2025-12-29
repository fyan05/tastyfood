@extends('admin.template')

@section('content')
<h3 class="mb-3">
    <i class="fa-solid fa-newspaper"></i> Data Berita
</h3>

{{-- BUTTON TAMBAH --}}
<button type="button"
        class="btn btn-primary mb-3"
        data-bs-toggle="modal"
        data-bs-target="#modalTambahBerita">
    <i class="fa-solid fa-plus"></i> Tambah Berita
</button>

{{-- TABLE --}}
<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Tanggal</th>
            <th>Foto</th>
            <th width="140">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($beritas as $b)
        <tr>
            <td>{{ $b->judul }}</td>

            <td>
                <span class="badge bg-success">{{ $b->kategori }}</span>
            </td>

            <td>{{ $b->nama_penulis }}</td>

            <td>{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</td>

            <td class="text-center">
                @if ($b->foto)
                    <img src="{{ asset('storage/'.$b->foto) }}"
                         width="60"
                         class="rounded shadow-sm">
                @else
                    <span class="text-muted fst-italic">Tidak ada</span>
                @endif
            </td>

            <td class="text-center">
                {{-- EDIT --}}
                <button class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#modalEdit{{ $b->id }}">
                    <i class="fa-solid fa-pen"></i>
                </button>

                {{-- DELETE --}}
                <form action="{{ route('berita.destroy', encrypt($b->id)) }}"
                      method="POST"
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus berita ini?')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-muted">
                <i class="fa-solid fa-circle-info me-1"></i>
                Data berita belum ada
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

{{-- ================= MODAL EDIT (DI LUAR TABLE) ================= --}}
@foreach ($beritas as $b)
<div class="modal fade" id="modalEdit{{ $b->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <form action="{{ route('berita.update', $b->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header bg-warning">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Berita
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul"
                               class="form-control"
                               value="{{ $b->judul }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi</label>
                        <textarea name="isi"
                                  class="form-control"
                                  rows="4" required>{{ $b->isi }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="nama_penulis"
                               class="form-control"
                               value="{{ $b->nama_penulis }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal"
                               class="form-control"
                               value="{{ $b->tanggal }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select" required>
                            <option value="Makanan" {{ $b->kategori=='Makanan'?'selected':'' }}>
                                Makanan
                            </option>
                            <option value="Minuman" {{ $b->kategori=='Minuman'?'selected':'' }}>
                                Minuman
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control">
                        @if($b->foto)
                            <img src="{{ asset('storage/'.$b->foto) }}"
                                 class="mt-2 rounded"
                                 width="100">
                        @endif
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fa-solid fa-save"></i> Update
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endforeach

{{-- ================= MODAL TAMBAH ================= --}}
<div class="modal fade" id="modalTambahBerita" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <form action="{{ route('berita.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-newspaper"></i> Tambah Berita
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi</label>
                        <textarea name="isi" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="nama_penulis" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save"></i> Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
