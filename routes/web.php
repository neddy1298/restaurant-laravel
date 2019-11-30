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


Route::group(['middleware' => 'auth'], function () {

    Route::get('masakan', 'MasakanController@index')->name('masakan')->middleware('auth');
    Route::get('masakan/hapus/{id_masakan}','MasakanController@hapus')->name('masakanHapus');
    Route::post('masakan/tambah', 'MasakanController@tambah')->name('masakanTambah');
    Route::post('masakan/edit/{id_masakan}','MasakanController@edit')->name('masakanEdit');
    
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('level', 'LevelController@index')->name('level')->middleware('auth');
    Route::get('level/hapus/{id_level}','LevelController@hapus')->name('levelHapus');
    Route::post('level/tambah', 'LevelController@tambah')->name('levelTambah');
    Route::post('level/edit/{id_level}','LevelController@edit')->name('levelEdit');
    
});