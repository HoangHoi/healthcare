<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/bac-sy', 'DoctorController@search')->name('doctor.search');
Route::get('/benh-vien', 'HospitalController@search')->name('hospital.search');
Route::get('/chuyen-khoa', 'SpecialistController@search')->name('specialist.search');
