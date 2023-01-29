<?php

use App\Http\Controllers\KecamatanController;
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

Route::get('/beranda', 'HomeController@beranda')->name('beranda');
Route::get('/galeri', 'HomeController@galeri')->name('galeri');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('kecamatan', 'KecamatanController');
Route::get('/kecamatan/{id}/detail', 'KecamatanController@detail')->name('detailkec');

Route::resource('desa', 'DesaController');
Route::get('/desa/{id}/detail', 'DesaController@detail')->name('detaildes');

Route::resource('lahan', 'LahanController');

Route::resource('user', 'UserController');

Route::get('/wilayah', 'KecamatanController@will')->name('wilayah');

Route::resource('jenismangrove', 'JenisMangroveController');

Route::resource('mangrove', 'MangroveController');
Route::get('/mangrove/filter', 'MangroveController@filter');

Route::resource('penanaman', 'PenanamanController');

Route::resource('bibit', 'BibitMangroveController');
Route::get('/bibit/{id}/detail', 'BibitMangroveController@detail')->name('monevb');

Route::resource('bibitmonev', 'BibitMangroveMonevController');

Route::resource('monitoring', 'MonitoringMangroveController');
Route::get('/monitoringlist', 'PenanamanController@monitoringlist')->name('monitoringlist');
Route::get('/penanaman/{id}/detail', 'PenanamanController@detail')->name('monitoringdetail');

// Route::get('/monitoringdetail', function () {
//     return view('monitoring/monitoringdetail');
// })->middleware(['auth'])->name('monitoringdetail');

Route::get('/detailtanaman', function () {
    return view('penanaman/detailtanaman');
})->middleware(['auth'])->name('detailtanaman');

require __DIR__ . '/auth.php';
