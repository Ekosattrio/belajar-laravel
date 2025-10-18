@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Edit Produk</h2>

        <form action="{{ route('master.product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
            </div>
            <div class="mb-3">
                <label>Unit</label>
                <input type="text" name="unit" class="form-control" value="{{ $product->unit }}" required>
            </div>
            <div class="mb-3">
                <label>Type</label>
                <input type="text" name="type" class="form-control" value="{{ $product->type }}" required>
            </div>
            <div class="mb-3">
                <label>Qty</label>
                <input type="number" name="qty" class="form-control" value="{{ $product->qty }}" required>
            </div>
            <div class="mb-3">
                <label>Producer</label>
                <input type="text" name="producer" class="form-control" value="{{ $product->producer }}" required>
            </div>
            <div class="mb-3">
                <label>Informasi</label>
                <textarea name="information" class="form-control">{{ $product->information }}</textarea>
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('master.product.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
