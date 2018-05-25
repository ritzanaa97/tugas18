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

Route::get('/', function () {
    //return view('/auth.login');
    return view('admin/dashboard');
});
Auth::routes();

// Route::get('/auth.login', 'HomeController@login');
Route::get('/register', 'UsersController@register')->name('register');
Route::post('/register', 'UsersController@tambahuser')->name('register');
Route::get('/pengguna', 'UsersController@pengguna');
Route::get('/pengguna','UsersController@masterusers');
Route::get('/bidang', 'UsersController@bidang');
Route::put('/pengguna/{id_users}','UsersController@update')->name('users.update');


Route::get('/dashboard', 'HomeController@index');
Route::get('/barang', 'HomeController@barang');
Route::get('/barangkeluar', 'HomeController@barangkeluar');
Route::get('/pengajuanbarang', 'HomeController@barangkeluar');


Route::get('/jenisbarang','JenisbarangController@jenisbarang');
Route::post('/jenisbarang','JenisbarangController@store');
Route::put('/jenisbarang/{id_jenisbarang}','JenisbarangController@update')->name('jenisbarang.update');


Route::get('/barang','BarangController@tampilbarang');
Route::post('/barang','BarangController@store');

Route::get('/barangmasuk','BarangmasukController@barangmasuk')->name('barangmasuk');
Route::post('/barangmasuk','BarangController@store');

Route::get('/barangkeluar','BarangkeluarController@barang_keluar');