<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food Admin</title>

    {{-- Bootstrap & Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('bootstrap1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/fontawesome-free-6.7.2-web/css/all.min.css') }}">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f6;
            margin: 0;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg,#14532d,#166534);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            transition: 0.3s ease;
            padding-top: 20px;
        }

        .sidebar-header {
            text-align: center;
            color: #fff;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin: 6px 12px;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 10px;
            color: #e5e7eb;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar-menu li a:hover {
            background: rgba(255,255,255,.15);
            color: #fff;
        }

        .sidebar-menu li.active a {
            background: #22c55e;
            color: #064e3b;
            font-weight: 600;
        }

        .sidebar-menu li.logout a {
            background: rgba(239,68,68,.15);
            color: #fecaca;
        }

        .sidebar-menu li.logout a:hover {
            background: #ef4444;
            color: #fff;
        }

        /* ================= MAIN ================= */
        .main-wrapper {
            margin-left: 260px;
            min-height: 100vh;
            transition: 0.3s ease;
        }

        .topbar {
            background: #fff;
            padding: 12px 20px;
            box-shadow: 0 1px 5px rgba(0,0,0,.1);
            display: flex;
            align-items: center;
            gap: 15px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .content {
            padding: 25px;
        }

        /* ================= MOBILE & TABLET ================= */
        @media (max-width: 991.98px) {

            .sidebar {
                left: -260px;
            }

            .sidebar.active {
                left: 0;
            }

            .main-wrapper {
                margin-left: 0;
            }

            body.sidebar-open {
                overflow: hidden;
            }

            body.sidebar-open::after {
                content: "";
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,.4);
                z-index: 1040;
            }
        }
    </style>
</head>

<body>

{{-- SIDEBAR --}}
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <i class="fa-solid fa-utensils"></i> Tasty Food
    </div>

    <ul class="sidebar-menu">
        <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="/admin/dashboard">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
        </li>

        <li class="{{ request()->is('admin/berita*') ? 'active' : '' }}">
            <a href="/admin/berita">
                <i class="fa-solid fa-newspaper"></i> Berita
            </a>
        </li>

        <li class="{{ request()->is('admin/tentang*') ? 'active' : '' }}">
            <a href="/admin/tentang">
                <i class="fa-solid fa-info"></i> Tentang Kami
            </a>
        </li>

        <li class="{{ request()->is('admin/gambar*') ? 'active' : '' }}">
            <a href="/admin/gambar">
                <i class="fa-solid fa-images"></i> Galeri
            </a>
        </li>

        <li class="{{ request()->is('admin/kontak*') ? 'active' : '' }}">
            <a href="/admin/kontak">
                <i class="fa-solid fa-envelope"></i> Kontak
            </a>
        </li>

        <li class="logout mt-3">
            <a href="{{ route('logout.admin') }}">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </li>
    </ul>
</aside>

{{-- MAIN --}}
<div class="main-wrapper">

    {{-- TOPBAR --}}
    <div class="topbar">
        <button class="btn btn-link d-lg-none" id="sidebarToggle">
            <i class="fa-solid fa-bars fs-4"></i>
        </button>
        <strong>@yield('title','Dashboard')</strong>
    </div>

    {{-- CONTENT --}}
    <div class="content">
        @yield('content')
    </div>

</div>

<script src="{{ asset('bootstrap1/js/bootstrap.bundle.min.js') }}"></script>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggle  = document.getElementById('sidebarToggle');

    toggle.addEventListener('click', function (e) {
        e.stopPropagation();
        sidebar.classList.toggle('active');
        document.body.classList.toggle('sidebar-open');
    });

    document.addEventListener('click', function (e) {
        if (window.innerWidth <= 991.98) {
            if (!sidebar.contains(e.target) && !toggle.contains(e.target)) {
                sidebar.classList.remove('active');
                document.body.classList.remove('sidebar-open');
            }
        }
    });
</script>

</body>
</html>
