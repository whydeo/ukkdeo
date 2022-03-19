<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Penggunacontroller;
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
// Route::resource('admin/index',Penggunacontroller::class)->middleware('ceklevel:admin');

Route::resource('coba', 'CobaController')->middleware('ceklevel:admin');
Route::resource('pengguna', 'PenggunaController')->middleware('ceklevel:admin');

// Route::get('pengguna/{id}/edit', 'PenggunaController@edit')->name('edit');
// Route::post('pengguna/{id}/update', 'PenggunaController@update')->name('update');

// Route::get('/pengguna/{id}/edit', [App\Http\Controllers\PenggunaController::class, 'edit'])->name('admin.edit ');


Route::get('/admin/dashboard/edit/{id}', [App\Http\Controllers\KamarController::class, 'edit'])->name('admin.dashboard.edit ');
Route::post('/admin/dashboard/edit/{id}', [App\Http\Controllers\KamarController::class, 'update']);