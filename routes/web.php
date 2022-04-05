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
    return view('admin.index');
})->name('admin');

Route::post('logout',function(){
	\Auth::logout();
	return view('admin.index');
})->name('logout');



Route::prefix('qr')->group(function(){
    Route::get('qrcode', 'QrController@generateQrCode');
	Route::get('/','QrController@index')->name('qr.index');
	Route::get('create','QrController@create')->name('qr.create');
	Route::post('store','QrController@store')->name('qr.store');
});

Route::prefix('user')->group(function(){
	Route::get('/','UsersController@index')->name('user.index');
});
