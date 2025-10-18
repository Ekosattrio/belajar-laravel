@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Edit Produk</h2>

        <form action="{{ route('master.product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Unit</label>
                <input type="text" name="unit" class="form-control" value="{{ $product->unit }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipe</label>
                <input type="text" name="type" class="form-control" value="{{ $product->type }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Qty</label>
                <input type="number" name="qty" class="form-control" value="{{ $product->qty }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Produsen</label>
                <input type="text" name="producer" class="form-control" value="{{ $product->producer }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="information" class="form-control" rows="3">{{ $product->information }}</textarea>
            </div>

            <div class="text-end">
                <a href="{{ route('master.product.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
