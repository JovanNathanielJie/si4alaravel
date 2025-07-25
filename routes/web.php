<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\MataKuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    // return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/fakultas', FakultasController::class);
Route::resource('/prodi', ProdiController::class); // menambahkan route resource prodi
Route::resource('/mahasiswa', MahasiswaController::class); // menambahkan route resource mahasiswa
Route::resource('/sesi', SesiController::class); // menambahkan route resource sesi
Route::resource('/mata_kuliah', MataKuliahController::class); // menambahkan route resource mata kuliah
Route::resource('/jadwal', JadwalController::class); // menambahkan route resource jadwal
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // menambahkan route dashboard

require __DIR__.'/auth.php';
