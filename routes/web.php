<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FunctionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['guest'])->group(function () {
  Route::get('/', [PagesController::class, 'index'])->name('index');
  Route::get('/login', [PagesController::class, 'login'])->name('login');
  Route::get('/register', [PagesController::class, 'register'])->name('register');
  Route::post('/register/post', [FunctionController::class, 'storeRegister'])->name('store-register');
  Route::post('/login/post', [FunctionController::class, 'storeLogin'])->name('store-login');
});

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
  Route::get('/prediksi-nilai', [PagesController::class, 'prediksiNilai'])->name('prediksi-nilai');
  Route::get('/hasil-penilaian/{kdkelompok}', [PagesController::class, 'hasilPenilaian'])->name('hasil-penilaian');
  Route::get('/laporan-penilaian', [PagesController::class, 'laporanPenilaian'])->name('laporan-penilaian')->middleware('isAdmin');

  Route::post('/prediksi-nilai/store', [FunctionController::class, 'hitungNilai'])->name('hitung-nilai');
  Route::post('/get-penilaian/post', [FunctionController::class, 'getPenilaian'])->name('get-penilaian');
  Route::post('/logout/post', [FunctionController::class, 'logout'])->name('logout');
});