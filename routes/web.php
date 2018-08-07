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
});