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

Route::get('/administrator', "HomeController@index")->middleware('auth:administrator');

Route::get('/manajemen', "HomeController@index")->middleware('auth:manajemen');

Route::get('/peminjam', "HomeController@index")->middleware('auth:peminjam');

Route::get('/', function () {
    return view("auth.login");
})->middleware('guest');

Route::get('/login', [ 'as' => 'login',
            'uses' => 'LoginController@index']
            )->middleware('guest');

Route::post('/proses_login', 'LoginController@masuk');
Route::get('/proses_logout', 'LoginController@keluar');

Route::get('/pagenotfound', [ 'as' => 'notfound',
    'uses' => 'HomeController@pageNotFound']);

Route::get('/registrasi', 'RegistrasiController@index')->middleware('guest');
Route::post('/proses_registrasi', 'RegistrasiController@registrasi');
