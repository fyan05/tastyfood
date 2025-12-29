@extends('user.layout')
@section('content')

<style>
    /* hero */
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

    /* carousel */
    .gallery-carousel img {
        height: 360px;
        object-fit: cover;
        border-radius: 20px;
    }
    /* panah */
    .carousel-control-prev,
    .carousel-control-next {
        width: 48px;
        height: 48px;
        background: rgba(255, 255, 255, 0.85);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 1;
    }

    .carousel-control-prev {
        left: 20px;
    }

    .carousel-control-next {
        right: 20px;
    }

    /* icon arrow */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-size: 60%;
        filter: invert(1) grayscale(1);
    }

    /* hover effect */
    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background: #fff;
        box-shadow: 0 6px 20px rgba(0,0,0,0.2);
    }

    /* gallery grid */
    .gallery-grid img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 16px;
        transition: .3s;
    }

    .gallery-grid img:hover {
        transform: scale(1.03);
    }
</style>

{{-- HERO --}}
<div class="hero d-flex align-items-center">
    <div class="container hero-content">
        <h1 class="fw-bold">Galeri Kami</h1>
    </div>
</div>

<div class="container my-5">

    {{-- ================= CAROUSEL ================= --}}
    <div id="galleryCarousel" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-ride="2000" data-bs-pause="false">

        <div class="carousel-inner gallery-carousel">

            <div class="carousel-item active">
                <img src="{{ asset('asset/gambar/brooke-lark-oaz0raysASk-unsplash.jpg') }}" class="d-block w-100" style="object-fit: cover;">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('asset/gambar/Group 70.png') }}" class="d-block w-100">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('asset/gambar/Group 70.png') }}" class="d-block w-100">
            </div>

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

    {{-- ================= GRID GALLERY ================= --}}
    <div class="row g-4 gallery-grid">

        @for ($i = 1; $i <= 12; $i++)
        <div class="col-lg-3 col-md-4 col-6">
            <img src="{{ asset('asset/gambar/img-1.png'.$i.'.jpg') }}" alt="Gallery">
        </div>
        @endfor

    </div>

</div>

@endsection
