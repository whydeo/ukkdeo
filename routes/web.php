<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Penggunacontroller;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CobaController;
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
Route::get('menu/index', [App\Http\Controllers\MenuController::class, 'index'])->name('menu')->middleware('ceklevel:manager');
Route::get('menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('create')->middleware('ceklevel:manager');
Route::POST('menu/store', [App\Http\Controllers\MenuController::class, 'store'])->name('store')->middleware('ceklevel:manager');
Route::get('menu/{id}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('edit')->middleware('ceklevel:manager');
Route::put('menu/{id}/update', [App\Http\Controllers\MenuController::class, 'update'])->name('update')->middleware('ceklevel:manager');
Route::get('menu/{id}/show', [App\Http\Controllers\MenuController::class, 'show'])->name('show')->middleware('ceklevel:manager');
Route::get('menu/{id}/destroy', [App\Http\Controllers\MenuController::class, 'destroy'])->name('destroy')->middleware('ceklevel:manager');

// Route::get('pengguna/{id}/edit', 'PenggunaController@edit')->name('edit');
// Route::post('pengguna/{id}/update', 'PenggunaController@update')->name('update');
// Route::get('/pengguna/{id}/edit', [App\Http\Controllers\PenggunaController::class, 'edit'])->name('admin.edit ');
// Route::get('/admin/dashboard/edit/{id}', [App\Http\Controllers\KamarController::class, 'edit'])->name('admin.dashboard.edit ');
// Route::post('/admin/dashboard/edit/{id}', [App\Http\Controllers\KamarController::class, 'update']);
// Route::resource('transaksi', 'TransaksiController')->middleware('ceklevel:kasir');
Route::resource('pesan', 'PesanController')->middleware('ceklevel:kasir');
