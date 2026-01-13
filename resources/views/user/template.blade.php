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
    =================================*/
    body{
        font-family:'Poppins',sans-serif;
        background:#F2F2F2;
        color:#333;
        margin:0;
        padding:0;
    }
/* ===============================
NAVBAR
=================================*/
.navbar{
    background:transparent;   /* transparan */
    padding:12px 0;          /* lebih tipis */
    position:fixed;
    width:100%;
    z-index:1000;
    transition:all .3s ease;
}

/* saat scroll jadi putih */
.navbar.scrolled{
    background:#ffffff;
    box-shadow:0 2px 8px rgba(0,0,0,.06);
}

/* brand */
.navbar-brand{
    font-size:15px;
    letter-spacing:1.5px;
    font-weight:700;   /* hanya brand yang bold */
    color:#222 !important;
}

/* menu */
.nav-link{
    font-size:13px;
    letter-spacing:1px;
    font-weight:400;   /* tipis */
    color:#222 !important;
}

/* spacing menu desktop */
@media (min-width:992px){
    .navbar-nav{
        margin-left:40px;
        gap:22px;
    }
}

/* toggler */
.navbar-toggler{
    border:none;
    font-size:22px;
    color:#222;
}

.navbar-toggler:focus{
    box-shadow:none;
}

/* mobile */
@media (max-width:991px){
    .navbar{
        background:#fff;   /* mobile tetap putih biar jelas */
        padding:12px 0;
    }

    .navbar-collapse{
        background:#fff;
        padding:16px;
        border-radius:12px;
        margin-top:10px;
        box-shadow:0 10px 25px rgba(0,0,0,.08);
    }

    .navbar-nav{
        gap:12px;
    }
}



    /* ===============================
    HOME HERO
    =================================*/
    .home-hero{
        min-height:100vh;
        display:flex;
        align-items:center;
        background:#F2F2F2;
        position:relative;
        overflow:hidden;
    }

    /* TEXT */
    .hero-title{
        font-size:52px;
        font-weight:700;
        line-height:1.2;
        color:#222;
    }
    .hero-text p{
        max-width:420px;
        color:#555;
    }

    /* IMAGE RIGHT (FULL EDGE) */
    .hero-img{
        position:absolute;
        right:-183px;
        top:210px;
        transform:translateY(-50%);
        max-height:90vh;
        width:auto;
        z-index:1;
    }

    /* HERO BACKGROUND (PAGE LAIN) */
    .hero-bg{
        height:70vh;
        background-size:cover;
        background-position:center;
        position:relative;
        display:flex;
        align-items:center;
    }

    /* OVERLAY PUTIH KEABUAN */
    .hero-bg::after{
        content:'';
        position:absolute;
        inset:0;
        background:#F2F2F2;
        opacity:0.9;
    }

    /* TITLE */
    .hero-bg h1{
        position:relative;
        z-index:2;
        font-size:48px;
        font-weight:700;
        color:#222;
    }
    /* tentang */
    .about-home{
        padding:80px 0;
        background:#fff;
    }
    .divider-line{
        width:400px;
        height:2px;
        background:#000;
        margin:30px auto 0;
    }
/* makanan */
 .food-section {
            background: url('{{ asset("asset/gambar/Group 70@2x.png") }}') center/cover no-repeat;
            padding: 100px 0;
        }

        .food-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 60px 20px 30px;
            text-align: center;
            position: relative;
            box-shadow: 0 20px 40px rgba(0,0,0,.15);
        }

        .food-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            border: 5px solid #fff;
        }

        .food-card h5 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .food-card p {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 0;
        }

        /* berita */
         .card img {
            object-fit: cover;
            height: 200px;
        }
        .card-utama img {
            height: 523px;
        }
        .read-more {
            color: #ff9800;
            font-weight: 500;
            text-decoration: none;
        }

        /* galeri */
         .galeri-img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        border-radius: 18px;
        box-shadow: 0 6px 16px rgba(0,0,0,.15);
         }

        .btn-galeri {
            background: #000;
            color: #fff;
            padding: 12px 40px;
            border-radius: 0;
            font-weight: 600;
            letter-spacing: .5px;
        }

        .btn-galeri:hover {
            background: #222;
            color: #fff;
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
   /* RESPONSIVE */
@media (max-width: 991px){
    .hero-img{
        position:static;
        transform:none;
        max-height:320px;
        margin:30px auto 0;
        display:block;
    }

    .home-hero{
        padding-top:120px;
        text-align:center;
    }

    .hero-text p{
        margin-left:auto;
        margin-right:auto;
    }
}

    </style>
</head>
<body class="@yield('body-class')">

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        {{-- BRAND --}}
        <a class="navbar-brand fw-bold" href="/">TASTY FOOD</a>

        {{-- TOGGLER --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <i class="fa-solid fa-bars"></i>
        </button>

        {{-- MENU --}}
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav align-items-lg-center">

                <li class="nav-item"><a class="nav-link" href="/">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="/tentang">TENTANG</a></li>
                <li class="nav-item"><a class="nav-link" href="/berita">BERITA</a></li>
                <li class="nav-item"><a class="nav-link" href="/galeri">GALERI</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">KONTAK</a></li>

                @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            LOGIN
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">
                            LOGOUT
                        </a>
                    </li>
                @endif

            </ul>
        </div>

    </div>
</nav>

{{-- HERO PAGE --}}
@if(View::hasSection('hero-bg'))
<section class="hero-bg" style="background-image:url('@yield('hero-bg')')">
    <div class="container">
        <h1>@yield('hero-title')</h1>
    </div>
</section>
@endif

{{-- CONTENT --}}
@yield('content')

{{-- FOOTER --}}
<footer class="footer-dark pt-5">
    <div class="container text-center pb-4">
        <p class="text-muted small mb-0">
            © 2023 Tasty Food — All Rights Reserved
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        window.scrollY > 50
            ? navbar.classList.add('scrolled')
            : navbar.classList.remove('scrolled');
    });
</script>

</body>
</html>
