@extends('admin.template')

@section('content')

{{-- ================= HEADER ================= --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">
        <i class="fa-solid fa-newspaper text-primary me-2"></i> Data Berita
    </h4>

    <button class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalTambahBerita">
        <i class="fa-solid fa-plus"></i> Tambah Berita
    </button>
</div>

@if(session('success'))
<div class="alert alert-success shadow-sm">
    <i class="fa fa-check-circle"></i> {{ session('success') }}
</div>
@endif

{{-- ================= STYLE ================= --}}
<style>
.table-berita tbody tr {
    transition: .2s;
}
.table-berita tbody tr:hover {
    background-color: #f8f9fa;
}
.badge-kategori {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 13px;
}
.btn-icon {
    width: 34px;
    height: 34px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.deskripsi-truncate {
    max-width: 280px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>

{{-- ================= TABLE CARD ================= --}}
<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span>
            <i class="fa-solid fa-list me-2"></i> Daftar Berita
        </span>
        <span class="badge bg-light text-dark">
            Total: {{ $beritas->count() }}
        </span>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover align-middle text-center table-berita mb-0">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                    <th width="90">Foto</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($beritas as $b)
                <tr>
                    <td class="fw-semibold text-start ps-3">
                        {{ $b->judul }}
                    </td>

                    <td class="text-start">
                        <span class="deskripsi-truncate"
                              data-bs-toggle="tooltip"
                              title="{{ $b->isi }}">
                            {{ Str::limit($b->isi, 50) }}
                        </span>
                    </td>

                    <td>
                        <span class="badge badge-kategori
                            {{ $b->kategori == 'Makanan' ? 'bg-success' : 'bg-info' }}">
                            {{ $b->kategori }}
                        </span>
                    </td>

                    <td>{{ $b->nama_penulis }}</td>

                    <td>
                        <div class="d-flex flex-column align-items-center">
                            <span>{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</span>
                        </div>
                    </td>

                    <td>
                        @if ($b->foto)
                            <img src="{{ asset('storage/'.$b->foto) }}"
                                 class="rounded shadow-sm"
                                 width="55" height="55"
                                 style="object-fit:cover">
                        @else
                            <span class="text-muted fst-italic">–</span>
                        @endif
                    </td>

                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-warning btn-sm btn-icon"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEdit{{ $b->id }}"
                                    data-bs-toggle="tooltip"
                                    title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </button>

                            <form action="{{ route('berita.destroy', encrypt($b->id)) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btn-icon"
                                        data-bs-toggle="tooltip"
                                        title="Hapus"
                                        onclick="return confirm('Yakin hapus berita ini?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                        <i class="fa-solid fa-circle-info me-1"></i>
                        Data berita belum tersedia
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{-- ================= MODAL TAMBAH ================= --}}
<div class="modal fade" id="modalTambahBerita" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST"
              action="{{ route('berita.store') }}"
              enctype="multipart/form-data"
              class="modal-content">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Tambah Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="text" name="judul" class="form-control mb-2" placeholder="Judul" required>

                <textarea name="isi" class="form-control mb-2" placeholder="Isi Berita" required></textarea>

                <input type="text" name="nama_penulis" class="form-control mb-2" placeholder="Nama Penulis" required>

                <input type="date" name="tanggal" class="form-control mb-2" required>

                <select name="kategori" class="form-control mb-2" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                </select>

                <input type="file" name="foto" class="form-control">
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary">Simpan</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach ($beritas as $b)
<div class="modal fade" id="modalEdit{{ $b->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST"
              action="{{ route('berita.update',$b->id) }}"
              enctype="multipart/form-data"
              class="modal-content">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title">Edit Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="text" name="judul" class="form-control mb-2" value="{{ $b->judul }}" required>

                <textarea name="isi" class="form-control mb-2" required>{{ $b->isi }}</textarea>

                <input type="text" name="nama_penulis" class="form-control mb-2" value="{{ $b->nama_penulis }}" required>

                <input type="date" name="tanggal" class="form-control mb-2" value="{{ $b->tanggal }}" required>

                <select name="kategori" class="form-control mb-2" required>
                    <option value="Makanan" {{ $b->kategori=='Makanan'?'selected':'' }}>Makanan</option>
                    <option value="Minuman" {{ $b->kategori=='Minuman'?'selected':'' }}>Minuman</option>
                </select>

                <input type="file" name="foto" class="form-control">
            </div>

            <div class="modal-footer">
                <button class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
</div>
@endforeach

@foreach ($beritas as $b)
<div class="modal fade" id="modalHapus{{ $b->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST"
              action="{{ route('berita.destroy', encrypt($b->id)) }}"
              class="modal-content">
            @csrf
            @method('DELETE')

            <div class="modal-body text-center">
                <p>Yakin hapus <b>{{ $b->judul }}</b>?</p>
                <button class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</div>
@endforeach


{{-- ================= TOOLTIP ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    )
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
})
</script>


@endsection
