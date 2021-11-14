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

//CRUD LandingPage
Route::get('/','LandingController@index')->name('frontpage');
Route::get('/detail/{id}','LandingController@detail')->name('detail');
Route::post('/detail/{buku}/addkomentar/{id}','LandingController@addKomentar')->name('addKomentar');
Route::get('/detail/{buku}/deletekomentar/{id}','LandingController@deleteKomentar')->name('deleteKomentar');

//crud Buku
Route::resource("buku", 'bukuController');

//CRUD Kategori
Route::resource('kategori', 'KategoriController');

//CRUD Detail Buku
Route::get('/buku/{id}/detail','DetailBukuController@index');
Route::post('/buku/{id}/detail/createorupdate','DetailBukuController@createOrUpdate');


Route::get('/home', 'HomeController@index')->name('home');

