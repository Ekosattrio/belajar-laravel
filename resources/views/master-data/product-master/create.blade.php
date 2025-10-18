@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Tambah Produk</h2>

        <form action="{{ route('master.product.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Unit</label>
                <input type="text" name="unit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Type</label>
                <input type="text" name="type" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Qty</label>
                <input type="number" name="qty" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Producer</label>
                <input type="text" name="producer" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Informasi</label>
                <textarea name="information" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('master.product.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
