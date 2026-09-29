@extends('layouts.app')

@section('title', 'Tambah Produk - Admin UMKM JOICE')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow p-4 bg-white">
            <h3 class="mb-4">Tambah Produk Baru</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/admin/tambah" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kode Produk (Contoh: P001)</label>
                    <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="{{ old('kategori') }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ old('stok') }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama File Gambar (Sesuai yang ada di folder public/assets/img/)</label>
                    <input type="text" name="gambar" class="form-control" placeholder="Contoh: kripik.jpg" value="{{ old('gambar') }}" required>
                    <div class="form-text text-muted">Pastikan file gambar sudah dimasukkan manual ke folder <code>public/assets/img/</code>.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                <a href="/admin" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
