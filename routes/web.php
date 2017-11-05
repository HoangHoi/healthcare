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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('dang-nhap', 'SessionController@getLogin')->name('admin.login');
    Route::post('dang-nhap', 'SessionController@postLogin');
    Route::get('dang-xuat', 'SessionController@logout')->name('admin.logout');

    Route::group(['prefix' => 'bac-sy'], function () {
        Route::get('/', 'DoctorController@index')->name('admin.doctors.index');
    });

    Route::group(['prefix' => 'benh-vien'], function () {
        Route::get('/', 'HospitalController@index')->name('admin.hospitals.index');
    });

    Route::group(['prefix' => 'chuyen-khoa'], function () {
        Route::get('/', 'SpecialistController@index')->name('admin.specialists.index');
    });
});

