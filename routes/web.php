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

// Auth route
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/data_santri', 'SantriController@index')->name('santri.index');
    Route::patch('/data_santri/{id_wali_santri}', 'SantriController@update')->name('santri.update');
    
    Route::get('/data_wali', 'WaliController@index')->name('wali.index');
    Route::patch('/data_wali/{id}', 'WaliController@update')->name('wali.update');
    // Route::patch('/data_santri/{id_wali_santri}', 'SantriController@update_kk')->name('santri.PhotoKK');
   
    Route::get('/data_file', 'SantriController@indexFile')->name('file.index');
    Route::patch('/data_file/{id_wali_santri}', 'SantriController@update_photo')->name('file.updatePhoto');
    Route::get('/data_file/cetak_pdf', 'SantriController@cetak_pdf');
});

Route::get('/daftar/create-step1', 'RegisterController@createStep1')->name('step1');
Route::post('/daftar/create-step1', 'RegisterController@postCreateStep1');

Route::get('/daftar/create-step2', 'RegisterController@createStep2');
Route::get('/daftar/create-step2/getregencies', 'RegisterController@findRegencies')->name('getregencies');
Route::get('/daftar/create-step2/getdistricts', 'RegisterController@findDistricts')->name('getdistricts');
Route::get('/daftar/create-step2/getvillages', 'RegisterController@findVillages')->name('getvillages');
Route::post('/daftar/create-step2', 'RegisterController@postCreateStep2');

Route::get('/daftar/create-step3', 'RegisterController@createStep3');
Route::post('/daftar/create-step3', 'RegisterController@postCreateStep3');

Route::get('/daftar/create-step4', 'RegisterController@createStep4');
Route::post('/daftar/store', 'RegisterController@store');

Route::get('/daftar/create-file', 'RegisterController@createFile');
Route::post('/daftar/create-file', 'RegisterController@postCreateFile');
Route::post('/daftar/remove-foto', 'RegisterController@removeFoto');
Route::post('/daftar/remove-fotokk', 'RegisterController@removeFotoKK');

