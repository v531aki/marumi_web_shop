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

Route::get('products', 'ProductController@index')->name('products.index');
Route::get('/show', 'ProductController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard',  'DashboardController@index');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
    Route::resource('products', 'Dashboard\ProductController');
    Route::get('products/import/csv', 'Dashboard\ProductController@import')->name('products.import');
    Route::post('products/import/csv', 'Dashboard\ProductController@import_csv');
    Route::get('categories','Dashboard\CategoryController@export');
});