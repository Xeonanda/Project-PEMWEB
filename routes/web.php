<?php

use App\Http\Controllers\PasarController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PengelolaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\RiwayatPemilikanController;
use App\Http\Controllers\RiwayatIuranController;
use App\Http\Controllers\KonfigurasiController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [KonfigurasiController::class, 'index'])->name('konfigurasi');

//Pemilik
Route::resource('pemilik', PemilikController::class);

// Tenant
Route::resource('tenants', TenantController::class);
Route::resource('riwayat_pemilikan', RiwayatPemilikanController::class);

// Pasar
Route::resource('pasar', PasarController::class);
Route::resource('pengelola', PengelolaController::class);

// Iuran
Route::resource('riwayat_iuran', RiwayatIuranController::class);

// Konfigurasi
Route::resource('konfigurasi', KonfigurasiController::class);

// Logout Route
ROute::post('/logout', function (){
    Auth::logout();
    return redirect('/');
})->name('logout');

// Export
Route::get('export-pasar', [PasarController::class, 'export'])->name('export.pasar');
Route::get('export-konfigurasi', [KonfigurasiController::class, 'export'])->name('export.konfigurasi');
Route::get('export-tenants', [TenantController::class, 'export'])->name('export.tenants');
Route::get('export-riwayat_pemilikan', [RiwayatPemilikanController::class, 'export'])->name('export.riwayat_pemilikan');
Route::get('export-riwayat_iuran', [RiwayatIuranController::class, 'export'])->name('export.riwayat_iuran');
Route::get('export-pengelola', [PengelolaController::class, 'export'])->name('export.pengelola');
Route::get('export-pemilik', [PemilikController::class, 'export'])->name('export.pemilik');
