@extends('user.layout')

@section('content')
<style>
    /* herobanner */
    .hero {
        background: url('{{ asset("asset/gambar/Group 70.png") }}') center/cover no-repeat;
        height: 500px;
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

    /* news */
    body {
        background: #fafafa;
    }

    /* NEWS CARD */
    .news-card img {
        height: 180px;
        object-fit: cover;
    }

    .news-card {
        border-radius: 16px;
    }

    .news-card .card-body {
        padding: 16px;
    }

    .news-card a:hover {
        text-decoration: underline;
    }
</style>

{{-- hero --}}
<div class="hero d-flex align-items-center">
    <div class="container hero-content">
        <h1 class="fw-bold">Berita Kami</h1>
    </div>
</div>

<div class="container my-5">

    {{-- ===== FEATURED ARTICLE ===== --}}
    @if($berita)
    <div class="row align-items-center g-5 mb-5">

        {{-- IMAGE --}}
        <div class="col-lg-6">
            <img src="{{ asset('storage/berita/'. $berita->foto) }}"
                 class="img-fluid rounded-4 shadow-sm"
                 alt="{{ $berita->judul }}">
        </div>

        {{-- CONTENT --}}
        <div class="col-lg-6">
            <h2 class="fw-bold mb-3 text-uppercase">
                {{ $berita->judul }}
            </h2>

            <p class="text-muted">
                {{ Str::limit(strip_tags($berita->isi), 200) }}
            </p>

            <p class="text-muted">
                {{ Str::limit(strip_tags($berita->isi), 120) }}
            </p>

            <a href="{{ route('berita.detail', $berita->id) }}"
               class="btn btn-dark px-4 py-2 mt-2">
                BACA SELENGKAPNYA
            </a>
        </div>

    </div>
    @endif

    {{-- ===== OTHER NEWS ===== --}}
    <h5 class="fw-bold mb-4">BERITA LAINNYA</h5>

    <div class="row g-4">

        @foreach ($lainnya as $item)
        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm h-100 news-card">

                <img src="{{ asset('storage/berita/'. $item->foto) }}"
                     class="card-img-top rounded-top-4"
                     alt="{{ $item->judul }}">

                <div class="card-body">
                    <h6 class="fw-bold text-uppercase">
                        {{ Str::limit($item->judul, 40) }}
                    </h6>

                    <p class="text-muted small mb-3">
                        {{ Str::limit(strip_tags($item->isi), 80) }}
                    </p>

                    <a href="{{ route('berita.detail', $item->id) }}"
                       class="text-warning text-decoration-none small fw-semibold">
                        Baca selengkapnya
                    </a>
                </div>

            </div>

        </div>
        @endforeach

    </div>

</div>
@endsection
