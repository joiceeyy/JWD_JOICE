<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    // Katalog Produk
    public function index(Request $request) {
        $cari = $request->input('cari');
        $produks = Produk::when($cari, function ($query, $cari) {
            return $query->where('nama_produk', 'like', "%{$cari}%")
                         ->orWhere('kategori', 'like', "%{$cari}%");
        })->get();

        return view('katalog', compact('produks', 'cari'));
    }

    // Detail Produk
    public function detail($kode) {
        $produk = Produk::where('kode', $kode)->firstOrFail();
        return view('detail', compact('produk'));
    }

    // Admin Panel
    public function admin(Request $request) {
        $cari = $request->input('cari');
        $produks = Produk::when($cari, function ($query, $cari) {
            return $query->where('nama_produk', 'like', "%{$cari}%")
                         ->orWhere('kode', 'like', "%{$cari}%");
        })->get();

        return view('admin', compact('produks', 'cari'));
    }

    // Form Tambah
    public function create() {
        return view('tambah');
    }

    // Simpan Produk Baru (Gambar berupa nama file string manual)
    public function store(Request $request) {
        $request->validate([
            'kode' => 'required|unique:produks,kode',
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'deskripsi' => 'required',
            'gambar' => 'required', // Nama file gambar manual, cth: kripik.jpg
        ]);

        Produk::create([
            'kode' => $request->kode,
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar
        ]);

        return redirect('/admin')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Form Ubah
    public function ubah($kode) {
        $produk = Produk::where('kode', $kode)->firstOrFail();
        return view('ubah', compact('produk'));
    }

    // Update Produk
    public function update(Request $request, $kode) {
        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        Produk::where('kode', $kode)->update([
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar
        ]);

        return redirect('/admin')->with('success', 'Data produk berhasil diperbarui!');
    }

    // Hapus Produk
    public function destroy($kode) {
        $produk = Produk::where('kode', $kode)->firstOrFail();
        $produk->delete();

        return redirect('/admin')->with('success', 'Produk berhasil dihapus!');
    }
}
