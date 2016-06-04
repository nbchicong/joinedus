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

Route::post('/auth/login','Auth\AuthController@login');
Route::post('/auth/register','Auth\AuthController@create');

Route::get('blade', function () {
  $drinks = array('Vodka','Gin','Brandy');
  return view('page',array('name' => 'The Raven','day' => 'Friday','drinks' => $drinks));
});

// ADMIN

Route::get('/admin', function () {
  return view('admin.home');
});
Route::group(['middleware' => ['roles:admin']], function() {
  Route::get('/admin/product/category','Admin\ProductCategoryController@index');
  Route::get('/admin/product/category/list','Admin\ProductCategoryController@listCate');
  Route::post('/admin/product/category/create','Admin\ProductCategoryController@create');
  Route::post('/admin/product/category/update','Admin\ProductCategoryController@update');
  Route::post('/admin/product/category/remove','Admin\ProductCategoryController@delete');
});
Route::group(['middleware' => ['roles:super_admin']], function() {
  Route::get('/admin/users','Admin\UserController@index');
  Route::get('/admin/users/list','Admin\UserController@listUser');
  Route::post('/admin/users/create','Admin\UserController@create');
  Route::post('/admin/users/update','Admin\UserController@update');
  Route::post('/admin/users/remove','Admin\UserController@delete');
});
