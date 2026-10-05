<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa!';
})->name('mahasiswa.show');

Route::get('/matakuliah', function () {
    return 'Masukkan kode matakuliah!';
})->name('matakuliah.show');

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama Saya : ' .$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM Saya : ' .$param1;
});

Route::get('/mahasiswa/{param1?}', [MahasiswaController::class,'show']);

Route::get('/matakuliah/{param2?}', [MatakuliahController::class,'show']);

Route::get('/about', function () {
    return view('halaman-about');
});

