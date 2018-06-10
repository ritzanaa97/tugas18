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


Auth::routes();
/*jadi ais, route middleware auth ini kan fadli bikin jadi group biar bisa masuk beberapa route
fungsi nya disini adalah biar kalah mau akses ke halaman yang di masukin ke group fungsi middleware itu
'hanya' yg login aja, nanti selain itu kalau belum login tapi dia mau akses yang ada di group auth ini bakal
ke redirect ke halaman login.
jadi halaman2 admin ais yang perlu login, masukin ke group auth ini ya*/
Route::middleware('auth')->group(function (){
    Route::get('/', function () {
        return view('dashboard/dashboard');
    });
    /*Route::get('/dashboard', 'HomeController@index');*/
    Route::get('/pengguna',function(){
    	return view('user/pengguna');
    });
    Route::get('/jenisbarang',function(){
    	return view('jenisbarang/jenisbarang');
    });
    Route::get('/barang',function(){
    	return view('barang/barang');
    });
    Route::get('/barangmasuk',function(){
    	return view('barangmasuk/barangmasuk');
    });
    Route::get('/barangkeluar',function(){
    	return view('barangkeluar/barangkeluar');
    });
    Route::get('/pengajuanbarang',function(){
    	return view('pengajuanbarang/pengajuanbarang');
    });
    Route::get('/riwayat',function(){
    	return view('pengajuanbarang/riwayat');
    });
});

// Route::get('/auth.login', 'HomeController@login');
Route::get('/register', 'UsersController@register')->name('register');
Route::post('/register', 'UsersController@store')->name('register');
Route::get('/pengguna','UsersController@masterusers');
Route::get('/bidang', 'UsersController@bidang');
Route::put('/pengguna/{id_users}','UsersController@update')->name('users.update');
Route::get('/hapususers/{nip}','UsersController@destroy')->name('users.hapus');

Route::get('/jenisbarang','JenisbarangController@jenisbarang');
Route::post('/jenisbarang','JenisbarangController@store');
Route::put('/jenisbarang/{id_jenisbarang}','JenisbarangController@update')->name('jenisbarang.update');

Route::get('/barang','BarangController@tampilbarang');
Route::post('/barang','BarangController@store');

Route::get('/barangmasuk','BarangmasukController@index');
Route::get('/detailbarangmasuk/{id}','BarangmasukController@detailtransaksi');
Route::get('/tambahbarangmasuk','BarangmasukController@barangmasuk');
Route::post('/tambahbarangmasuk','BarangmasukController@store');

Route::get('/barangkeluar','BarangkeluarController@index');
Route::get('detailbarangkeluar','BarangkeluarController@detailbk');
Route::get('/tambahbarangkeluar','BarangkeluarController@barangkeluar');
Route::post('/tambahbarangkeluar','BarangkeluarController@store');

Route::get('/pengajuanbarang', 'PengajuanbarangController@index');
Route::get('/riwayat', 'PengajuanbarangController@riwayat');