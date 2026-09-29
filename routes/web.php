<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('home');
});

Route::get('/katalog', [ProdukController::class, 'index']);
Route::get('/katalog/{kode}', [ProdukController::class, 'detail']);

// Admin CRUD Routes
Route::get('/admin', [ProdukController::class, 'admin']);
Route::get('/admin/tambah', [ProdukController::class, 'create']);
Route::post('/admin/tambah', [ProdukController::class, 'store']);
Route::get('/admin/ubah/{kode}', [ProdukController::class, 'ubah']);
Route::post('/admin/update/{kode}', [ProdukController::class, 'update']);
Route::get('/admin/hapus/{kode}', [ProdukController::class, 'destroy']);
