<?php

use App\Http\Controllers\PasarController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PengelolaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\RiwayatPemilikanController;
use App\Http\Controllers\RiwayatIuranController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;

Route::get('/', function(){
    if (Auth::check()){
        return redirect()->route('konfigurasi.index');
    }
    return view('home');
})->name('home');

// Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// Logout Route
Route::post('/logout', function (){
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware(['auth'])->group(function(){
    // Konfigurasi
    Route::resource('konfigurasi', KonfigurasiController::class);
    // Pemilik
    Route::resource('pemilik', PemilikController::class);
    // Tenant
    Route::resource('tenants', TenantController::class);
    Route::resource('riwayat_pemilikan', RiwayatPemilikanController::class);
    // Pasar
    Route::resource('pasar', PasarController::class);
    // Pengelola
    Route::resource('pengelola', PengelolaController::class);
    // Iuran
    Route::resource('riwayat_iuran', RiwayatIuranController::class);

    // Export
    Route::get('export-pasar', [PasarController::class, 'export'])->name('export.pasar');
    Route::get('export-konfigurasi', [KonfigurasiController::class, 'export'])->name('export.konfigurasi');
    Route::get('export-tenants', [TenantController::class, 'export'])->name('export.tenants');
    Route::get('export-riwayat_pemilikan', [RiwayatPemilikanController::class, 'export'])->name('export.riwayat_pemilikan');
    Route::get('export-riwayat_iuran', [RiwayatIuranController::class, 'export'])->name('export.riwayat_iuran');
    Route::get('export-pengelola', [PengelolaController::class, 'export'])->name('export.pengelola');
    Route::get('export-pemilik', [PemilikController::class, 'export'])->name('export.pemilik');
});
