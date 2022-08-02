<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::post('/reservation', 'ReservationController@reserve')->name('reservation.reserve');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin Group Router
Route::group(['prefix' => 'admin', 'middleware' => 'auth',], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('slider',SliderController::class);
    Route::resource('staff',StaffController::class);
    Route::resource('user',UserController::class);


    Route::resource('category', CategoryController::class);
    Route::resource('item', ItemController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
