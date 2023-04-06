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

Route::get('/', 'LoginController@index')->middleware('guest')->name('login');
Route::post('/dologin', 'LoginController@authenticate');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::get('/dashboard', 'LoginController@dashboard')->name('dashboard');
Route::get('/data-pegawai', 'DataPegawaiController@index')->name('data-pegawai');

Route::get('/indikator', 'IndikatorController@index')->name('indikator.index');
Route::get('/indikator-create', 'IndikatorController@create')->name('indikator.create');
Route::get('/indikator-destroy', 'IndikatorController@destroy')->name('indikator.destroy');
Route::get('/indikator-edit', 'IndikatorController@edit')->name('indikator.edit');
Route::post('/indikator-update', 'IndikatorController@update')->name('indikator.update');

Route::get('/target', 'TargetController@index')->name('target');
Route::get('/target-create', 'TargetController@create')->name('target.create');
Route::get('/target-destroy', 'TargetController@destroy')->name('target.destroy');
Route::get('/target-edit', 'TargetController@edit')->name('target.edit');
Route::post('/target-update', 'TargetController@update')->name('target.update');

// Route::get('/kegiatan', 'KegiatanController@index')->name('kegiatan');
// Route::get('/kegiatan-create', 'KegiatanController@store')->name('kegiatan.create');
// Route::get('/kegiatan-edit', 'KegiatanController@edit')->name('kegiatan.edit');
// Route::post('/kegiatan-update', 'KegiatanController@update')->name('kegiatan.update');
// Route::put('/kegiatan-update/{kegiatan}', 'KegiatanController@update')->name('kegiatan.update');

Route::resource('kegiatan','KegiatanController');



Route::get('/hasil', 'HasilController@index')->name('hasil');
Route::post('/periode', 'LoginController@periode')->name('periode');
