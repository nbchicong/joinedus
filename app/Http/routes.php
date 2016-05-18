<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// WEB E-SHOPPER
Route::get('/','Web\HomeController@index');
Route::get('/index', 'Web\HomeController@index');
Route::get('/products','Web\HomeController@products');
Route::get('/products/details/{id}','Web\HomeController@productDetails');
Route::get('/products/categories/{name}','Web\HomeController@productCategories');
Route::get('/products/brands/{name}/{category?}','Web\HomeController@productBrands');
Route::get('/blog','Web\HomeController@blog');
Route::get('/blog/post/{id}','Web\HomeController@blogItem');
Route::get('/contact-us','Web\HomeController@contactUs');
Route::get('/login','Web\HomeController@login');
Route::get('/logout','Web\HomeController@logout');
Route::get('/cart','Web\HomeController@cart');
Route::get('/checkout','Web\HomeController@checkout');
Route::get('/search/{query}','Web\HomeController@search');

Route::get('blade', function () {
  $drinks = array('Vodka','Gin','Brandy');
  return view('page',array('name' => 'The Raven','day' => 'Friday','drinks' => $drinks));
});

// ADMIN

Route::get('/admin', function () {
  return view('admin.home');
});
Route::get('/admin/product/category','Admin\ProductCategoryController@index');
Route::post('/admin/product/category/create','Admin\ProductCategoryController@create');
Route::post('/admin/product/category/update','Admin\ProductCategoryController@update');
Route::group(['middleware' => ['roles:super_admin']], function() {

});
Route::get('/admin/users','Admin\ProductCategoryController@index');
Route::post('/admin/users/create','Admin\ProductCategoryController@create');
Route::post('/admin/users/update','Admin\ProductCategoryController@update');
Route::group(['middleware' => ['roles:super_admin']], function() {

});
