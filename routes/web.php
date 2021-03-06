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
Route::get('/', function () {
        return view('auth/login');
    });
/*jadi ais, route middleware auth ini kan fadli bikin jadi group biar bisa masuk beberapa route
fungsi nya disini adalah biar kalah mau akses ke halaman yang di masukin ke group fungsi middleware itu
'hanya' yg login aja, nanti selain itu kalau belum login tapi dia mau akses yang ada di group auth ini bakal
ke redirect ke halaman login.
jadi halaman2 admin ais yang perlu login, masukin ke group auth ini ya*/
Route::middleware('auth')->group(function (){
    Route::get('/dashboard', function () {
        return view('dashboard/dashboard');
    });
    // Route::resource('/pengguna','UsersController');
});
Route::get('/dashboard', 'HomeController@index');
Route::get('/pengguna','UsersController@masterusers');
Route::get('/jenisbarang','JenisbarangController@jenisbarang');
Route::get('/barang','BarangController@tampilbarang');
Route::get('/barangmasuk','BarangmasukController@index');
Route::get('/daftar', 'PengajuanbarangController@daftar');
Route::get('/terimabarang', 'BarangmasukController@terimabarang');
Route::get('/barangkeluar', 'BarangkeluarController@index');
Route::get('/baranghabis', 'BaranghabisController@index');
Route::get('/panduan_admin', 'HomeController@panduanadmin');

Route::get('/register', 'UsersController@store')->name('register');
Route::post('/tambahuser','UsersController@store')->name('tambahuser');
Route::get('/bidang', 'UsersController@bidang');
Route::put('/pengguna/{id_users}','UsersController@update')->name('users.update');
Route::get('/hapususers/{nip}','UsersController@destroy')->name('users.hapus');
Route::get('/resetpassword/{nip}','UsersController@resetpassword');
Route::get('/ubahpassword', 'UsersController@tampilubah');
Route::post('/simpan_ubah', 'UsersController@ubahpassword');

Route::get('/supplier', 'SupplierController@index');
Route::post('/tambahsupplier', 'SupplierController@store');
Route::get('/hapussupplier/{id_supplier}','SupplierController@destroy')->name('supplier.hapus');
Route::put('/supplier/{id_supplier}','SupplierController@update')->name('supplier.update');

Route::post('/tambahjenis','JenisbarangController@store');
Route::get('/export_jenisbarang', 'JenisbarangController@jenisbarangexport')->name('jenisbarang.export');
Route::post('/import_jenisbarang', 'JenisbarangController@jenisbarangimport');

Route::post('/barang','BarangController@store');
Route::get('/export_barang', 'BarangController@barangexport')->name('barang.export');
Route::post('/import_barang', 'BarangController@barangimport');
Route::put('/barang/{id_barang}','BarangController@update')->name('barang.update');
Route::get('/print_barang','BarangController@print');

Route::get('/detailbarangmasuk/{id}','BarangmasukController@detailtransaksi');
Route::get('/tambahbarangmasuk','BarangmasukController@barangmasuk');
Route::post('/tambahbarangmasuk','BarangmasukController@store');
Route::post('/export_barangmasuk', 'BarangmasukController@barangmasukexport')->name('barangmasuk.export');
Route::post('/export_terimabarang', 'BarangmasukController@terimabarangexport')->name('terimabarang.export');

Route::get('/detailbarangkeluar/{id}','BarangkeluarController@detailbarangkeluar');
Route::post('/export_barangkeluar', 'BarangkeluarController@barangkeluarexport')->name('barangkeluar.export');

Route::post('/pengajuanbarang', 'PengajuanbarangController@store');
Route::get('/ajukan', 'PengajuanbarangController@index');
Route::get('/riwayat', 'PengajuanbarangController@riwayat');
Route::get('/lihatdetail/{id}','PengajuanbarangController@detailpengajuanbarang');

Route::get('/serahbarang/{id}','PengajuanbarangController@serahbarang');
Route::post('/simpanserah','PengajuanbarangController@update')->name('serahbarang.update');

Route::get('/satuan', 'SatuanController@index');
Route::post('/tambahsatuan','SatuanController@store')->name('tambahsatuan');
Route::put('/ubah_satuan/{id_satuan}','SatuanController@update')->name('satuan.update');