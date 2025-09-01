@extends('layout')

@section('content')
<h3 class="mb-4">Daftar Aktivitas Mahasiswa</h3>
<div class="list-group">
    @foreach($activities as $activity)
        <a href="{{ route('aktivitas.show', $activity) }}" class="list-group-item list-group-item-action">
            {{ $activity }}
        </a>
    @endforeach
</div>
@endsection
