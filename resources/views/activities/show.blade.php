@extends('layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title">Detail Aktivitas</h3>
        <p>Anda sedang melihat detail aktivitas: <strong>{{ $nama }}</strong></p>
        <a href="{{ route('aktivitas.index') }}" class="btn btn-secondary mt-2">← Kembali ke Daftar Aktivitas</a>
    </div>
</div>
@endsection
