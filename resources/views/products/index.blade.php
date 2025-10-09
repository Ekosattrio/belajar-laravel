@extends('layouts.app')

@section('title', 'Hasil Angka')

@section('content')
<div class="py-4">
    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2 class="mb-4 text-center text-primary">Hasil Perhitungan</h2>

                {{-- Tampilkan ganjil/genap  --}}
                @isset($message)
                    <div class="mb-3">
                        <p>Angka: <b>{{ $angka }}</b></p>
                        <x-alert type="{{ $type }}">
    {{ $message }}
</x-alert>

                    </div>
                @endisset

                @isset($hasil)
                    <p>Setelah diproses (ditambah 10): <b>{{ $hasil }}</b></p>
                @endisset

                <div class="mt-4 d-flex justify-content-center gap-2">
                    <a href="{{ route('products.form') }}" class="btn btn-warning">Input Lagi</a>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
