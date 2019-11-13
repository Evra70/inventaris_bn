<?php

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

Route::get('/administrator', function () {
    return view("administrator.administrator");
})->middleware('auth:administrator');

Route::get('/manajemen', function () {
    return view("manajemen.manajemen");
})->middleware('auth:manajemen');

Route::get('/peminjam', function () {
    return view("peminjam.peminjam");
})->middleware('auth:peminjam');

Route::get('/', function () {
    return view("auth.login");
})->middleware('guest');

Route::get('/login', [ 'as' => 'login',
            'uses' => 'LoginController@index']
            )->middleware('guest');

Route::post('/proses_login', 'LoginController@masuk');
Route::get('/proses_logout', 'LoginController@keluar');

Route::get('/registrasi', 'RegistrasiController@index')->middleware('guest');
