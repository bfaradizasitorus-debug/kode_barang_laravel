
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <style>
        body { font-family: Arial; background: #f4f6f9; margin: 35px; }
        .container { background: white; padding: 25px; border-radius: 10px; max-width: 600px; }
        input { width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box; }
        button, a { padding: 10px 15px; border: none; border-radius: 5px; text-decoration: none; cursor: pointer; }
        button { background: #198754; color: white; }
        a { background: #6c757d; color: white; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Data Barang</h2>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <label>Nama Barang</label>
        <input type="text" name="nama_barang"
               value="{{ old('nama_barang') }}" required>

        <label>Kategori</label>
        <input type="text" name="kategori"
               value="{{ old('kategori') }}" required>

        <label>Harga</label>
        <input type="number" name="harga" min="0"
               value="{{ old('harga') }}" required>

        <label>Stok</label>
        <input type="number" name="stok" min="0"
               value="{{ old('stok') }}" required>

        <button type="submit">Simpan Barang</button>
        <a href="{{ route('barang.index') }}">Kembali</a>
    </form>
</div>
</body>
</html>
