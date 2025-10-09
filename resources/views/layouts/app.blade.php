<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background-color: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 20px 15px;
            position: fixed;
            top: 0;
            bottom: 0;
        }

        .sidebar h5 {
            color: #1e293b;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: #334155;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #3b82f6;
            color: white;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 240px;
            padding: 20px;
            overflow-y: auto;
        }

        /* Navbar */
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 10px 20px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar h6 {
            margin: 0;
            font-weight: 600;
            color: #1e293b;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <h5>Panel Admin</h5>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('products.form') }}" class="{{ request()->routeIs('products.form') ? 'active' : '' }}">Kelola Produk</a>
        <a href="{{ route('barang') }}" class="{{ request()->routeIs('barang') ? 'active' : '' }}">Barang</a>
        <a href="{{ route('produk') }}" class="{{ request()->routeIs('produk') ? 'active' : '' }}">Produk</a>

        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100">Logout</button>
        </form>
    </div>

    {{-- Main Area --}}
    <div class="main-content">  
        {{-- Navbar --}}
        <div class="navbar d-flex justify-content-between align-items-center mb-3">
            <h6>@yield('title', 'Dashboard')</h6>
            <span class="text-muted">Halo, {{ Auth::user()->name ?? 'User' }}</span>
        </div>

        {{-- Content --}}
        <div class="content-area">
            @yield('content')
        </div>
    </div>

</body>
</html>
