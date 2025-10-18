@extends('layouts.app')

@section('title', 'Dashboard Owner')

@section('content')
    <div class="container mt-4">
        <h2>Halo, {{ $user->name }}</h2>
        <p>Anda login sebagai <b>{{ ucfirst($user->role) }}</b></p>

        <div class="mt-3">
            <a href="{{ route('master.product.index') }}" class="btn btn-warning ms-2">
                Master Product
            </a>


            {{-- Tombol lama tetap bisa digunakan --}}
            <a href="{{ route('products.form') }}" class="btn btn-primary ms-2">
                Kelola Products
            </a>

            <a href="{{ route('barang') }}" class="btn btn-success ms-2">
                Halaman Barang
            </a>

            <a href="{{ route('produk') }}" class="btn btn-info ms-2">
                Halaman Produk
            </a>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
@endsection
