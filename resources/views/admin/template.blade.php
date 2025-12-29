<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food</title>

    {{-- Bootstrap & Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('bootstrap1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/fontawesome-free-6.7.2-web/css/all.min.css') }}">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F4F6F6;

             color: #333;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: row;
        }

        .sidebar {
            width: 250px;
            background-color: #2E7D32;
            min-height: 100vh;
            flex-shrink: 0;
            display: block;
            flex-direction: column;
            padding: 1rem;
            position: fixed;
            z-index: 1000;
            transition: left 0.3s;
            left: 0;
        }

        .sidebar h4 {
            font-weight: 600;
        }

        .sidebar .nav-pills {
            padding-top: 0.5rem;
        }

        .sidebar .nav-link {
            color: #E8F5E9;
            font-weight: 500;
            margin-bottom: 0.5rem;
            padding: 0.6rem 0.9rem;
            border-radius: 0.6rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: background-color 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #388E3C;
            color: #fff;
        }

        .sidebar .nav-link i {
            font-size: 1rem;
        }

        .main-wrapper {
            flex: 1;
            margin-left:250px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: margin-left 0.3s;
        }

        .topbar {
            background-color: #fff;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar .search-box {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: #F8F9FA;
            border-radius: 0.5rem;
            padding: 0.3rem 0.8rem;
        }

        .topbar .search-box input {
            border: none;
            background: transparent;
            outline: none;
            font-size: 0.9rem;
        }

        .topbar .user-info {
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .topbar .user-info img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .content {
            flex: 1;
            padding: 25px;
        }

        .btn-primary {
            background-color: #FF9800;
            border: none;
        }

        .btn-primary:hover {
            background-color: #FB8C00;
        }
        /* ===========================
            RESPONSIVE SIDEBAR
            =========================== */

            /* Default Desktop */
            .sidebar {
                left: 0;
            }

            .main-wrapper {
                margin-left: 250px;
            }

            /* Tablet & Mobile */
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

                body::after {
                    content: "";
                    position: fixed;
                    inset: 0;
                    background: rgba(0,0,0,0.4);
                    opacity: 0;
                    pointer-events: none;
                    transition: 0.3s;
                }

                body.sidebar-open::after {
                    opacity: 1;
                    pointer-events: auto;
                }
            }


    </style>
</head>

<body>

{{-- SIDEBAR --}}
<nav class="sidebar" id="sidebar">
    <h4 class="text-white text-center mb-4">
        <i class="fa-solid fa-store me-2"></i> Tasty Food
    </h4>

    <ul class="nav flex-column">
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line"></i> Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.berita') }}"
               class="nav-link {{ request()->routeIs('admin.berita') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper"></i> Berita
            </a>
        </li>

        <li>
            <a href="{{ route('admin.tentang') }}"
               class="nav-link {{ request()->routeIs('admin.tentang') ? 'active' : '' }}">
                <i class="fa-solid fa-circle-info"></i> Tentang Kami
            </a>
        </li>

        <li>
            <a href="{{ route('admin.tentang.gambar') }}"
               class="nav-link {{ request()->routeIs('admin.tentang.gambar') ? 'active' : '' }}">
                <i class="fa-solid fa-image"></i> Gambar Tentang
            </a>
        </li>

        <li>
            <a href="{{ route('admin.kontak') }}"
               class="nav-link {{ request()->routeIs('admin.kontak') ? 'active' : '' }}">
                <i class="fa-solid fa-phone"></i> Kontak
            </a>
        </li>

        <li class="mt-3">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </li>
    </ul>
</nav>

{{-- MAIN --}}
<div class="main-wrapper">

    {{-- TOPBAR --}}
    <div class="topbar">
        <button class="btn btn-link d-lg-none" id="sidebarToggle">
            <i class="fa-solid fa-bars fs-4"></i>
        </button>

        <div class="fw-semibold">Dashboard</div>
    </div>

    {{-- CONTENT --}}
    <div class="content">
        @yield('content')
    </div>
</div>

<script src="{{ asset('bootstrap1/js/bootstrap.bundle.min.js') }}"></script>
    <script>
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');

    toggle.addEventListener('click', function () {
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
