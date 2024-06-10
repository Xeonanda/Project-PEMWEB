<?php

use App\Http\Controllers\PasarController;
use App\Http\Controllers\PengelolaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\RiwayatPemilikanController;

Route::get('/', function () {
    return view('konfigurasi');
})->name('konfigurasi');

Route::get('/pemilik', function () {
    return view('pemilik');
})->name('pemilik');

Route::get('/riwayat_iuran', function () {
    return view('riwayat_iuran');
})->name('riwayat_iuran');

// Tenant
Route::resource('tenants', TenantController::class);
Route::resource('riwayat_pemilikan', RiwayatPemilikanController::class);

// Pasar
Route::resource('pasar', PasarController::class);
Route::resource('pengelola', PengelolaController::class);
