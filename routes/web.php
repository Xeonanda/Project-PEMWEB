<?php

use App\Http\Controllers\PasarController;
use App\Http\Controllers\PengelolaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\RiwayatPemilikanController;
use App\Http\Controllers\RiwayatIuranController;

Route::get('/', function () {
    return view('konfigurasi.index');
})->name('konfigurasi');

Route::get('/pemilik', function () {
    return view('pemilik');
})->name('pemilik');


// Tenant
Route::resource('tenants', TenantController::class);
Route::resource('riwayat_pemilikan', RiwayatPemilikanController::class);

// Pasar
Route::resource('pasar', PasarController::class);
Route::resource('pengelola', PengelolaController::class);
// Iuran
Route::resource('riwayat_iuran', RiwayatIuranController::class);
