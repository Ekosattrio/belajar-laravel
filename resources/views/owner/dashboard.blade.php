@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h2>Halo, {{ $user->name }}</h2>
    <p>Anda login sebagai <b>{{ $user->role }}</b></p>

    <a href="{{ route('products.form') }}" class="btn btn-primary">
        Kelola Products
    </a>
    <a href="{{ route('barang') }}" class="btn btn-success ms-2">
        Halaman Barang
    </a>
    <a href="{{ route('produk') }}" class="btn btn-success ms-2">
        Halaman produk
    </a>

    {{-- Tambahan baru --}}
    <a href="{{ route('master.product.create') }}" class="btn btn-warning ms-2">
        Master Product
    </a>

    <form method="POST" action="{{ route('logout') }}" class="mt-3">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
@endsection
