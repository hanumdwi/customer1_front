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

Route::get('/', function () {
    return view('home');
});

Route::get('about', 'AboutController@index');
Route::get('contact', 'AboutController@index_contact');
Route::get('shopbus', 'BusController@show');
Route::get('detailbus', 'BusController@index');
Route::get('detailpaket', 'BusController@index_paket');

//Customer
Route::get('datacustomer','CustomerController@index');
Route::get('createcustomer','CustomerController@create');
Route::post('customerstore', 'CustomerController@store');
Route::get('customeredit/{id}', 'CustomerController@edit');
Route::post('customerupdate', 'CustomerController@update');
Route::get('customerdestroy/{id}', 'CustomerController@destroy');
//================================================================================

Route::get('cartawal/{id}', 'CartController@indexawal');
Route::get('cartawal', 'CartController@indexawal');
Route::post('sewa_busstore', 'CartController@store');
Route::get('cart', 'CartController@indexcart');
Route::get('cart/{id}', 'CartController@index')->name('cart_index');

Route::get('pemesanan', 'PemesananController@indexawal');
Route::get('pemesanan_paket', 'PemesananController@indexawal_paket');
Route::post('pemesanan_store', 'PemesananController@store');
Route::post('pemesanan_paket_store', 'PemesananController@store_paket');
Route::get('pemesanan_berhasil/{id}', 'PemesananController@berhasil');
Route::get('tujuan','PemesananController@getTujuan');



Route::get('panduan_pembayaran', 'PanduanPembayaranController@index');
Route::get('konfirmasi_pembayaran', 'PanduanPembayaranController@show_pembayaran');
Route::get('konfirmasi_pembayaran_paket', 'PanduanPembayaranController@show_pembayaran_paket');

//===================================================================================
//====================================================================================

//====================================================================
