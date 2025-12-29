@extends('user.layout')
@section('content')
<style>
     /* heronavbar */
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
</style>
{{-- hero --}}
<div class="hero d-flex align-items-center">
    <div class="container hero-content">
        <h1 class="fw-bold">Tentang Kami</h1>
    </div>
</div>
<div class="container my-5">

    {{-- ================= TASTY FOOD ================= --}}
    <div class="row align-items-center mb-5">

        {{-- TEXT --}}
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h5 class="fw-bold mb-3">TASTY FOOD</h5>
            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare,
                augue ut rutrum commodo, dui diam convallis orci, eget consectetur sem
                eget lacus.
            </p>
            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare,
                augue ut rutrum commodo, dui diam convallis orci, eget consectetur sem
                eget lacus.
            </p>
        </div>

        {{-- IMAGES --}}
        <div class="col-lg-6">
            <div class="d-flex gap-3">
                <img src="{{ asset('images/about-1.jpg') }}"
                     class="img-fluid rounded-4 shadow-sm about-img">

                <img src="{{ asset('images/about-2.jpg') }}"
                     class="img-fluid rounded-4 shadow-sm about-img">
            </div>
        </div>

    </div>

    {{-- ================= VISI ================= --}}
    <div class="row align-items-center mb-5">

        {{-- IMAGE --}}
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="{{ asset('images/visi.jpg') }}"
                 class="img-fluid rounded-4 shadow-sm">
        </div>

        {{-- TEXT --}}
        <div class="col-lg-6">
            <h5 class="fw-bold mb-3">VISI</h5>
            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque
                magna aliquet cursus tempus. Duis viverra metus ut ipsum elementum
                vestibulum. Aliquam rutrum aliquet mauris et sapien.
            </p>
        </div>

    </div>

    {{-- ================= MISI ================= --}}
    <div class="row align-items-center">

        {{-- TEXT --}}
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h5 class="fw-bold mb-3">MISI</h5>
            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque
                magna aliquet cursus tempus. Duis viverra metus ut ipsum elementum
                vestibulum. Aliquam rutrum aliquet mauris et sapien.
            </p>
        </div>

        {{-- IMAGE --}}
        <div class="col-lg-6">
            <img src="{{ asset('images/misi.jpg') }}"
                 class="img-fluid rounded-4 shadow-sm">
        </div>

    </div>

</div>
@endsection
