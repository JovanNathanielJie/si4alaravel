<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::resource('/fakultas', FakultasController::class);
Route::resource('/prodi', ProdiController::class); // menambahkan route resource prodi
Route::resource('/mahasiswa', MahasiswaController::class); // menambahkan route resource mahasiswa
Route::get('/dashboard', [DashboardController::class, 'index']); // menambahkan route dashboard
