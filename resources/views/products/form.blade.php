<!DOCTYPE html>
<html>
<head>
    <title>Input Angka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>Input Angka</h2>

    <form method="POST" action="{{ route('products.process') }}">
        @csrf
        <div class="mb-3">
            <label for="angka" class="form-label">Masukkan Angka</label>
            <input type="number" name="angka" id="angka" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Proses</button>
    </form>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
</body>
</html>
