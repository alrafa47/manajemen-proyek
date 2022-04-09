<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\BidangkeahlianController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PenugasanController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\ProyekController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    // dd(Pegawai::with('jabatan')->where('id', 111)->get());
});

Route::get('/test', function () {
    // return view('welcome');
    return view('layout.index');
});

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
Route::get('/pegawai/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');

Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
Route::post('/jabatan', [JabatanController::class, 'store'])->name('jabatan.store');
Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');
Route::get('/jabatan/{id}', [JabatanController::class, 'edit'])->name('jabatan.edit');
Route::put('/jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');

Route::get('/bidangkeahlian', [BidangkeahlianController::class, 'index'])->name('bidangkeahlian.index');
Route::post('/bidangkeahlian', [BidangkeahlianController::class, 'store'])->name('bidangkeahlian.store');
Route::delete('/bidangkeahlian/{id}', [BidangkeahlianController::class, 'destroy'])->name('bidangkeahlian.destroy');
Route::get('/bidangkeahlian/{id}', [BidangkeahlianController::class, 'edit'])->name('bidangkeahlian.edit');
Route::put('/bidangkeahlian/{id}', [BidangkeahlianController::class, 'update'])->name('bidangkeahlian.update');

Route::get('/file', [FileController::class, 'index'])->name('file.index');
Route::post('/file', [FileController::class, 'store'])->name('file.store');
Route::delete('/file/{id}', [FileController::class, 'destroy'])->name('file.destroy');
Route::get('/file/{id}', [FileController::class, 'edit'])->name('file.edit');
Route::put('/file/{id}', [FileController::class, 'update'])->name('file.update');

Route::get('/penugasan', [PenugasanController::class, 'index'])->name('penugasan.index');
Route::post('/penugasan', [PenugasanController::class, 'store'])->name('penugasan.store');
Route::delete('/penugasan/{id}', [PenugasanController::class, 'destroy'])->name('penugasan.destroy');
Route::get('/penugasan/{id}', [PenugasanController::class, 'edit'])->name('penugasan.edit');
Route::put('/penugasan/{id}', [PenugasanController::class, 'update'])->name('penugasan.update');

Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');
Route::get('/tugas/{id}', [TugasController::class, 'edit'])->name('tugas.edit');
Route::put('/tugas/{id}', [TugasController::class, 'update'])->name('tugas.update');

Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek.index');
Route::post('/proyek', [ProyekController::class, 'store'])->name('proyek.store');
Route::delete('/proyek/{id}', [ProyekController::class, 'destroy'])->name('proyek.destroy');
Route::get('/proyek/{id}', [ProyekController::class, 'edit'])->name('proyek.edit');
Route::put('/proyek/{id}', [ProyekController::class, 'update'])->name('proyek.update');
Route::get('/proyeks/{id}', [ProyekController::class, 'show'])->name('proyek.show');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
