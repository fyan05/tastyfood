@extends('user.layout')

@section('content')

<style>
    .hero {
        background: url('{{ asset("asset/gambar/Group 70.png") }}') center/cover no-repeat;
        height: 420px;
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

    .section {
        padding: 80px 0;
    }

    .section-title {
        font-weight: 700;
        margin-bottom: 20px;
    }

    .img-rounded {
        border-radius: 18px;
        object-fit: cover;
    }
</style>

{{-- HERO --}}
<div class="hero d-flex align-items-center">
    <div class="container hero-content">
        <h1 class="fw-bold text-uppercase">Tentang Kami</h1>
    </div>
</div>

@php
    $gambarPerusahaan = $gambartentang?->where('tipe','perushaan')->take(2) ?? collect();
    $gambarVisi       = $gambartentang?->where('tipe','visi')->take(2) ?? collect();
    $gambarMisi       = $gambartentang?->where('tipe','misi')->first();
@endphp

@if($tentang)

{{-- ================= TENTANG PERUSAHAAN ================= --}}
<section class="section bg-light">
    <div class="container">
        <div class="row align-items-center">

            {{-- TEXT --}}
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h4 class="section-title text-uppercase">
                    {{ $tentang->nama }}
                </h4>
                <p class="text-muted">
                    {{ $tentang->deskripsi }}
                </p>
            </div>

            {{-- IMAGE (2) --}}
            <div class="col-lg-6">
                <div class="d-flex gap-3">
                    @forelse ($gambarPerusahaan as $img)
                        <img src="{{ asset('storage/tentang/'.$img->nama_file) }}"
                             class="img-fluid img-rounded shadow-sm"
                             style="width:48%; height:280px;">
                    @empty
                        <span class="text-muted">Gambar belum tersedia</span>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= VISI (2 GAMBAR) ================= --}}
<section class="section">
    <div class="container">
        <div class="row align-items-center">

            {{-- IMAGE --}}
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="d-flex gap-3">
                    @forelse ($gambarVisi as $img)
                        <img src="{{ asset('storage/tentang/'.$img->nama_file) }}"
                             class="img-fluid img-rounded shadow-sm"
                             style="width:48%; height:300px;">
                    @empty
                        <span class="text-muted">Gambar visi belum tersedia</span>
                    @endforelse
                </div>
            </div>

            {{-- TEXT --}}
            <div class="col-lg-6">
                <h4 class="section-title">VISI</h4>
                <p class="text-muted">
                    {{ $tentang->visi }}
                </p>
            </div>

        </div>
    </div>
</section>

{{-- ================= MISI ================= --}}
<section class="section bg-light">
    <div class="container">
        <div class="row align-items-center">

            {{-- TEXT --}}
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h4 class="section-title">MISI</h4>
                <p class="text-muted">
                    {{ $tentang->misi }}
                </p>
            </div>

            {{-- IMAGE (1) --}}
            <div class="col-lg-6">
                @if($gambarMisi)
                    <img src="{{ asset('storage/tentang/'.$gambarMisi->nama_file) }}"
                         class="img-fluid img-rounded shadow-sm w-100"
                         style="height:320px;">
                @else
                    <span class="text-muted">Gambar misi belum tersedia</span>
                @endif
            </div>

        </div>
    </div>
</section>

@else
<div class="container py-5 text-center text-muted">
    <h5>Data Tentang Kami belum tersedia</h5>
</div>
@endif

@endsection
