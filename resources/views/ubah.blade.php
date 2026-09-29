@extends('layouts.app')

@section('title', 'Ubah Produk - Admin UMKM JOICE')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow p-4 bg-white">
            <h3 class="mb-4">Ubah Data Produk</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/admin/update/{{ $produk->kode }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kode Produk (Tidak dapat diubah)</label>
                    <input type="text" class="form-control" value="{{ $produk->kode }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="{{ $produk->kategori }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="{{ $produk->harga }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ $produk->stok }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama File Gambar di Folder assets/img/</label>
                    @if($produk->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('assets/img/' . $produk->gambar) }}" width="80" class="img-thumbnail rounded" alt="Preview">
                        </div>
                    @endif
                    <input type="text" name="gambar" class="form-control" value="{{ $produk->gambar }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required>{{ $produk->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-warning text-white">Perbarui Produk</button>
                <a href="/admin" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
