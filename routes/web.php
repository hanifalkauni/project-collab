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
    return view('landing.landing');
});
Route::get('/landing/detail', function () {
    return view('landing.detail');
});
//crud Buku
Route::resource("buku", 'bukuController');

Route::resource('kategori', 'KategoriController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
