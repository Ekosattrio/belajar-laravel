@extends('layouts.app')

@section('title', 'Input Angka')

@section('content')
<div class="py-4">
    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2 class="mb-4 text-center text-primary">Input Angka</h2>

                <form method="POST" action="{{ route('products.process') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="angka" class="form-label">Masukkan Angka</label>
                        <input type="number" name="angka" id="angka" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <button type="submit" class="btn btn-success">Proses</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
