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

// Route::get('/data-pegawai', 'DataPegawaiController@index')->name('data-pegawai');

Route::resource('datapegawai', 'DataPegawaiController');
Route::resource('indikator', 'IndikatorController');
Route::resource('target', 'TargetController');
Route::resource('kegiatan','KegiatanController');

// Route::resource('kualitas','KualitasController');
Route::get('kualitas/{nama}','KualitasController@index')->name('kualitas.index');
Route::post('kualitas-store','KualitasController@store')->name('kualitas.store');
Route::delete('kualitas-destroy/{id_kualitas}', 'KualitasController@destroy')->name('kualitas.destroy');
Route::get('kualitas-edit/{id_kualitas}', 'KualitasController@edit')->name('kualitas.edit');
Route::put('kualitas-update/{id_kualitas}', 'KualitasController@update')->name('kualitas.update');

Route::get('perilakuhasil/{id_perilaku}', 'ValidasiController@perilakuedit')->name('perilakuhasil');
//validasi Pegawai
Route::get('validasi','ValidasiController@index')->name('validasi');
Route::get('validasi-hasil/{nama}','ValidasiController@hasil')->name('validasihasil');
//validasi Kegiatan
Route::get('validasi-target','ValidasiKegiatanController@index')->name('validasitarget');

Route::get('validasi-kegiatan','ValidasiKegiatanController@index')->name('validasikegiatan');
Route::get('validasi-kegiatan/{nama}','ValidasiKegiatanController@kegiatan')->name('datakegiatan');
Route::put('validasi-kegiatan-Update/{IdCatKegiatan}', 'ValidasiKegiatanController@update')->name('updateverif');
Route::put('validasi-Update/{nama}', 'ValidasiKegiatanController@verifall')->name('updateverifall');

Route::get('validasi-kegiatan/{IdCatKegiatan}', 'ValidasiController@kegiatan')->name('kegiatanget');

// Route::get('/indikator', 'IndikatorController@index')->name('indikator.index');
// Route::post('/indikator-store', 'IndikatorController@store')->name('indikator.store');
// Route::get('/indikator-destroy', 'IndikatorController@destroy')->name('indikator.destroy');
// Route::get('/indikator-edit', 'IndikatorController@edit')->name('indikator.edit');
// Route::post('/indikator-update', 'IndikatorController@update')->name('indikator.update');

// Route::get('/target', 'TargetController@index')->name('target');
// Route::get('/target-create', 'TargetController@create')->name('target.create');
// Route::get('/target-destroy', 'TargetController@destroy')->name('target.destroy');
// Route::get('/target-edit', 'TargetController@edit')->name('target.edit');
// Route::put('/target-update', 'TargetController@update')->name('target.update');
// Route::post('/target-store', 'TargetController@store')->name('target.store');

// Route::get('/kegiatan', 'KegiatanController@index')->name('kegiatan');
// Route::get('/kegiatan-create', 'KegiatanController@store')->name('kegiatan.create');
// Route::get('/kegiatan-edit', 'KegiatanController@edit')->name('kegiatan.edit');
// Route::post('/kegiatan-update', 'KegiatanController@update')->name('kegiatan.update');
// Route::put('/kegiatan-update/{kegiatan}', 'KegiatanController@update')->name('kegiatan.update');


Route::get('kode','KualitasController@getakun')->name('kualitas.kode');




Route::get('/hasil', 'HasilController@index')->name('hasil');
Route::get('/print-hasil', 'HasilController@printPDF')->name('print');
Route::post('/periode', 'LoginController@periode')->name('periode');

Route::get('/hasil-pdf', 'HasilController@pdf')->name('hasil-pdf');
