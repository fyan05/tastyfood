<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','User Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
      body {
    font-family: 'Poppins', sans-serif;
    background: #f5f6fa;
}

/* SIDEBAR */
.sidebar {
    width: 260px;
    min-height: 100vh;
    background: #111827;
}

.sidebar a {
    color: #ddd;
    text-decoration: none;
    display: block;
    padding: 12px 20px;
    border-radius: 8px;
    margin-bottom: 6px;
}

.sidebar a:hover,
.sidebar .active {
    background: #2563eb;
    color: #fff;
}

.content {
    padding: 30px;
    width: 100%;
}

/* 🔥 FIX OFFCANVAS */
.offcanvas-start {
    width: 260px !important;
}

    </style>
</head>
<body>

{{-- NAVBAR MOBILE --}}
<nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
        <button class="btn btn-outline-light" data-bs-toggle="offcanvas" data-bs-target="#sidebarMobile">
            <i class="fa-solid fa-bars"></i>
        </button>
        <span class="navbar-brand">Blog Panel</span>
    </div>
</nav>

<div class="d-flex">

    {{-- SIDEBAR DESKTOP --}}
    <aside class="sidebar p-3 d-none d-md-block">
        <h4 class="text-white mb-4">
            <i class="fa-solid fa-blog me-2"></i> Blog Panel
        </h4>

        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-chart-line me-2"></i> Dashboard
        </a>

        <a href="{{ route('user.postingan') }}" class="{{ request()->routeIs('user.postingan') ? 'active' : '' }}">
            <i class="fa-solid fa-newspaper me-2"></i> Postingan
        </a>

        <a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile') ? 'active' : '' }}">
            <i class="fa-solid fa-user-gear me-2"></i> Setting Profile
        </a>

        <hr class="text-secondary">

        <a href="{{ route('logout') }}">
            <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
        </a>
    </aside>

    {{-- CONTENT --}}
    <main class="content flex-fill">
        @yield('content')
    </main>

</div>

{{-- SIDEBAR MOBILE (OFFCANVAS) --}}
<div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="sidebarMobile">
    <div class="offcanvas-header bg-dark text-white">
        <h5 class="offcanvas-title">
            <i class="fa-solid fa-blog me-2"></i> Blog Panel
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body sidebar">
        <a href="{{ route('user.dashboard') }}">
            <i class="fa-solid fa-chart-line me-2"></i> Dashboard
        </a>

        <a href="{{ route('user.postingan') }}">
            <i class="fa-solid fa-newspaper me-2"></i> Postingan
        </a>

        <a href="{{ route('user.profile') }}">
            <i class="fa-solid fa-user-gear me-2"></i> Setting Profile
        </a>

        <hr class="text-secondary">

        <a href="{{ route('logout') }}">
            <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
