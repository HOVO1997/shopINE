<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/', 'MainController@index')->name('index');

Route::middleware(['auth'])->group(function (){

    Route::get('/orders', 'OrdersController@orders')->name('orders');

});


Route::get('/categories', 'MainController@categories')->name('categories');


Route::get('/basket', 'BasketController@basket')->name('basket');

Route::get('/basket/place', 'BasketController@basketPlace')->name('basket-place');

Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');

Route::post('/basket/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');

Route::post('/basket/confirm', 'BasketController@basketConfirm')->name('basket-confirm');

Route::get('/categories/{category}', 'MainController@category')->name('category');

Route::get('/{category}/{product?}', 'MainController@product')->name('product');




