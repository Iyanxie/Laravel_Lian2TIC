<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

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
    return 'Nama Saya : ' . $param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM Saya : ' . $param1;
});

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/mahasiswa/{param1?}', [MahasiswaController::class, 'show']);

Route::get('/matakuliah/{param2?}', [MatakuliahController::class, 'show']);

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');
