<?php

use App\Http\Controllers\KartuKeluargaController;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendudukController;

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

// Data Kelahiran
Route::get('/kelahiran', function () {
    return view('kelahiran.index');
});

// Data Perpindahan
Route::get('/perpindahan', function () {
    return view('perpindahan.index');
});
