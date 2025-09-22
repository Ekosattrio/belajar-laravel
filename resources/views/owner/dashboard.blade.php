<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <h2>Halo, {{ $user->name }}</h2>
    <p>Anda login sebagai <b>{{ $user->role }}</b></p>

    <a href="{{ route('products.form') }}" class="btn btn-primary">
    Kelola Products
</a>


    <form method="POST" action="{{ route('logout') }}" class="mt-3">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>

</body>
</html>
