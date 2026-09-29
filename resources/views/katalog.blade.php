@extends('layouts.app')

@section('title', 'Katalog Produk - UMKM JOICE')

@section('content')
<h2 class="mb-4">Katalog Produk</h2>

<form method="GET" action="/katalog" class="input-group mb-4">
    <input type="text" name="cari" class="form-control" placeholder="Cari nama produk / kategori..." value="{{ $cari ?? '' }}">
    <button class="btn btn-dark" type="submit">Cari</button>
    <a href="/katalog" class="btn btn-secondary">Reset</a>
</form>

<div class="row">
    @forelse($produks as $row)
    <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm">
            <!-- Perbaikan path asset mengarah ke assets/img/ -->
            <img src="{{ asset('assets/img/' . $row->gambar) }}" class="card-img-top" style="height: 160px; object-fit: cover;" alt="{{ $row->nama_produk }}">
            <div class="card-body">
                <span class="badge bg-secondary mb-2">{{ $row->kategori }}</span>
                <h5 class="card-title">{{ $row->nama_produk }}</h5>
                <p class="text-primary fw-bold">Rp {{ number_format($row->harga, 0, ',', '.') }}</p>
                <a href="/katalog/{{ $row->kode }}" class="btn btn-outline-primary btn-sm w-100">Detail Produk</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-warning text-center">Tidak ada produk yang ditemukan.</div>
    </div>
    @endforelse
</div>
@endsection
