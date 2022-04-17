<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('profile', 'App\Http\Controllers\ProfileController')->only([
    'index', 'update'
]);

Route::resource('item', 'App\Http\Controllers\ItemController');

// CRUD Category
// Menambahkan resourceful route
Route::resource('category', 'App\Http\Controllers\CategoryController');

Route::get('/add-to-cart/{item}', 'App\Http\Controllers\CartController@add')->name('cart.add')->middleware('auth');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{item_id}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/cart/update/{item_id}', 'App\Http\Controllers\CartController@update')->name('cart.update')->middleware('auth');
Route::get('/checkout', 'App\Http\Controllers\CartController@checkout')->name('cart.checkout')->middleware('auth');

Route::resource('cart_order', 'App\Http\Controllers\CartOrderController')->middleware('auth');

Route::post('/review', 'App\Http\Controllers\ReviewController@review');
