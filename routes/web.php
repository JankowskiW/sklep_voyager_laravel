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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('products', 'ProductController@show');
Route::get('categories', 'CategoryController@show');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', function () {
    if (Auth::user()) {
        Auth::logout();
    }
    return view('home');
});

Auth::routes();

//Route::get('register','HomeController@registrationForm');

//Route::get('/addToCart/{id}', [
//    'uses' => 'ProductController@addToCart',
//    'as' => 'product.shoppingCart'
//]);

Route::get('/addToCart/{id}','ProductController@addToCart');

Route::get('cart', 'CartController@show');

Route::get('/showProduct/{id}', 'ProductController@showProduct');