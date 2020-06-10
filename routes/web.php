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

Route::get('/', ['uses' => 'ProductController@getHome', 'as' => 'home']);

Route::get('/shop', ['uses' => 'ProductController@getShop', 'as' => 'shop']);

Route::get('/shop/{product}', 'ProductController@getProduct');

Route::get('/cart', 'ProductController@getCart');

Route::get('/checkout', 'ProductController@getCheckout');

Route::get('/add/{product}/{qty}/{site}', 'ProductController@getAdd');

Route::get('/changeQty/{product}/{qty}/{size}', 'ProductController@getChangeQty');

Route::get('/changeSize/{product}/{qty}/{size}/{currsize}', 'ProductController@getChangeSize');

Route::get('/remove/{product}/{size}', 'ProductController@getRemove');

Route::get('/order', 'ProductController@getOrder');

Route::post('/register', 'UserController@getRegister');

Route::post('/login', 'UserController@getLogin');

Route::get('/logout', 'UserController@getLogout');

Route::get('/profile', ['uses' => 'UserController@getProfile', 'middleware' => 'auth']);

Route::get('products/list', 'ProductController@list');

Route::get('products/list/{page}', 'ProductController@list');

Route::delete('products/{product}', 'ProductController@destroy');

Route::post('products/', 'ProductController@store');

Route::get('products/{product}/edit', 'ProductController@edit');

Route::put('products/{product}', 'ProductController@update');

Route::post('upload/1/{action}/{product}', 'ProductController@uploadSmall');

Route::post('upload/2/{action}/{product}', 'ProductController@uploadLarge');
