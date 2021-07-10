<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\PenggajihanController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home/about', function () {
    return view('about');
});

// ROUTE
Route::resource('/','App\Http\Controllers\HomeController');
Route::resource('/login','App\Http\Controllers\LoginController');
Route::resource('/home','App\Http\Controllers\HomeController');
Route::resource('/pegawai','App\Http\Controllers\PegawaiController')->middleware('auth');
Route::resource('/jabatan','App\Http\Controllers\JabatanController')->middleware('auth');
Route::resource('/golongan','App\Http\Controllers\GolonganController')->middleware('auth');
Route::resource('/penggajihan','App\Http\Controllers\PenggajihanController')->middleware('auth');

Route::get('/tambah_pegawai','App\Http\Controllers\PegawaiController@add_page')->middleware('auth');
Route::get('/edit_pegawai/{id_pegawai}','App\Http\Controllers\PegawaiController@edit_page')->middleware('auth');
Route::get('/tambah_jabatan','App\Http\Controllers\JabatanController@add_page')->middleware('auth');
Route::get('/edit_jabatan/{id_jabatan}','App\Http\Controllers\JabatanController@edit_page')->middleware('auth');
Route::get('/tambah_golongan','App\Http\Controllers\GolonganController@add_page')->middleware('auth');
Route::get('/edit_golongan/{id_golongan}','App\Http\Controllers\GolonganController@edit_page')->middleware('auth');
Route::get('/tambah_penggajihan','App\Http\Controllers\PenggajihanController@add_page')->middleware('auth');
Route::get('/edit_penggajihan/{id_penggajihan}','App\Http\Controllers\PenggajihanController@edit_page')->middleware('auth');

// Export PDF
Route::resource('/about','App\Http\Controllers\HomeController',['about'])->middleware('auth');
Route::get('pegawaipdf', [PegawaiController::class, 'pegawaiPDF'])->middleware('auth');
Route::get('jabatanpdf', [JabatanController::class, 'jabatanPDF'])->middleware('auth');
Route::get('golonganpdf', [GolonganController::class, 'golonganPDF'])->middleware('auth');
Route::get('gajipdf', [PenggajihanController::class, 'gajiPDF'])->middleware('auth');

// FUNC APP
Route::post('/check_login', 'App\Http\Controllers\LoginController@checkLogin')->middleware('auth');
Route::post('/tambah_pegawai', 'App\Http\Controllers\PegawaiController@add_pegawai')->middleware('auth');
Route::post('/edit_pegawai', 'App\Http\Controllers\PegawaiController@edit_pegawai')->middleware('auth');
Route::post('/delete_pegawai', 'App\Http\Controllers\PegawaiController@delete_pegawai')->middleware('auth');
Route::post('/tambah_jabatan', 'App\Http\Controllers\JabatanController@add_jabatan')->middleware('auth');
Route::post('/edit_jabatan', 'App\Http\Controllers\JabatanController@edit_jabatan')->middleware('auth');
Route::post('/delete_jabatan', 'App\Http\Controllers\JabatanController@delete_jabatan')->middleware('auth');
Route::post('/tambah_golongan', 'App\Http\Controllers\GolonganController@add_golongan')->middleware('auth');
Route::post('/edit_golongan', 'App\Http\Controllers\GolonganController@edit_golongan')->middleware('auth');
Route::post('/delete_golongan', 'App\Http\Controllers\GolonganController@delete_golongan')->middleware('auth');
Route::post('/tambah_penggajihan', 'App\Http\Controllers\PenggajihanController@add_penggajihan')->middleware('auth');
Route::post('/edit_penggajihan', 'App\Http\Controllers\PenggajihanController@edit_penggajihan')->middleware('auth');
Route::post('/delete_penggajihan', 'App\Http\Controllers\PenggajihanController@delete_penggajihan')->middleware('auth');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
