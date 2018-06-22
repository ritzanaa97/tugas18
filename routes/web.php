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
    // Route::resource('/pengguna','UsersController');
    Route::get('/dashboard', 'HomeController@index');
	Route::get('/pengguna','UsersController@masterusers');
	Route::get('/jenisbarang','JenisbarangController@jenisbarang');
	Route::get('/barang','BarangController@tampilbarang');
	Route::get('/barangmasuk','BarangmasukController@index');
	Route::get('/daftar', 'PengajuanbarangController@daftar');
	Route::get('/barangbelumdiserahkan', 'PengajuanbarangController@belumdiserahkan');
	Route::get('/barangsudahdiserahkan', 'PengajuanbarangController@sudahdiserahkan');
});
Route::get('/auth.login', 'HomeController@login');
Route::get('/register', 'UsersController@store')->name('register');
Route::post('/tambahuser','UsersController@store')->name('tambahuser');
Route::get('/bidang', 'UsersController@bidang');
Route::put('/pengguna/{id_users}','UsersController@update')->name('users.update');
Route::get('/hapususers/{nip}','UsersController@destroy')->name('users.hapus');

Route::post('/tambahjenis','JenisbarangController@store');
Route::put('/updatejenis/{id_jenisbarang}','JenisbarangController@update')->name('jenisbarang.update');

Route::post('/barang','BarangController@store');

Route::get('/detailbarangmasuk/{id}','BarangmasukController@detailtransaksi');
Route::get('/tambahbarangmasuk','BarangmasukController@barangmasuk');
Route::post('/tambahbarangmasuk','BarangmasukController@store');

Route::post('/pengajuanbarang', 'PengajuanbarangController@ajukan');
Route::get('/ajukan', 'PengajuanbarangController@index');
Route::get('/riwayat', 'PengajuanbarangController@riwayat');
Route::get('/lihatdetail/{id}','PengajuanbarangController@detailpengajuanbarang');

Route::get('/serahbarang/{id}','SerahbarangController@index');
Route::post('/simpanserah','SerahbarangController@store');

