@extends('user.template')

@section('title','Home - Tasty Food','body-class')

@section('content')

{{-- ================= HERO ================= --}}
<section class="home-hero">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6 hero-text">
                <h1>HEALTHY</h1>
                <h1 class="hero-title">TASTY FOOD</h1>

                <p class="mt-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Phasellus ornare augue eu rutrum commodo.
                </p>

                <a href="/tentang" class="btn btn-dark px-4 py-2 mt-3">
                    TENTANG KAMI
                </a>
            </div>

            <img src="{{ asset('asset/gambar/img-4-2000x2000.png') }}"
                 class="img-fluid hero-img">
        </div>
    </div>
</section>

{{-- ================= TENTANG KAMI ================= --}}
<section class="about-home">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">

                <h2 class="section-title">TENTANG KAMI</h2>

                <p class="section-text mt-4">
                    Tasty Food adalah restoran yang menyajikan makanan sehat
                    dengan cita rasa terbaik.
                </p>

                <div class="divider-line"></div>
            </div>
        </div>
    </div>
</section>

{{-- ================= MENU ================= --}}
<section class="food-section">
    <div class="container">
        <div class="row g-4 justify-content-center">

            @for ($i = 1; $i <= 4; $i++)
            <div class="col-lg-3 col-md-6">
                <div class="food-card">
                    <img src="{{ asset('asset/gambar/img-'.$i.'.png') }}" alt="">
                    <h5>LOREM IPSUM</h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            @endfor

        </div>
    </div>
</section>

{{-- ================= BERITA ================= --}}
<div class="container my-5">

    <h3 class="text-center fw-bold mb-4">BERITA KAMI</h3>

    <div class="row g-4">

        {{-- BERITA UTAMA --}}
        @if($beritaUtama)
        <div class="col-lg-6">
            <div class="card shadow-sm rounded-4 card-utama">
                     <img src="{{ asset('storage/'. $beritaUtama->foto) }}"
                     class="card-img-top rounded-top-4">

                <div class="card-body">
                    <h5 class="fw-bold">{{ $beritaUtama['judul'] }}</h5>
                    <p class="text-muted">{{ $beritaUtama['deskripsi'] }}</p>
                    <a href="{{ route('berita.detail',$beritaUtama->id) }}" class="read-more">Baca selengkapnya</a>
                </div>
            </div>
        </div>
        @endif

        {{-- BERITA KECIL --}}
        <div class="col-lg-6">
            <div class="row g-4">

                @forelse ($berita as $item)
                <div class="col-md-6">
                    <div class="card shadow-sm rounded-4 h-100">
                        <img src="{{ asset('storage/'. $item->foto) }}"
                             class="card-img-top rounded-top-4">

                        <div class="card-body d-flex flex-column">
                            <h6 class="fw-bold">{{ $item['judul'] }}</h6>
                            <p class="text-muted small flex-grow-1">
                                {{ $item['deskripsi'] }}
                            </p>
                            <a href="{{ route('berita.detail', $item->id) }}" class="read-more small">
                                Baca selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-muted">Belum ada berita.</p>
                @endforelse

            </div>
        </div>

    </div>
</div>

{{-- ================= GALERI ================= --}}
<div class="container my-5">

    <h3 class="text-center fw-bold mb-5">GALERI KAMI</h3>

    <div class="row g-4">

        @forelse ($galeri as $img)
        <div class="col-lg-4 col-md-6">
            <img src="{{ asset('storage/' . $img->gambar) }}" class="galeri-img">
        </div>
        @empty
        <p class="text-center text-muted">Galeri belum tersedia.</p>
        @endforelse

    </div>

    <div class="text-center mt-5">
        <a href="/galeri" class="btn btn-galeri">LIHAT LEBIH BANYAK</a>
    </div>

</div>

@endsection
