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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', function() { return view('home'); })->name('home')->middleware('auth');
Route::resource('region', 'RegionController')->middleware('auth');
Route::resource('user', 'UserController')->middleware('auth');
Route::resource('role', 'RoleController')->middleware('auth');
Route::resource('crd', 'CrdController')->middleware('auth');
Route::resource('erb', 'ErbController')->middleware('auth');
Route::resource('counter', 'CounterController')->middleware('auth');
Route::resource('qr', 'QrController')->middleware('auth');
Route::resource('nfc', 'NfcController')->middleware('auth');
Route::resource('historialcounter', 'HistorialCounterController')->middleware('auth');
Route::resource('historialcrd', 'HistorialCrdController')->middleware('auth');
Route::resource('historialerb', 'HistorialErbController')->middleware('auth');
Route::resource('historialqr', 'HistorialQrController')->middleware('auth');
Route::resource('historialnfc', 'HistorialNfcController')->middleware('auth');
