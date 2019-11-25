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

Route::get('/','LoginController@index')->middleware('guest');

Route::get('/login', [ 'as' => 'login',
            'uses' => 'LoginController@index']
            )->middleware('guest');

// user
Route::get('/menu/userList','UserController@getUserList')->middleware('auth:administrator');
Route::get('/menu/addUserForm','UserController@addUserForm')->middleware('auth:administrator');
Route::get('/menu/editUserForm/{user_id}','UserController@editUserForm')->middleware('auth:administrator');
Route::post('/search/userList','UserController@getUserListSearch')->middleware('auth:administrator');
Route::post('/proses/addUserProcess','UserController@addUserProcess')->middleware('auth:administrator');
Route::post('/proses/editUserProcess','UserController@editUserProcess')->middleware('auth:administrator');
Route::get('/user/{user_id}/delete','UserController@deleteUser')->middleware('auth:administrator');

// suplier
Route::get('/menu/suplierList','SuplierController@getSuplierList')->middleware('auth:administrator');
Route::get('/menu/addSuplierForm','SuplierController@addSuplierForm')->middleware('auth:administrator');
Route::get('/menu/editSuplierForm/{suplier_id}','SuplierController@editSuplierForm')->middleware('auth:administrator');
Route::post('/search/suplierList','SuplierController@getSuplierListSearch')->middleware('auth:administrator');
Route::post('/proses/addSuplierProcess','SuplierController@addSuplierProcess')->middleware('auth:administrator');
Route::post('/proses/editSuplierProcess','SuplierController@editSuplierProcess')->middleware('auth:administrator');
Route::get('/suplier/{suplier_id}/delete','SuplierController@deleteSuplier')->middleware('auth:administrator');

// barang
Route::get('/menu/barangList','BarangController@getBarangList')->middleware('auth:administrator');
Route::get('/menu/addBarangForm','BarangController@addBarangForm')->middleware('auth:administrator');
Route::get('/menu/editBarangForm/{barang_id}','BarangController@editBarangForm')->middleware('auth:administrator');
Route::post('/search/barangList','BarangController@getBarangListSearch')->middleware('auth:administrator');
Route::post('/proses/addBarangProcess','BarangController@addBarangProcess')->middleware('auth:administrator');
Route::post('/proses/editBarangProcess','BarangController@editBarangProcess')->middleware('auth:administrator');
Route::get('/barang/{barang_id}/delete','BarangController@deleteBarang')->middleware('auth:administrator');

// barang masuk
Route::get('/menu/barangMasukList','BarangMasukController@getBarangMasukList')->middleware('auth:administrator');
Route::get('/menu/addBarangMasukForm','BarangMasukController@addBarangMasukForm')->middleware('auth:administrator');
Route::get('/menu/editBarangMasukForm/{barang_masuk_id}','BarangMasukController@editBarangMasukForm')->middleware('auth:administrator');
Route::post('/search/barangMasukList','BarangMasukController@getBarangMasukListSearch')->middleware('auth:administrator');
Route::post('/proses/addBarangMasukProcess','BarangMasukController@addBarangMasukProcess')->middleware('auth:administrator');
Route::post('/proses/editBarangMasukProcess','BarangMasukController@editBarangMasukProcess')->middleware('auth:administrator');
Route::get('/barangMasuk/{barang_masuk_id}/delete','BarangMasukController@deleteBarangMasuk')->middleware('auth:administrator');

// barang keluar
Route::get('/menu/barangKeluarList','BarangKeluarController@getBarangKeluarList')->middleware('auth:administrator');
Route::get('/menu/addBarangKeluarForm','BarangKeluarController@addBarangKeluarForm')->middleware('auth:administrator');
//Route::get('/menu/editBarangMasukForm/{barang_masuk_id}','BarangMasukController@editBarangMasukForm')->middleware('auth:administrator');
//Route::post('/search/barangMasukList','BarangMasukController@getBarangMasukListSearch')->middleware('auth:administrator');
Route::post('/proses/addBarangKeluarProcess','BarangKeluarController@addBarangKeluarProcess')->middleware('auth:administrator');
//Route::post('/proses/editBarangMasukProcess','BarangMasukController@editBarangMasukProcess')->middleware('auth:administrator');
//Route::get('/barangMasuk/{barang_masuk_id}/delete','BarangMasukController@deleteBarangMasuk')->middleware('auth:administrator');

Route::post('/proses_login', 'LoginController@masuk');
Route::get('/proses_logout', 'LoginController@keluar');

Route::get('/pagenotfound', [ 'as' => 'notfound',
    'uses' => 'HomeController@pageNotFound']);

Route::get('/registrasi', 'RegistrasiController@index')->middleware('guest');
Route::post('/proses_registrasi', 'RegistrasiController@registrasi');
