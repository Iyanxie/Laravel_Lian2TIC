<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PortofolioController;
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
Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);
Route::get('/mahasiswa/{param1?}', [MahasiswaController::class, 'show']);

Route::get('/matakuliah/{param2?}', [MatakuliahController::class, 'show']);

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/', function () {return view('welcome');});
// Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

// Rute CRUD Aplikasi CV Portofolio 1200
Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio.index');
Route::get('/portofolio/create', [PortofolioController::class, 'create'])->name('portofolio.create');
Route::post('/portofolio/store', [PortofolioController::class, 'store'])->name('portofolio.store');
Route::get('/portofolio/{id}/edit', [PortofolioController::class, 'edit'])->name('portofolio.edit');
Route::put('/portofolio/{id}/update', [PortofolioController::class, 'update'])->name('portofolio.update');
Route::get('/portofolio/{id}', [PortofolioController::class, 'show'])->name('portofolio.show');
Route::delete('/portofolio/{id}', [PortofolioController::class, 'destroy'])->name('portofolio.destroy');
