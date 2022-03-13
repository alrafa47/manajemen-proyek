<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pegawai;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;
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

Route::get('/bidangkeahlian', [BidangkeahlianController::class, 'index'])->name('bidangkeahlian.index');
Route::post('/bidangkeahlian', [BidangkeahlianController::class, 'store'])->name('bidangkeahlian.store');
Route::delete('/bidangkeahlian/{id}', [BidangkeahlianController::class, 'destroy'])->name('bidangkeahlian.destroy');
Route::get('/bidangkeahlian/{id}', [BidangkeahlianController::class, 'edit'])->name('bidangkeahlian.edit');
