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

// Route::get('kasir',  Kasir::class)->middleware('ceklevel:kasir');
// Route::resource('admin/index',Penggunacontroller::class)->middleware('ceklevel:admin');

// Route::resource('coba', 'CobaController')->middleware('ceklevel:admin');
Route::resource('pengguna', 'PenggunaController')->middleware('ceklevel:admin');
// Route::resource('Manager', 'ManagerController')->middleware('ceklevel:manager');
// Route::resource('Menu', 'MenuController')->middleware('ceklevel:manager');
// Route::resource('Menu', 'MenuController')->middleware('ceklevel:manager');
Route::get('manager/index', [App\Http\Controllers\ManagerController::class, 'index'])->name('index')->middleware('ceklevel:manager');
Route::get('manager/laporan', [App\Http\Controllers\ManagerController::class, 'laporantrans'])->name('laporantrans')->middleware('ceklevel:manager');
Route::get('laporanpendapatan', [App\Http\Controllers\ManagerController::class, 'laporandapat'])->name('laporandapat')->middleware('ceklevel:manager');
Route::get('carimanager', [ManagerController::class, 'cari'])->name('carimanager');
Route::get('carinama', [ManagerController::class, 'search'])->name('carinama');
Route::get('caritertentu', [ManagerController::class, 'caris'])->name('caris');

// Route::get('manager.laporan', [App\Http\Controllers\ManagerController::class, 'cari'])->name('cari')->middleware('ceklevel:manager');
// Route::get('menu/index', [App\Http\Controllers\MenuController::class, 'index'])->name('menu')->middleware('ceklevel:manager');
// Route::get('menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('create')->middleware('ceklevel:manager');
// Route::POST('menu/store', [App\Http\Controllers\MenuController::class, 'store'])->name('store')->middleware('ceklevel:manager');
// Route::get('menu/{id}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('edit')->middleware('ceklevel:manager');
// Route::put('menu/{id}/update', [App\Http\Controllers\MenuController::class, 'update'])->name('update')->middleware('ceklevel:manager');
// Route::get('menu/{id}/show', [App\Http\Controllers\MenuController::class, 'show'])->name('show')->middleware('ceklevel:manager');
// Route::get('menu/{id}/destroy', [App\Http\Controllers\MenuController::class, 'destroy'])->name('destroy')->middleware('ceklevel:manager');
Route::resource('menu','MenuController')->middleware('ceklevel:manager');

// Route::get('pengguna/{id}/edit', 'PenggunaController@edit')->name('edit');
// Route::post('pengguna/{id}/update', 'PenggunaController@update')->name('update');
// Route::get('/pengguna/{id}/edit', [App\Http\Controllers\PenggunaController::class, 'edit'])->name('admin.edit ');
// Route::get('/admin/dashboard/edit/{id}', [App\Http\Controllers\KamarController::class, 'edit'])->name('admin.dashboard.edit ');
// Route::post('/admin/dasahboard/edit/{id}', [App\Http\Controllers\KamarController::class, 'update']);
Route::resource('pesan','PesanController')->middleware('ceklevel:kasir');
// Route::resource('Kasir','KasirController')->middleware('ceklevel:kasir');
Route::resource('kategori','KategoriController')->middleware('ceklevel:manager');
Route::resource('meja','MejaController')->middleware('ceklevel:manager');
 Route::resource('kasir','kasirController')->middleware('ceklevel:kasir');
// Route::get('pelanggan.bayar',[App\Ht tp\Controllers\KasirController::class, 'tampung'])->name('tampung')->middleware('ceklevel:kasir');
Route::post('pelanggan.create',[App\Http\Controllers\KasirController::class, 'tampung'])->name('tampung')->middleware('ceklevel:kasir');
Route::get('pelanggan.show',[App\Http\Controllers\KasirController::class, 'datatrans'])->name('datatrans')->middleware('ceklevel:kasir');
Route::post('pelanggan.cetakpesanan',[App\Http\Controllers\KasirController::class, 'cetak'])->name('cetak')->middleware('ceklevel:kasir');

    // Route::get('/list', [App\Http\Controllers\KasirController::class , 'showlist']);
    // Route::post('/pesan/tambah_pesan', [App\Http\Controllers\KasirController::class, 'order'])->middleware('ceklevel:kasir');
    // Route::get('/pesan/{id}', [App\Http\Controllers\KasirController::class, 'tambahpesan'])->middleware('ceklevel:kasir');
    // Route::get('/cetak/{id}',  [App\Http\Controllers\KasirController::class, 'cetakpesan'])->middleware('ceklevel:kasir');
    Route::get('admin/logaktif',[App\Http\Controllers\AdminController::class, 'index'])->name('indexlog')->middleware('ceklevel:admin');
    
    // Route::get('print',[App\Http\Controllers\TamuController::class, ''])->name('indexlog')->middleware('ceklevel:admin');
