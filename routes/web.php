<?php

use App\Http\Controllers\CetakController;
use App\Models\Penduduk;
use App\Models\Kelahiran;
use App\Policies\KartuKeluargaPolicy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\PerpindahanController;
use App\Models\KartuKeluarga;

Route::get('/', function () {
    return view('welcome');
})->name('main')->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Manage User
Route::get('/profile', [UserController::class, 'show'])->middleware('auth');
Route::get('/kelola-staff', [UserController::class, 'index'])->middleware(['auth', 'isAdmin']);
Route::get('/kelola-staff/tambah-staff', [UserController::class, 'create'])->middleware(['auth', 'isAdmin']);
Route::post('/kelola-staff/tambah-staff', [UserController::class, 'store'])->middleware(['auth', 'isAdmin']);
Route::get('/kelola-staff/{user}/edit', [UserController::class, 'edit'])->middleware(['auth', 'isAdmin']);
Route::put('/kelola-staff/{user}/', [UserController::class, 'update'])->middleware(['auth', 'isAdmin']);
Route::delete('/kelola-staff/{user}', [UserController::class, 'destroy'])->middleware(['auth', 'isAdmin']);

Route::get('kelola-staff/ganti-password/{user}', [UserController::class, 'halamanGantiPassword'])->middleware(['auth', 'isAdmin']);
Route::put('kelola-staff/ganti-password/{user}', [UserController::class, 'gantiPassword'])->middleware(['auth', 'isAdmin']);

// Penduduk
Route::resource('/penduduk', PendudukController::class)->middleware(['auth', 'isAdmin']);
// Data Kartu Keluarga
Route::middleware(['auth'])->group(function () {
    Route::resource('/kartu-keluarga', KartuKeluargaController::class)->middleware('isAdmin');
    Route::post('/kartu-keluarga/pendudukTambah', [KartuKeluargaController::class, 'tambahPenduduk'])->middleware('isAdmin');
    Route::post('/kartu-keluarga/pendudukTambahBaru', [KartuKeluargaController::class, 'tambahPendudukBaru'])->middleware('isAdmin');
    Route::put('/kartu-keluarga/updatePendudukKk/{penduduk}', [KartuKeluargaController::class, 'updatePendudukKk'])->middleware('isAdmin');
    Route::delete('/kartu-keluarga/penduduk/{penduduk}', [KartuKeluargaController::class, 'hapusPendudukKK'])->middleware('isAdmin');
});
// Route::resource('/kartu-keluarga', KartuKeluargaController::class)->middleware('auth');
// Route::post('/kartu-keluarga/pendudukTambah', [KartuKeluargaController::class, 'tambahPenduduk'])->middleware('auth');
// Route::post('/kartu-keluarga/pendudukTambahBaru', [KartuKeluargaController::class, 'tambahPendudukBaru'])->middleware('auth');
// Route::put('/kartu-keluarga/updatePendudukKk/{penduduk}', [KartuKeluargaController::class, 'updatePendudukKk'])->middleware('auth');
// Route::delete('/kartu-keluarga/penduduk/{penduduk}', [KartuKeluargaController::class, 'hapusPendudukKK'])->middleware('auth');

// Data Kelahiran
Route::resource('/kelahiran', KelahiranController::class)->middleware(['auth', 'isAdmin']);

// Data Kematian
Route::middleware(['auth'])->group(function () {
    Route::resource('/kematian', KematianController::class)->middleware(['auth', 'isAdmin']);
    Route::delete('kematian/{penduduk}/konfirmasi-kematian', [KematianController::class, 'konfirmasiKematian'])->middleware("isAdmin");
});
// Data Perpindahan
Route::resource('/perpindahan', PerpindahanController::class)->middleware(['auth', 'isAdmin']);

Route::prefix('laporan')->group(function () {
    Route::get('/penduduk', [CetakController::class, 'penduduk'])->name('laporan.penduduk');
    Route::get('/kartu-keluarga', [CetakController::class, 'kartuKeluarga'])->name('laporan.kartu-keluarga');
    Route::get('/kelahiran', [CetakController::class, 'kelahiran'])->name('laporan.kelahiran');
    Route::get('/kematian', [CetakController::class, 'kematian'])->name('laporan.kematian');
    Route::get('/perpindahan', [CetakController::class, 'perpindahan'])->name('laporan.perpindahan');
    Route::get('/cetak-penduduk', [CetakController::class, 'cetakPenduduk']);
    Route::get('/cetak-kartu-keluarga', [CetakController::class, 'cetakKartuKeluarga']);
    Route::get('/cetak-kelahiran', [CetakController::class, 'cetakKelahiran']);
    Route::get('/cetak-kematian', [CetakController::class, 'cetakKematian']);
    Route::get('/cetak-perpindahan', [CetakController::class, 'cetakPerpindahan']);
    Route::get('/tester', function () {
        return view('laporan.pdf.kartu-keluarga-pdf', ["kartu_keluargas" => KartuKeluarga::all()]);
    });
});
