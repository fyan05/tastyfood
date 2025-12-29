@extends('admin.template')

@section('content')
<h3 class="mb-4">
    <i class="fa-solid fa-gauge-high"></i> Dashboard
</h3>

{{-- INFO CARD --}}
<div class="row g-4 mb-4">

    {{-- BERITA --}}
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 text-white bg-primary rounded-circle p-3">
                    <i class="fa-solid fa-newspaper fa-lg"></i>
                </div>
                <div>
                    <h6 class="mb-0 text-muted">Total Berita</h6>
                    <h4 class="fw-bold mb-0">{{ $totalBerita ?? 0 }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- GALERI --}}
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 text-white bg-success rounded-circle p-3">
                    <i class="fa-solid fa-image fa-lg"></i>
                </div>
                <div>
                    <h6 class="mb-0 text-muted">Total Galeri</h6>
                    <h4 class="fw-bold mb-0">{{ $totalGaleri ?? 0 }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- KONTAK --}}
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 text-white bg-warning rounded-circle p-3">
                    <i class="fa-solid fa-envelope fa-lg"></i>
                </div>
                <div>
                    <h6 class="mb-0 text-muted">Pesan Masuk</h6>
                    <h4 class="fw-bold mb-0">{{ $totalKontak ?? 0 }}</h4>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- SECTION BAWAH --}}
<div class="row g-4">

    {{-- SELAMAT DATANG --}}
    <div class="col-lg-7">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="fw-semibold mb-3">
                    <i class="fa-solid fa-hand-wave me-1"></i> Selamat Datang
                </h5>
                <p class="text-muted mb-2">
                    Selamat datang di <strong>Dashboard Admin Tasty Food</strong>.
                    Dari halaman ini kamu bisa mengelola:
                </p>

                <ul class="text-muted mb-0">
                    <li>Data Berita</li>
                    <li>Galeri Website</li>
                    <li>Konten Tentang Kami</li>
                    <li>Pesan Kontak</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- AKTIVITAS TERBARU --}}
    <div class="col-lg-5">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="fw-semibold mb-3">
                    <i class="fa-solid fa-clock me-1"></i> Aktivitas Terbaru
                </h5>

                <ul class="list-group list-group-flush">
                    @forelse($beritaTerbaru ?? [] as $b)
                    <li class="list-group-item px-0">
                        <div class="fw-semibold">{{ $b->judul }}</div>
                        <small class="text-muted">
                            {{ \Carbon\Carbon::parse($b->created_at)->diffForHumans() }}
                        </small>
                    </li>
                    @empty
                    <li class="list-group-item px-0 text-muted fst-italic">
                        Belum ada aktivitas
                    </li>
                    @endforelse
                </ul>

            </div>
        </div>
    </div>

</div>
@endsection
