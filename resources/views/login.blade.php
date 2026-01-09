<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Tasty Food</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #00c853, #009688);
            min-height: 100vh;
        }
        .auth-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,.15);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #00c853;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

<div class="col-md-4">
    <div class="card auth-card p-4">
        <h3 class="text-center fw-bold mb-3">
            <i class="fa fa-utensils text-success"></i> Tasty Food
        </h3>

        <p class="text-center text-muted">Login ke Dashboard Admin</p>
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('loginpost') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password"
                       class="form-control" required>
            </div>

            <button class="btn btn-success w-100 mb-2">
                <i class="fa fa-right-to-bracket"></i> Login
            </button>

            <p class="text-center small">
                Belum punya akun?
                <a href="/register">Daftar</a>
            </p>
        </form>
    </div>
</div>

</body>
</html>
