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
Route::get('/', 'VisitorController@searchevent');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/ceklogin', 'AuthController@ceklogin');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'PageController@home');
    Route::get('/event', 'PageController@event');
    Route::get('/users', 'PageController@users');
    Route::get('/event/add-form', 'PageController@eventaddform');
    Route::post('/event/save', 'PageController@eventsave');
    Route::get('/event/editform/{id}', 'PageController@eventeditform');
    Route::put('/event/update/{id}', 'PageController@eventupdate');
    Route::get('/event/delete/{id}', 'PageController@eventdelete');
    Route::get('/users/add-form', 'PageController@usersaddform');
    Route::post('/users/save', 'PageController@userssave');
    Route::get('/users/delete/{id}', 'PageController@usersdelete');
    Route::get('/logout', 'AuthController@logout');
    Route::get('/changepass', 'PageController@changepass');
    Route::put('password/update', 'PageController@passwordupdate');
    Route::get('/chart', 'PageController@chart');
});