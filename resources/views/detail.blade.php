@extends('layouts.app')

@section('title', 'Detail Produk - ' . $produk->nama_produk)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow p-4 bg-white">
            <div class="row">
                <!-- Kolom Gambar -->
                <div class="col-md-5 mb-3 mb-md-0">
                    <img src="{{ asset('assets/img/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="img-fluid rounded shadow-sm w-100" style="object-fit: cover; max-height: 300px;">
                </div>
                <!-- Kolom Informasi Produk -->
                <div class="col-md-7">
                    <span class="badge bg-secondary mb-2">{{ $produk->kategori }}</span>
                    <h2 class="mb-3">{{ $produk->nama_produk }}</h2>
                    <h4 class="text-primary fw-bold mb-3">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h4>
                    <p class="text-muted mb-2"><strong>Kode Produk:</strong> {{ $produk->kode }}</p>
                    <p class="text-muted mb-3"><strong>Stok Tersedia:</strong> {{ $produk->stok }} pcs</p>
                    <hr>
                    <h5>Deskripsi Produk:</h5>
                    <p class="text-secondary" style="white-space: pre-line;">{{ $produk->deskripsi }}</p>

                    <div class="mt-4">
                        <a href="/katalog" class="btn btn-secondary">Kembali ke Katalog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
