@extends('user.layout')

@section('content')

<style>
/* ================= HERO ================= */
.hero-berita {
    background:
        linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
        url('{{ asset('storage/'.$berita->foto) }}') center/cover no-repeat;
    padding: 140px 0 90px;
    color: #fff;
}

.hero-berita h1 {
    font-size: 2.4rem;
    font-weight: 700;
}

.hero-meta {
    opacity: .85;
    font-size: 14px;
}

/* ================= CONTENT ================= */
.detail-wrapper {
    max-width: 900px;
    margin: -70px auto 0;
    background: #fff;
    border-radius: 18px;
    padding: 30px;
    box-shadow: 0 20px 50px rgba(0,0,0,.08);
}

.detail-image {
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 30px;
}

.detail-image img {
    width: 100%;
    max-height: 420px;
    object-fit: cover;
}

.isi {
    font-size: 16px;
    line-height: 1.9;
    color: #333;
}

/* ================= KOMENTAR ================= */
.comment-section {
    margin-top: 50px;
}

.comment-item {
    background: #f9fafb;
    padding: 16px 18px;
    border-radius: 14px;
    margin-bottom: 15px;
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.comment-name {
    font-weight: 600;
}

.rating {
    color: #f5a623;
    font-size: 14px;
}

.comment-item p {
    margin: 10px 0 5px;
    color: #555;
}

/* ================= FORM ================= */
.comment-form {
    margin-top: 30px;
    background: #fff;
    padding: 22px;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0,0,0,.06);
}

.comment-form h4 {
    margin-bottom: 15px;
}

.comment-form select,
.comment-form textarea {
    width: 100%;
    padding: 11px 14px;
    border-radius: 10px;
    border: 1px solid #ddd;
    margin-bottom: 14px;
    outline: none;
}

.comment-form select:focus,
.comment-form textarea:focus {
    border-color: #f5a623;
}

.comment-form button {
    background: #f5a623;
    color: #fff;
    border: none;
    padding: 12px;
    width: 100%;
    border-radius: 10px;
    font-weight: 600;
}
.login-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 22px;
    background: linear-gradient(135deg, #f5a623, #ffbe55);
    color: #fff;
    font-weight: 600;
    border-radius: 999px;
    text-decoration: none;
    box-shadow: 0 10px 25px rgba(245,166,35,.35);
    transition: all .3s ease;
}

.login-btn i {
    font-size: 15px;
}

.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 30px rgba(245,166,35,.45);
    color: #fff;
}

/* MOBILE */
@media (max-width: 576px) {
    .login-btn {
        width: 100%;
        justify-content: center;
        padding: 13px;
    }
}


/* LOGIN ALERT */
.login-alert {
    background: #fff3cd;
    border: 1px solid #ffeeba;
    padding: 18px;
    border-radius: 14px;
    text-align: center;
    margin-top: 30px;
}

.login-alert a {
    display: inline-block;
    margin-top: 10px;
    background: #f5a623;
    color: #fff;
    padding: 10px 18px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    .hero-berita h1 {
        font-size: 1.9rem;
    }

    .detail-wrapper {
        padding: 22px;
    }

    .detail-image img {
        max-height: 260px;
    }
}
</style>

{{-- ================= HERO ================= --}}
<section class="hero-berita">
    <div class="container">
        <h1>{{ $berita->judul }}</h1>
        <div class="hero-meta">
            👤 {{ $berita->nama_penulis }} ·
            📅 {{ $berita->created_at->format('d M Y') }}
        </div>
    </div>
</section>

{{-- ================= CONTENT ================= --}}
<div class="container">
    <div class="detail-wrapper">

        {{-- GAMBAR --}}
        <div class="detail-image">
            <img src="{{ asset('storage/'.$berita->foto) }}" alt="{{ $berita->judul }}">
        </div>

        {{-- ISI --}}
        <div class="isi">
            {!! nl2br(e($berita->isi)) !!}
        </div>

        <hr>

        {{-- ================= KOMENTAR ================= --}}
        <div class="comment-section">

            <h4 class="fw-bold mb-4">
                💬 Komentar ({{ $komentar->count() }})
            </h4>

            {{-- LIST KOMENTAR --}}
            @forelse ($komentar as $item)
                <div class="comment-item">
                    <div class="comment-header">
                        <span class="comment-name">{{ $item->nama }}</span>
                        <span class="rating">
                            @for($i=1;$i<=5;$i++)
                                <i class="fa-star {{ $i <= $item->rating ? 'fa-solid' : 'fa-regular' }}"></i>
                            @endfor
                        </span>
                    </div>
                    <p>{{ $item->komentar }}</p>
                    <small class="text-muted">
                        {{ $item->created_at->diffForHumans() }}
                    </small>
                </div>
            @empty
                <p class="text-muted fst-italic">Belum ada komentar</p>
            @endforelse
            @if (!Auth::check())
            <div class="login-alert">
                <strong>Ingin ikut berdiskusi?</strong>
                <p class="mb-3">Silakan login terlebih dahulu untuk menulis komentar.</p>

                <a href="{{ route('login') }}" class="login-btn">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Login untuk Komentar
                </a>
            </div>
            @else
            {{-- ================= FORM / LOGIN ================= --}}
            @auth
                <div class="comment-form">
                    <h4>Tulis Komentar</h4>

                    <form action="{{ route('berita.komentar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="berita_id" value="{{ $berita->id }}">
                        <input type="hidden" name="nama" value="{{ auth()->user()->name }}">

                        <select name="rating" required>
                            <option value="">Pilih Rating</option>
                            <option value="5">★★★★★</option>
                            <option value="4">★★★★</option>
                            <option value="3">★★★</option>
                            <option value="2">★★</option>
                            <option value="1">★</option>
                        </select>

                        <textarea name="komentar" rows="4" placeholder="Tulis komentar..." required></textarea>

                        <button type="submit">Kirim Komentar</button>
                    </form>
                </div>
            @else
                <div class="login-alert">
                    <strong>Ingin ikut berdiskusi?</strong>
                    <p class="mb-2">Silakan login terlebih dahulu untuk menulis komentar.</p>
                    <a href="{{ route('login') }}">Login Sekarang</a>
                </div>
            @endauth
            @endif

        </div>

    </div>
</div>

@endsection
