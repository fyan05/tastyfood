@extends('user.layout')

@section('content')

<style>
    /* HERO */
    .hero {
        background: url('{{ asset("asset/gambar/Group 70.png") }}') center/cover no-repeat;
        height: 400px;
        position: relative;
        color: #fff;
    }
    .hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,.55);
    }
    .hero-content {
        position: relative;
        z-index: 1;
    }

    /* CAROUSEL */
    .gallery-carousel img {
        height: 360px;
        object-fit: cover;
        border-radius: 20px;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 48px;
        height: 48px;
        background: rgba(255,255,255,.85);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 1;
    }

    .carousel-control-prev { left: 20px; }
    .carousel-control-next { right: 20px; }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(1);
        background-size: 60%;
    }

    /* GRID */
    .gallery-grid img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 16px;
        transition: .3s;
    }

    .gallery-grid img:hover {
        transform: scale(1.05);
    }
</style>

{{-- ================= HERO ================= --}}
<div class="hero d-flex align-items-center">
    <div class="container hero-content">
        <h1 class="fw-bold">Galeri Kami</h1>
    </div>
</div>

<div class="container my-5">

    {{-- ================= CAROUSEL ================= --}}
    @if($caraousel->count())
    <div id="galleryCarousel" class="carousel slide mb-5"
        data-bs-ride="carousel" data-bs-interval="3000">

        <div class="carousel-inner gallery-carousel">
            @foreach ($caraousel as $key => $item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                         class="d-block w-100"
                         alt="{{ $item->judul }}">
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button"
            data-bs-target="#galleryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button"
            data-bs-target="#galleryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    @endif

    {{-- ================= GRID GALLERY ================= --}}
    <div class="row g-4 gallery-grid">
        @forelse ($lainnya as $item)
            <div class="col-lg-3 col-md-4 col-6">
                <img src="{{ asset('storage/' . $item->gambar) }}"
                     alt="{{ $item->judul }}"
                     title="{{ $item->judul }}">
            </div>
        @empty
            <div class="col-12 text-center text-muted">
                <p>Belum ada foto di galeri</p>
            </div>
        @endforelse
    </div>

</div>

@endsection
