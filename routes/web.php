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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('kecamatan', 'KecamatanController');

Route::resource('desa', 'DesaController');

Route::resource('lahan', 'LahanController');

Route::resource('user', 'UserController');

Route::get('/wilayah', function () {
    return view('wilayah/wilayah');
})->middleware(['auth'])->name('wilayah');

Route::resource('jenismangrove', 'JenisMangroveController');

Route::resource('mangrove', 'MangroveController');

Route::resource('penanaman', 'PenanamanController');

Route::resource('bibit', 'BibitMangroveController');
Route::get('/bibit/{id}/detail', 'BibitMangroveController@detail')->name('monev');

Route::get('/monitoring', function () {
    return view('monitoring/monitoring');
})->middleware(['auth'])->name('monitoring');

Route::get('/monitoringdetail', function () {
    return view('monitoring/monitoringdetail');
})->middleware(['auth'])->name('monitoringdetail');

Route::get('/detailtanaman', function () {
    return view('penanaman/detailtanaman');
})->middleware(['auth'])->name('detailtanaman');

require __DIR__ . '/auth.php';
