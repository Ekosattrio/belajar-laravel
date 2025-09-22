<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name') }} - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

<div class="card shadow p-4" style="width: 350px;">
    <h3 class="text-center mb-3">Selamat Datang</h3>
    <p class="text-center">Silakan login ke <b>{{ config('app.name') }}</b></p>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Login</button>
    </form>

    <div class="text-center mt-3">
        <small>Belum punya akun? 
            <a href="{{ route('register') }}">Daftar di sini</a>
        </small>
    </div>
</div>

</body>
</html>
