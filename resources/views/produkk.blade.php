<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    {{-- Komponen alert --}}
    <x-alert :type="$type" :message="$message" />

    {{-- Kondisi isi_datas --}}
    @if ($isi_datas > 50)
        <p>Isi data lebih dari 50</p>
    @elseif($isi_datas == 20)
        <p>Isi data sama dengan 20</p>
    @else
        <p>Isi data kurang dari 50</p>
    @endif

    <p>
        Barang: {{ $barangs }} - {{ $isi_datas }}
    </p>

    <a href="{{ route('owner.dashboard') }}" class="btn btn-secondary mt-3">
        ← Back ke Dashboard Owner
    </a>

</body>
</html>
