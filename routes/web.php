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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/products/viewed', 'ProductController@viewed')->name('products.viewed');

Route::resource('/products', 'ProductController');

Route::resource('/cart', 'CartController')->except(['create', 'show', 'edit']);

Route::resource('/account', 'AccountController')->only(['index', 'update']);

Route::put('/account', 'AccountController@updatePass')->name('account.updatePass');

Route::get('/order', 'OrderController@index')->name('order.index');

Route::post('/order', 'OrderController@guestOrder')->name('order.guestOrder');

Route::get('/order/{id}', 'OrderController@show');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::post('/', 'ProductController@importProduct')->name('products.import');
    Route::resource('products', 'ProductController');
    Route::resource('requestproducts', 'RequestProductController')->except(['create', 'edit']);
    Route::resource('orders', 'OrderController')->except(['create', 'store']);
});
Route::post('createproducts', 'Admin\RequestProductController@createProductFromRequest')->name('request.create_product');
