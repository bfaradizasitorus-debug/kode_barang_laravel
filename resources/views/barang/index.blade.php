
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <style>
        body { font-family: Arial; margin: 35px; background: #f4f6f9; }
        .container { background: white; padding: 25px; border-radius: 10px; }
        h2 { color: #263445; }
        a, button { padding: 9px 14px; border: none; border-radius: 5px; text-decoration: none; cursor: pointer; }
        .tambah { background: #198754; color: white; }
        .edit { background: #0d6efd; color: white; }
        .hapus { background: #dc3545; color: white; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #263445; color: white; }
        .aksi { display: flex; gap: 6px; }
        .pesan { color: green; margin: 15px 0; }
    </style>
</head>
<body>
<div class="container">
    <h2>APLIKASI KODE BARANG OTOMATIS</h2>

    <a href="{{ route('barang.create') }}" class="tambah">
        + Tambah Barang
    </a>

    @if(session('success'))
        <p class="pesan">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($barangs as $barang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->kategori }}</td>
                    <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>
                        <div class="aksi">
                            <a href="{{ route('barang.edit', $barang->id) }}"
                               class="edit">Edit</a>

                            <form action="{{ route('barang.destroy', $barang->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hapus">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
