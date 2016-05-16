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

Route::get('/', function () {
  return view('welcome');
});
Route::get('/index', 'Web\HomeController@index');
Route::get('/news', function () {
  return view('news');
});
Route::get('/products', function () {
  return view('products');
});
Route::get('/about', function () {
  return view('about');
});
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
