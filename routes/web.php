<?php

use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\KelahiranController;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendudukController;
use App\Models\Kelahiran;
use App\Policies\KartuKeluargaPolicy;

Route::get('/', function () {
    return view('welcome');
})->name('main')->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Penduduk
Route::resource('/penduduk', PendudukController::class)->middleware('auth');

// Data Kartu Keluarga
Route::resource('/kartu-keluarga', KartuKeluargaController::class)->middleware('auth');
Route::post('/kartu-keluarga/pendudukTambah', [KartuKeluargaController::class, 'tambahPenduduk'])->middleware('auth');
Route::post('/kartu-keluarga/pendudukTambahBaru', [KartuKeluargaController::class, 'tambahPendudukBaru'])->middleware('auth');
Route::put('/kartu-keluarga/updatePendudukKk/{penduduk}', [KartuKeluargaController::class, 'updatePendudukKk'])->middleware('auth');
Route::delete('/kartu-keluarga/penduduk/{penduduk}', [KartuKeluargaController::class, 'hapusPendudukKK'])->middleware('auth');

// Data Kelahiran
Route::resource('/kelahiran', KelahiranController::class)->middleware('auth');

// Data Perpindahan
Route::get('/perpindahan', function () {
    return view('perpindahan.index');
});
