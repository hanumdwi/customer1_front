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
Route::get('shopbus', 'BusController@show');
Route::get('detailbus', 'BusController@index');
Route::get('detailpaket', 'PaketWisataController@index');

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
Route::post('sewa_bus_category_store', 'PemesananController@store');
Route::get('pemesanan_berhasil/{id}', 'PemesananController@berhasil');


//===================================================================================
//====================================================================================

//====================================================================
