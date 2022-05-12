<?php

use App\Http\Controllers\Master\DompetController;
use App\Http\Controllers\Master\KategoriController;
use App\Http\Controllers\Transaksi\DompetKeluarController;
use App\Http\Controllers\Transaksi\DompetMasukController;
use App\Http\Controllers\Laporan\LaporanTransaksiController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('dompet', DompetController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('dompetMasuk', DompetMasukController::class);
Route::resource('dompetKeluar', DompetKeluarController::class);
Route::resource('laporanTransaksi', LaporanTransaksiController::class);
