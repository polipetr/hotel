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

// Authentication Routes
Auth::routes();

// Social Logins
Route::get('social/auth/redirect/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('social/auth/{provider}', 'Auth\AuthController@handleProviderCallback');

// Routes for Front
Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('room_type', 'Front\RoomTypeController');


// Route::get('/admin/login', 'Auth\LoginController@showLoginForm');

// Routes for Admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::resource('slider', 'Admin\SliderController');

    Route::resource('facility', 'Admin\FacilityController');
    Route::resource('event', 'Admin\EventController');
    Route::resource('food', 'Admin\FoodController');




    // User Routes
    Route::resource('user', 'Admin\UserController');
    Route::get('user/{id}/profile', 'Admin\UserController@profile');
    Route::put('user/{id}/profile', 'Admin\UserController@update_profile');
    Route::get('user/{id}/setting', 'Admin\UserController@setting');
    Route::put('user/{id}/setting', 'Admin\UserController@update_setting');


    Route::resource('room_type', 'Admin\RoomTypeController');
    // Route for room types
    Route::group(['prefix' => 'room_type', 'middleware' => 'auth'], function(){
        // Rutes for Room Type Images
        Route::get('/{id}/image', 'Admin\ImageController@index');
        Route::get('/{id}/image/create', 'Admin\ImageController@create');
        Route::post('/{id}/image', 'Admin\ImageController@store');
        Route::get('/{id}/image/{image_id}/edit', 'Admin\ImageController@edit');
        Route::put('/{id}/image/{image_id}/edit', 'Admin\ImageController@update');
        Route::get('/{id}/image/create_multiple', 'Admin\ImageController@create_multiple');
        Route::post('/{id}/image/create_multiple', 'Admin\ImageController@store_multiple');
        Route::delete('/{id}/image/{image_id}', 'Admin\ImageController@destroy');

        // Routes for Rooms
        Route::get('/{id}/room', 'Admin\RoomController@index');
        Route::get('/{id}/room/create', 'Admin\RoomController@create');
        Route::post('/{id}/room', 'Admin\RoomController@store');
        Route::get('/{id}/room/{room_id}/edit', 'Admin\RoomController@edit');
        Route::put('/{id}/room/{room_id}/edit', 'Admin\RoomController@update');
        Route::delete('/{id}/room/{image_id}', 'Admin\RoomController@destroy');
    });
});


