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

// Route::get('/', function () {
//     return view('dashboard');
// });



Auth::routes();
Route::get('', 'HomeController@index')->name('home');
Route::get('transaksi', 'HomeController@transaksi')->name('transaksi');


Route::group(['middleware' => 'auth'], function () {

    Route::get('masakan', 'MasakanController@index')->name('masakan')->middleware('auth');
    Route::get('masakan/hapus/{id_masakan}', 'MasakanController@hapus')->name('masakanHapus');
    Route::post('masakan/tambah', 'MasakanController@tambah')->name('masakanTambah');
    Route::post('masakan/edit/{id_masakan}', 'MasakanController@edit')->name('masakanEdit');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('level', 'LevelController@index')->name('level')->middleware('auth');
    Route::get('level/hapus/{id_level}', 'LevelController@hapus')->name('levelHapus');
    Route::post('level/tambah', 'LevelController@tambah')->name('levelTambah');
    Route::post('level/edit/{id_level}', 'LevelController@edit')->name('levelEdit');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('user', 'UserController@index')->name('user')->middleware('auth');
    Route::get('user/hapus/{id}', 'UserController@hapus')->name('userHapus');
    Route::post('user/tambah', 'UserController@tambah')->name('userTambah');
    Route::post('user/edit/{id}', 'UserController@edit')->name('userEdit');
    
    // User Profile
    Route::post('user/edit2/{id}', 'UserController@editProfile')->name('userEditProfile');
    Route::get('user/{id}', 'UserController@indexProfile')->name('userProfile')->middleware('auth');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('order', 'OrderController@index')->name('order')->middleware('auth');
    Route::get('order/hapus/{id_order}', 'OrderController@hapus')->name('orderHapus');
    Route::post('order/tambah', 'OrderController@tambah')->name('orderTambah');
    Route::post('order/edit/{id_order}', 'OrderController@edit')->name('orderEdit');
    Route::post('order/selesai/{id_order}', 'OrderController@selesai')->name('orderSelesai');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('order/detail/{id_order}', 'Detail_OrderController@index')->name('detail_order')->middleware('auth');
    Route::get('order/detail/{id_order}/hapus/{id_detail_order}', 'Detail_OrderController@hapus')->name('detail_orderHapus');
    Route::post('order/detail/{id_order}/tambah', 'Detail_OrderController@tambah')->name('detail_orderTambah');
    Route::post('order/detail/{id_order}/edit/{id_detail_order}', 'Detail_OrderController@edit')->name('detail_orderEdit');
});