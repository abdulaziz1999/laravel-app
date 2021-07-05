<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/tes', function () {
    return view('about');
});

// ROUTE
Route::resource('/','App\Http\Controllers\HomeController');
// Route::resource('/','App\Http\Controllers\HomeController');
Route::resource('/login','App\Http\Controllers\LoginController');
Route::resource('/home','App\Http\Controllers\HomeController');
Route::resource('/pegawai','App\Http\Controllers\PegawaiController');
Route::get('/tambah_pegawai','App\Http\Controllers\PegawaiController@add_page');
Route::get('/edit_pegawai/{id_pegawai}','App\Http\Controllers\PegawaiController@edit_page');
Route::resource('/about','App\Http\Controllers\HomeController',['about']);


// FUNC APP
Route::post('/check_login', 'App\Http\Controllers\LoginController@checkLogin');
Route::post('/tambah_pegawai', 'App\Http\Controllers\PegawaiController@add_pegawai');
Route::post('/edit_pegawai', 'App\Http\Controllers\PegawaiController@edit_pegawai');
Route::post('/delete_pegawai', 'App\Http\Controllers\PegawaiController@delete_pegawai');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');