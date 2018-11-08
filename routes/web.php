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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::namespace('Admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::resource('Event', 'EventController')->only([
                'create', 'store', 'index'
            ]);
            Route::get('Event/{event}', 'EventController@show');
            Route::get('Event/edit/{event}', 'EventController@edit');
            Route::patch('Event/{event}', 'EventController@update');
            Route::delete('Event/{event}', 'EventController@destroy');

        });
    });
});

Route::resource('Event', 'EventController')->only([
    'index'
]);

Route::get('/Event/{event}', 'EventController@show');



Route::group(['middleware' => ['auth']], function () {
    Route::resource('Bookings', 'BookingController')->only([
        'index','show','store'
    ]);

});

