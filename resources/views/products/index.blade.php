<!DOCTYPE html>
<html>
<head>
    <title>Hasil Angka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>Hasil Perhitungan</h2>

    <p>Angka dari input: <b>{{ $angka }}</b></p>
    <p>Setelah diproses (ditambah 10): <b>{{ $hasil }}</b></p>

    <a href="{{ route('products.form') }}" class="btn btn-warning mt-3">Input Lagi</a>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
</body>
</html>
