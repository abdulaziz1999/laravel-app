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

Route::get('/about', function () {
    return view('about');
});

// ROUTE
Route::resource('/','App\Http\Controllers\HomeController');
Route::resource('/login','App\Http\Controllers\LoginController');
Route::resource('/home','App\Http\Controllers\HomeController');
Route::resource('/pegawai','App\Http\Controllers\PegawaiController');
Route::get('/tambah_pegawai','App\Http\Controllers\PegawaiController@add_page');
Route::get('/edit_pegawai/{id_pegawai}','App\Http\Controllers\PegawaiController@edit_page');
Route::resource('/jabatan','App\Http\Controllers\JabatanController');
Route::get('/tambah_jabatan','App\Http\Controllers\JabatanController@add_page');
Route::get('/edit_jabatan/{id_jabatan}','App\Http\Controllers\JabatanController@edit_page');
Route::resource('/golongan','App\Http\Controllers\GolonganController');
Route::get('/tambah_golongan','App\Http\Controllers\GolonganController@add_page');
Route::get('/edit_golongan/{id_golongan}','App\Http\Controllers\GolonganController@edit_page');
Route::resource('/penggajihan','App\Http\Controllers\PenggajihanController');
Route::get('/tambah_penggajihan','App\Http\Controllers\PenggajihanController@add_page');
Route::get('/edit_penggajihan/{id_penggajihan}','App\Http\Controllers\PenggajihanController@edit_page');
Route::resource('/about','App\Http\Controllers\HomeController',['about']);
Route::get('pegawaipdf', [PegawaiController::class, 'pegawaiPDF']);
Route::get('jabatanpdf', [JabatanController::class, 'jabatanPDF']);
Route::get('golonganpdf', [GolonganController::class, 'golonganPDF']);
Route::get('gajipdf', [PenggajihanController::class, 'gajiPDF']);

// FUNC APP
Route::post('/check_login', 'App\Http\Controllers\LoginController@checkLogin');
Route::post('/tambah_pegawai', 'App\Http\Controllers\PegawaiController@add_pegawai');
Route::post('/edit_pegawai', 'App\Http\Controllers\PegawaiController@edit_pegawai');
Route::post('/delete_pegawai', 'App\Http\Controllers\PegawaiController@delete_pegawai');
Route::post('/tambah_jabatan', 'App\Http\Controllers\JabatanController@add_jabatan');
Route::post('/edit_jabatan', 'App\Http\Controllers\JabatanController@edit_jabatan');
Route::post('/delete_jabatan', 'App\Http\Controllers\JabatanController@delete_jabatan');
Route::post('/tambah_golongan', 'App\Http\Controllers\GolonganController@add_golongan');
Route::post('/edit_golongan', 'App\Http\Controllers\GolonganController@edit_golongan');
Route::post('/delete_golongan', 'App\Http\Controllers\GolonganController@delete_golongan');
Route::post('/tambah_penggajihan', 'App\Http\Controllers\PenggajihanController@add_penggajihan');
Route::post('/edit_penggajihan', 'App\Http\Controllers\PenggajihanController@edit_penggajihan');
Route::post('/delete_penggajihan', 'App\Http\Controllers\PenggajihanController@delete_penggajihan');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');