<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2>Halo, {{ $user->name }}</h2>
<p>Role Anda adalah <b>{{ $user->role }}</b></p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="btn btn-danger">Logout</button>
</form>

</body>
</html>
    