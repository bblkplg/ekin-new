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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'DataPegawaiController@index');

Route::get('/', 'LoginController@index')->middleware('guest');
Route::post('/dologin', 'LoginController@authenticate');

Route::get('/dashboard', 'LoginController@dashboard')->name('dashboard');
Route::get('/data-pegawai', 'DataPegawaiController@index')->name('data-pegawai');

Route::get('/indikator', 'IndikatorController@index')->name('indikator.index');

Route::get('/target', 'TargetController@index')->name('target');
Route::get('/target-create', 'TargetController@create')->name('target.create');
Route::get('/target-destroy', 'TargetController@destroy')->name('target.destroy');
Route::get('/target-edit', 'TargetController@edit')->name('target.edit');
Route::post('/target-update', 'TargetController@update')->name('target.update');

Route::get('/kegiatan', 'KegiatanController@index')->name('kegiatan');
Route::get('/hasil', 'HasilController@index')->name('hasil');