<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('konfigurasi');
})->name('konfigurasi');

Route::get('/pemilik', function () {
    return view('pemilik');
})->name('pemilik');

Route::get('/pasar', function () {
    return view('pasar');
})->name('pasar');

Route::get('/tenant', function () {
    return view('tenant');
})->name('tenant');

Route::get('/riwayat_pemilikan', function () {
    return view('riwayat_pemilikan');
})->name('riwayat_pemilikan');

Route::get('/riwayat_iuran', function () {
    return view('riwayat_iuran');
})->name('riwayat_iuran');

Route::get('/pengelola', function () {
    return view('pengelola');
})->name('pengelola');
