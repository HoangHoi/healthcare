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
Route::get('lien-he', 'HomeController@contact')->name('contact');
Route::get('cam-nang', 'PostController@index')->name('post.index');
// Route::get('/trang-chu', 'HomeController@index')->name('home');
Route::get('/dat-lich-kham', 'BookingController@index')->name('booking.index');
Route::post('/dat-lich-kham', 'BookingController@store')->name('booking.store');
Route::get('benh-vien', 'HospitalController@index')->name('hospital.index');
Route::get('benh-vien/{hospital}-{hospitalName}', 'HospitalController@show')->name('hospital.show');
Route::get('chuyen-khoa', 'SpecialistController@index')->name('specialist.index');
Route::get('chuyen-khoa/{specialist}-{specialistName}', 'SpecialistController@show')->name('specialist.show');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'SessionController@index')->name('admin.index');
    Route::get('login', 'SessionController@getLogin')->name('admin.login');
    Route::post('login', 'SessionController@postLogin');
    Route::get('logout', 'SessionController@logout')->name('admin.logout');

    Route::group(['prefix' => 'doctors'], function () {
        Route::get('/', 'DoctorController@index')->name('admin.doctors.index');
        Route::post('create', 'DoctorController@create')->name('admin.doctors.create');
        Route::group(['prefix' => '{doctor}'], function () {
            Route::post('delete', 'DoctorController@delete')->name('admin.doctors.delete');
            Route::post('update', 'DoctorController@update')->name('admin.doctors.update');
            Route::get('update', 'DoctorController@getUpdate')->name('admin.doctors.getUpdate');
            Route::group(['prefix' => 'times'], function () {
                Route::post('create', 'DoctorTimeController@create')->name('admin.doctors.time.create');
                Route::post('{time}/delete', 'DoctorTimeController@delete')->name('admin.doctors.time.delete');
            });
        });
    });

    Route::group(['prefix' => 'hospitals'], function () {
        Route::get('/', 'HospitalController@index')->name('admin.hospitals.index');
        Route::post('create', 'HospitalController@create')->name('admin.hospitals.create');
        Route::group(['prefix' => '{hospital}'], function () {
            Route::post('delete', 'HospitalController@delete')->name('admin.hospitals.delete');
            Route::get('update', 'HospitalController@getUpdate')->name('admin.hospitals.getUpdate');
            Route::post('update', 'HospitalController@update')->name('admin.hospitals.update');
        });
    });

    Route::group(['prefix' => 'specialists'], function () {
        Route::get('/', 'SpecialistController@index')->name('admin.specialists.index');
        Route::post('create', 'SpecialistController@create')->name('admin.specialists.create');
        Route::group(['prefix' => '{specialist}'], function () {
            Route::post('delete', 'SpecialistController@delete')->name('admin.specialists.delete');
            Route::get('update', 'SpecialistController@getUpdate')->name('admin.specialists.getUpdate');
            Route::post('update', 'SpecialistController@update')->name('admin.specialists.update');
        });
    });
});

