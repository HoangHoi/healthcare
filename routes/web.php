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
//     return view('home');
// })->name('home');

// Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/trang-chu', 'HomeController@index')->name('home');
Route::get('/dat-lich-kham', 'BookingController@index')->name('booking.index');
Route::post('/dat-lich-kham', 'BookingController@store')->name('booking.store');
