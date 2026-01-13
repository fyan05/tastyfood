<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Tasty Food</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins',sans-serif;
            background: linear-gradient(135deg, #2196f3, #3f51b5);
            min-height: 100vh;
        }
        .auth-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,.15);
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

<div class="col-md-4">
    <div class="card auth-card p-4">
        <h3 class="text-center fw-bold mb-3">
            <i class="fa fa-user-plus text-primary"></i> Register
        </h3>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('registerpost') }}">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name"
                       class="form-control" required>
            </div>

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

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">
                <i class="fa fa-save"></i> Daftar
            </button>

            <p class="text-center small mt-2">
                Sudah punya akun?
                <a href="/login">Login</a>
            </p>
        </form>
    </div>
</div>

</body>
</html>
