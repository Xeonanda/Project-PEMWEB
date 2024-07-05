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

Route::get('/', function(){
    return view('home');
})->name('home');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::resource('konfigurasi', KonfigurasiController::class);
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
