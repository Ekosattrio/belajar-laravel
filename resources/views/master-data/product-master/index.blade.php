@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Daftar Produk</h2>
        <a href="{{ route('master.product.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Unit</th>
                    <th>Type</th>
                    <th>Qty</th>
                    <th>Producer</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>{{ $product->type }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->producer }}</td>
                        <td>{{ $product->category->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('master.product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('master.product.destroy', $product->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
