<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\RiwayatPemilikanController;
use App\Http\Controllers\RiwayatIuranController;

Route::get('/', function () {
    return view('konfigurasi');
})->name('konfigurasi');

Route::get('/pemilik', function () {
    return view('pemilik');
})->name('pemilik');

Route::get('/pasar', function () {
    return view('pasar');
})->name('pasar');

Route::get('/pengelola', function () {
    return view('pengelola');
})->name('pengelola');

// Tenant
Route::resource('tenants', TenantController::class);
Route::resource('riwayat_pemilikan', RiwayatPemilikanController::class);

// Iuran
Route::resource('riwayat_iuran', RiwayatIuranController::class);
