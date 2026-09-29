<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - UMKM JOICE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">UMKM JOICE (Admin)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="/">Beranda</a>
                    <a class="nav-link" href="/katalog">Katalog</a>
                    <a class="nav-link active" href="/admin">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
            <h2>Kelola Data Produk</h2>
            <a href="/admin/tambah" class="btn btn-primary">+ Tambah Produk Baru</a>
        </div>

        <form method="GET" action="/admin" class="input-group mb-4">
            <input type="text" name="cari" class="form-control" placeholder="Cari berdasarkan nama atau kode..." value="{{ $cari ?? '' }}">
            <button class="btn btn-dark" type="submit">Cari</button>
            <a href="/admin" class="btn btn-secondary">Reset</a>
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm p-3 bg-white">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Foto</th>
                            <th>Kode</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produks as $row)
                        <tr>
                            <td class="text-center">
                                @if($row->gambar)
                                    <img src="{{ asset('storage/produk/' . $row->gambar) }}" alt="Foto" width="50" height="50" style="object-fit: cover;" class="rounded">
                                @else
                                    <span class="text-muted small">Tidak ada</span>
                                @endif
                            </td>
                            <td>{{ $row->kode }}</td>
                            <td>{{ $row->nama_produk }}</td>
                            <td>{{ $row->kategori }}</td>
                            <td>Rp {{ number_format($row->harga, 0, ',', '.') }}</td>
                            <td>{{ $row->stok }}</td>
                            <td class="text-center">
                                <a href="/admin/ubah/{{ $row->kode }}" class="btn btn-warning btn-sm mb-1 text-white">Ubah</a>
                                <a href="/admin/hapus/{{ $row->kode }}" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Tidak ada data produk ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
