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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', 'Auth\LoginController@login')->middleware('cekuser');
Route::group(['middleware' => ['web', 'cekuser:1']],
function(){
	Route::get('kategori/data','KategoriController@listdata')->name('kategori.data');
	Route::resource('kategori','KategoriController');
	Route::get('produk/data','ProdukController@listdata')->name('produk.data');
	Route::post('produk/hapus', 'ProdukController@deleteSelected');
	Route::post('produk/cetak', 'ProdukController@printbarcode');
	Route::resource('produk','ProdukController');
	Route::get('supplier/data','SupplierController@listdata')->name('supplier.data');
	Route::resource('supplier','SupplierController');
	Route::get('member/data','MemberController@listdata')->name('member.data');
	Route::post('member/cetak', 'MemberController@printCard');
	Route::resource('member','MemberController');
	Route::get('pengeluaran/data','PengeluaranController@listdata')->name('pengeluaran.data');
	Route::resource('pengeluaran','PengeluaranController');
	Route::get('user/data','UserController@listdata')->name('user.data');
	Route::resource('user','UserController');
	
});