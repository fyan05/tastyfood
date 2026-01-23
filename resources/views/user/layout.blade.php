<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Tasty Food')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">

    <style>
        /* ===============================
           GLOBAL
        =============================== */
        body{
            font-family:'Poppins', sans-serif;
            background:#F2F2F2;
            color:#333;
            margin:0;
            padding:0;
        }

        /* ===============================
           NAVBAR
        =============================== */
        .navbar{
            background: transparent;
            padding: 24px 0;
            position: fixed;
            width: 100%;
            z-index: 100;
            transition: background-color .3s ease, box-shadow .3s ease;
        }

        /* BRAND & MENU (DEFAULT / HERO) */
        .navbar-brand,
        .nav-link{
            color: #fff !important;
            font-size: 13px;
            letter-spacing: 1.2px;
            font-weight: 600;
        }

        /* JARAK MENU */
        .navbar-nav{
            gap: 28px;
        }

        /* NAVBAR SAAT SCROLL */
        .navbar.scrolled{
            background: #ffffff !important;
            box-shadow: 0 4px 14px rgba(0,0,0,.08);
        }

        .navbar.scrolled .navbar-brand,
        .navbar.scrolled .nav-link{
            color: #111 !important;
        }

        /* ===============================
           HERO BACKGROUND (PAGE)
        =============================== */
        .hero-bg{
            height: 70vh;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
        }

        .hero-bg::after{
            content:'';
            position:absolute;
            inset:0;
            background: rgba(0,0,0,.55);
        }

        .hero-bg h1{
            position: relative;
            z-index:2;
            font-size: 48px;
            font-weight: 700;
            color:#fff;
        }

                /* footer */
        .footer-dark {
            background: radial-gradient(circle at top, #1b1b1b, #000);
            color: #fff;
        }

        .footer-dark p {
            color: #F2F2F2;
            line-height: 1.8;
        }

        .footer-link li {
            margin-bottom: 8px;
        }

        .footer-link a {
            color: #bdbdbd;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-link a:hover {
            color: #fff;
        }

        .footer-contact li {
            color: #bdbdbd;
            font-size: 14px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .social-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
        }

        .social-icon.facebook {
            background: #3b5998;
        }

        .social-icon.twitter {
            background: #1da1f2;
        }

        .social-icon:hover {
            opacity: 0.85;
        }
  /* ===============================
           RESPONSIVE
        =============================== */
       /* Toggler icon putih (hero) */
        .navbar-toggler {
            outline: none;
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }

        /* Navbar saat scroll */
        .navbar.scrolled .navbar-toggler-icon {
            filter: invert(0);
        }

        /* MOBILE MENU STYLE */
        @media (max-width: 991px) {
        .navbar {
            background: #fff !important;
            padding: 12px 0;
        }

        .navbar-brand,
        .nav-link {
            color: #111 !important;
        }

        .navbar-collapse {
            background: #fff;
            padding-bottom: 12px;
        }
            }

    </style>
</head>

<body>

{{-- ===============================
    NAVBAR
=============================== --}}
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <!-- BRAND -->
        <a class="navbar-brand fw-bold" href="/">TASTY FOOD</a>

        <!-- HAMBURGER (TANPA BORDER) -->
        <button class="navbar-toggler shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto mt-3 mt-lg-0">
                <li class="nav-item"><a class="nav-link" href="/">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="/tentang">TENTANG</a></li>
                <li class="nav-item"><a class="nav-link" href="/berita">BERITA</a></li>
                <li class="nav-item"><a class="nav-link" href="/galeri">GALERI</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">KONTAK</a></li>
                @if (!Auth::check())
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">LOGIN</a></li>
                @else
                 <li class="nav-item">
                    <a class="nav-link btn btn-warning text-dark fw-600 px-3 py-2 rounded-pill ms-2"
                    href="{{ route('user.dashboard') }}">
                        <i class="fa-solid fa-plus me-2"></i>TAMBAH POSTINGAN
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">LOGOUT</a></li>
                @endif
            </ul>

        </div>
    </div>
</nav>



{{-- ===============================
    HERO BACKGROUND (OPTIONAL)
=============================== --}}
@if (View::hasSection('hero-bg'))
<section class="hero-bg" style="background-image: url('@yield('hero-bg')');">
    <div class="container">
        <h1>@yield('hero-title')</h1>
    </div>
</section>
@endif

{{-- ===============================
    CONTENT
=============================== --}}
@yield('content')

{{-- footer --}}
<footer class="footer-dark pt-5">
    <div class="container">
        <div class="row gy-4">

            {{-- BRAND --}}
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-bold text-white mb-3">
                    {{ App\Models\tentang::getname() }}
                </h5>
                <p class="text-white small">
                    {{ App\Models\tentang::getdeskripsi() }}
                </p>

                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="social-icon facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="social-icon twitter">
                        <i class="bi bi-twitter"></i>
                    </a>
                </div>
            </div>

            {{-- USEFUL LINKS --}}
            <div class="col-lg-2 col-md-6">
                <h6 class="text-white fw-semibold mb-3">Useful links</h6>
                <ul class="list-unstyled footer-link">
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Hewan</a></li>
                    <li><a href="#">Galeri</a></li>
                    <li><a href="#">Testimonial</a></li>
                </ul>
            </div>

            {{-- PRIVACY --}}
            <div class="col-lg-2 col-md-6">
                <h6 class="text-white fw-semibold mb-3">Privacy</h6>
                <ul class="list-unstyled footer-link">
                    <li><a href="#">Karir</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Kontak Kami</a></li>
                    <li><a href="#">Servis</a></li>
                </ul>
            </div>

            {{-- CONTACT INFO --}}
            <div class="col-lg-4 col-md-6">
                <h6 class="text-white fw-semibold mb-3">Contact Info</h6>
                <ul class="list-unstyled footer-contact">
                    <li>
                        <i class="bi bi-envelope"></i>
                        {{ App\Models\tentang::getgmail() ?? '-' }}
                    </li>
                    <li>
                        <i class="bi bi-telephone"></i>
                        {{ App\Models\tentang::getno() ?? '-' }}
                    </li>
                    <li>
                        <i class="bi bi-geo-alt"></i>
                        {{ App\Models\tentang::getalamat() ?? '-' }}
                    </li>
                </ul>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <p class="text-center text-muted small mb-0">
            © {{ date('Y') }} {{ $profil->nama ?? 'Website' }}. All rights reserved
        </p>
    </div>
</footer>
{{-- jsnavbar --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 60) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>

</body>
</html>
