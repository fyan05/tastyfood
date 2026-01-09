@extends('admin.template')

@section('content')
<h4 class="mb-4 fw-bold">
    <i class="fa-solid fa-images text-primary"></i> Galeri Website
</h4>

<button class="btn btn-primary mb-4"
        data-bs-toggle="modal"
        data-bs-target="#modalTambah">
    <i class="fa fa-plus"></i> Tambah Galeri
</button>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- ================= STYLE ================= --}}
<style>
.galeri-card {
    transition: .3s;
    border-radius: 14px;
    overflow: hidden;
    position: relative;
}
.galeri-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 30px rgba(0,0,0,.15);
}
.galeri-action {
    position: absolute;
    top: 10px;
    right: 10px;
    display: flex;
    gap: 6px;
    z-index: 2;
}
.galeri-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 2;
}
.galeri-img {
    height: 200px;
    object-fit: cover;
}
</style>

{{-- ================= LIST GALERI ================= --}}
<div class="row g-4">
@foreach($galeries as $item)
<div class="col-md-4">
    <div class="card galeri-card border-0 shadow-sm h-100">

        {{-- BADGE --}}
        <div class="galeri-badge">
            @if($item->gambar)
                <span class="badge bg-primary">
                    <i class="fa fa-image"></i> Foto
                </span>
            @else
                <span class="badge bg-danger">
                    <i class="fa fa-video"></i> Video
                </span>
            @endif
        </div>

        {{-- ACTION --}}
        <div class="galeri-action">
            <button class="btn btn-warning btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#modalEdit{{ $item->id }}">
                <i class="fa fa-edit"></i>
            </button>

            <form action="{{ route('gallery-delete',$item->id) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus data?')">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </div>

        {{-- MEDIA --}}
        @if($item->gambar)
            <img src="{{ asset('storage/'.$item->gambar) }}"
                 class="w-100 galeri-img">
        @else
            <video controls class="w-100 galeri-img">
                <source src="{{ asset('storage/'.$item->video) }}">
            </video>
        @endif

        {{-- BODY --}}
        <div class="card-body">
            <h6 class="fw-semibold mb-0 text-truncate">
                {{ $item->judul }}
            </h6>
            <small class="text-muted">
                {{ $item->created_at->diffForHumans() }}
            </small>
        </div>
    </div>
</div>

{{-- ================= MODAL EDIT ================= --}}
<div class="modal fade" id="modalEdit{{ $item->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('gallery-update',$item->id) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="fw-bold">
                        <i class="fa fa-edit"></i> Edit Galeri
                    </h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="fw-semibold">Judul</label>
                        <input type="text" name="judul"
                               class="form-control"
                               value="{{ $item->judul }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">Foto</label>
                        <input type="file" name="gambar"
                               class="form-control">
                        @if($item->gambar)
                            <img src="{{ asset('storage/'.$item->gambar) }}"
                                 class="rounded mt-2" width="120">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">Video</label>
                        <input type="file" name="video"
                               class="form-control">
                        @if($item->video)
                            <video width="150" controls class="mt-2 rounded">
                                <source src="{{ asset('storage/'.$item->video) }}">
                            </video>
                        @endif
                    </div>

                    <small class="text-muted fst-italic">
                        * Upload salah satu (foto atau video)
                    </small>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
</div>

{{-- ================= MODAL TAMBAH ================= --}}
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('gallery-store') }}"
                  method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="fw-bold">
                        <i class="fa fa-plus"></i> Tambah Galeri
                    </h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="fw-semibold">Judul</label>
                        <input type="text" name="judul"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">Foto</label>
                        <input type="file" name="gambar"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">Video</label>
                        <input type="file" name="video"
                               class="form-control">
                    </div>

                    <small class="text-muted fst-italic">
                        * Upload salah satu (foto atau video)
                    </small>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
