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

Route::get('/backend','Owner\BackendController@index')->name('owner.index');

// Orders
Route::get('/backend/orders','Owner\OrderController@index')->name('owner.orders.index');

Route::get('/backend/orders/{order}','Owner\OrderController@show')->name('owner.orders.show');

Route::post('/backend/orders/status','Owner\OrderController@status')->name('owner.orders.status');

// Menus
Route::get('/backend/menus','Owner\MenusController@index')->name('owner.menus.index');

Route::get('/backend/menus/{menu}','Owner\MenusController@show')->name('owner.menus.show');

// Products
Route::get('/backend/product/{id}/delete','Owner\ProductsController@delete')->name('owner.product.delete');

Route::get('/backend/product/create/{menu}','Owner\ProductsController@create')->name('owner.product.create');

Route::put('/backend/product/create/{menu}','Owner\ProductsController@create')->name('owner.product.create');
