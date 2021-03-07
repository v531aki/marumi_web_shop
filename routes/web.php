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

if(env('APP_ENV') === 'local'){
    URL::forceScheme('http');
} else {
    URL::forceScheme('https');
}

Route::get('/', 'WebController@index');

Route::get('users/carts', 'CartController@index')->name('carts.index');
Route::post('users/carts', 'CartController@store')->name('carts.store');
Route::delete('users/carts', 'CartController@destroy')->name('carts.destroy');

Route::get('products', 'ProductController@index')->name('products.index');
Route::get('products/show/{product}', 'ProductController@show')->name('products.show');
Auth::routes();

Route::get('sewpad', 'SewpadController@index')->name('sewpad');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard',  'DashboardController@index');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
    Route::resource('products', 'Dashboard\ProductController');
    Route::get('products/import/csv', 'Dashboard\ProductController@import')->name('products.import');
    Route::post('products/import/csv', 'Dashboard\ProductController@import_csv');
    
    Route::get('special_features', 'Dashboard\Special_featureController@index')->name('special_features');
    Route::get('special_features/{special_feature}/edit', 'Dashboard\Special_featureController@edit');
    Route::post('special_features/{special_feature}', 'Dashboard\Special_featureController@update');

    Route::get('ranking', 'Dashboard\RankingController@index')->name('ranking');
    Route::get('ranking/{ranking}/edit', 'Dashboard\RankingController@edit');
    Route::post('ranking/{ranking}', 'Dashboard\RankingController@update');
    
    Route::get('categories','Dashboard\CategoryController@export');
});