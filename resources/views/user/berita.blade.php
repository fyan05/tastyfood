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
    <div class="row align-items-center g-5 mb-5">

        {{-- IMAGE --}}
        <div class="col-lg-6">
            <img src="{{ asset('images/featured-food.jpg') }}"
                 class="img-fluid rounded-4 shadow-sm"
                 alt="Makanan Nusantara">
        </div>

        {{-- CONTENT --}}
        <div class="col-lg-6">
            <h2 class="fw-bold mb-3">
                APA SAJA MAKANAN KHAS<br>NUSANTARA?
            </h2>

            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare,
                augue ut rutrum commodo, dui diam convallis orci, eget consectetur sem
                eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet
                viverra ante.
            </p>

            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare,
                augue ut rutrum commodo, dui diam convallis orci, eget consectetur sem
                eget lacus.
            </p>

            <a href="#" class="btn btn-dark px-4 py-2 mt-2">
                BACA SELENGKAPNYA
            </a>
        </div>

    </div>

    {{-- ===== OTHER NEWS ===== --}}
    <h5 class="fw-bold mb-4">BERITA LAINNYA</h5>

    <div class="row g-4">

        @for ($i = 0; $i < 8; $i++)
        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm h-100 news-card">

                <img src="{{ asset('images/news-' . ($i % 4 + 1) . '.jpg') }}"
                     class="card-img-top rounded-top-4"
                     alt="Berita">

                <div class="card-body">
                    <h6 class="fw-bold">LOREM IPSUM</h6>

                    <p class="text-muted small mb-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus ornare, rutrum commodo.
                    </p>

                    <a href="#" class="text-warning text-decoration-none small fw-semibold">
                        Baca selengkapnya
                    </a>
                </div>

            </div>

        </div>
        @endfor

    </div>

</div>

@endsection
