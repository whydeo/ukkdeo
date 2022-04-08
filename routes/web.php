<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Penggunacontroller;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MejaController;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pengguna', 'PenggunaController')->middleware('ceklevel:admin');
// manager
Route::get('manager/index', [App\Http\Controllers\ManagerController::class, 'index'])->name('index')->middleware('ceklevel:manager');
Route::get('manager/laporan', [App\Http\Controllers\ManagerController::class, 'laporantrans'])->name('laporantrans')->middleware('ceklevel:manager');
Route::get('laporanpendapatan', [App\Http\Controllers\ManagerController::class, 'laporandapat'])->name('laporandapat')->middleware('ceklevel:manager');
Route::get('laporantotal', [App\Http\Controllers\ManagerController::class, 'totall'])->name('totall')->middleware('ceklevel:manager');
Route::get('logaktiv', [App\Http\Controllers\ManagerController::class, 'log'])->name('log')->middleware('ceklevel:manager');
Route::get('carimanager', [ManagerController::class, 'cari'])->name('carimanager');
Route::get('carinama', [ManagerController::class, 'search'])->name('carinama');
Route::get('caritertentu', [ManagerController::class, 'caris'])->name('caris');
// Route::get('total', [ManagerController::class, 'caris'])->name('caris');
Route::resource('menu','MenuController')->middleware('ceklevel:manager');
Route::resource('kategori','KategoriController')->middleware('ceklevel:manager');
Route::resource('meja','MejaController')->middleware('ceklevel:manager');

//  kasir
Route::post('/order',[App\Http\Controllers\KasirController::class, 'order'])->name('order')->middleware('ceklevel:kasir');
Route::post('pelanggan.create',[App\Http\Controllers\KasirController::class, 'tampung'])->name('tampung')->middleware('ceklevel:kasir');
Route::get('pelanggan.show',[App\Http\Controllers\KasirController::class, 'datatrans'])->name('datatrans')->middleware('ceklevel:kasir');
Route::post('pelanggan.cetakpesanan',[App\Http\Controllers\KasirController::class, 'cetak'])->name('cetak')->middleware('ceklevel:kasir');    Route::get('admin/logaktif',[App\Http\Controllers\AdminController::class, 'index'])->name('indexlog')->middleware('ceklevel:admin');
Route::resource('pesan','PesanController')->middleware('ceklevel:kasir');
Route::resource('kasir','kasirController')->middleware('ceklevel:kasir');
    // Route::get('print',[App\Http\Controllers\TamuController::class, ''])->name('indexlog')->middleware('ceklevel:admin');

// Route::get('/kasir/create',[App\Http\Controllers\KasirController::class, 'index'])->name('');
Route::post('/kasir/create',[App\Http\Controllers\KasirController::class, 'bayar'])->name('bayar');
