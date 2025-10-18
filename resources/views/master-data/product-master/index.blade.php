@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Daftar Produk</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3 text-end">
            <a href="{{ route('master.product.create') }}" class="btn btn-primary">+ Tambah Produk</a>
        </div>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Unit</th>
                    <th>Tipe</th>
                    <th>Qty</th>
                    <th>Produsen</th>
                    <th>Keterangan</th>
                    <th width="140px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->category->name ?? '-' }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>{{ $product->type }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->producer }}</td>
                        <td>{{ $product->information ?? '-' }}</td>
                        <td>
                            <a href="{{ route('master.product.edit', $product->id) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('master.product.destroy', $product->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">Belum ada data produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
