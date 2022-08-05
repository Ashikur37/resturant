<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\OrderController;
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
    Route::resource('order', OrderController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//add to cart
Route::post("/add-to-cart",[App\Http\Controllers\HomeController::class, 'addToCart'])->name('cart.add');
//cart.index
Route::get("/cart",[App\Http\Controllers\HomeController::class, 'cart'])->name('cart.index');
Route::get("/cart/increment",[App\Http\Controllers\HomeController::class, 'cartIncrement'])->name('cart.increment');
Route::get("/cart/decrement",[App\Http\Controllers\HomeController::class, 'cartDecrement'])->name('cart.decrement');

//cart.destroy
Route::delete("/cart/{id}",[App\Http\Controllers\HomeController::class, 'cartDestroy'])->name('cart.destroy');
//checkout
Route::get("/checkout",[App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout')->middleware('auth');
//checkout.submit
Route::post("/checkout/submit",[App\Http\Controllers\HomeController::class, 'checkoutSubmit'])->name('checkout.submit');
