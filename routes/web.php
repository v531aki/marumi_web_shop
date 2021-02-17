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

Route::get('/', 'WebController@index');

Route::get('users/carts', 'CartController@index')->name('carts.index');
Route::post('users/carts', 'CartController@store')->name('carts.store');
Route::delete('users/carts', 'CartController@destroy')->name('carts.destroy');

Route::resource('/products', 'ProductController');
route::get('/show', 'ProductController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard',  'DashboardController@index');
