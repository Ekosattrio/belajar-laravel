<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','praktikum blade')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    {{-- Navbar dipanggil dari navigation.blade.php --}}
    @include('layouts.navigation')

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
