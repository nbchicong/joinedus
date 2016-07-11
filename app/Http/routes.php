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
Route::get('/products/details/{code}','Web\HomeController@productDetails');
Route::get('/products/categories/{code}','Web\HomeController@productCategories');
Route::get('/products/brands/{brandCode}','Web\HomeController@productBrands');
Route::get('/blog','Web\HomeController@blog');
Route::get('/blog/post/{code}','Web\HomeController@blogItem');
Route::get('/contact-us','Web\HomeController@contactUs');
Route::get('/login','Web\HomeController@login');
Route::get('/logout','Web\HomeController@logout');
Route::get('/cart','Web\HomeController@cart');
Route::get('/checkout','Web\HomeController@checkout');
Route::get('/search/{query}','Web\HomeController@search');

Route::post('/auth/login','Auth\AuthController@login');
Route::post('/auth/register','Auth\AuthController@create');

// ADMIN

Route::get('/admin', function () {
  return view('admin.home');
});

Route::get('/file/get/{code}', ['as' => 'getFile', 'uses' => 'FileEntryController@get']);

Route::group(['middleware' => ['roles:writer']], function() {
  Route::post('/admin/file/add','Admin\FileEntryController@add');
  Route::get('/admin/file/list','Admin\FileEntryController@listFile');

  Route::get('/admin/product','Admin\ProductController@index');
  Route::get('/admin/product/list','Admin\ProductController@listItems');
  Route::get('/admin/product/load','Admin\ProductController@load');
  Route::post('/admin/product/create','Admin\ProductController@create');
  Route::post('/admin/product/update','Admin\ProductController@update');
  Route::post('/admin/product/remove','Admin\ProductController@delete');

  Route::get('/admin/entry/category','Admin\EntryCategoryController@index');
  Route::get('/admin/entry/category/list','Admin\EntryCategoryController@listItems');
  Route::post('/admin/entry/category/create','Admin\EntryCategoryController@create');
  Route::post('/admin/entry/category/update','Admin\EntryCategoryController@update');
  Route::post('/admin/entry/category/remove','Admin\EntryCategoryController@delete');

  Route::get('/admin/entry','Admin\EntryController@index');
  Route::get('/admin/entry/list','Admin\EntryController@listItems');
  Route::get('/admin/entry/load','Admin\EntryController@load');
  Route::post('/admin/entry/create','Admin\EntryController@create');
  Route::post('/admin/entry/update','Admin\EntryController@update');
  Route::post('/admin/entry/remove','Admin\EntryController@delete');

  Route::get('/admin/page','Admin\PageContentController@index');
  Route::get('/admin/page/list','Admin\PageContentController@listItems');
  Route::get('/admin/page/load','Admin\PageContentController@load');
  Route::post('/admin/page/create','Admin\PageContentController@create');
  Route::post('/admin/page/update','Admin\PageContentController@update');
  Route::post('/admin/page/remove','Admin\PageContentController@delete');
});
Route::group(['middleware' => ['roles:admin']], function() {
  Route::get('/admin/product/category','Admin\ProductCategoryController@index');
  Route::get('/admin/product/category/list','Admin\ProductCategoryController@listCate');
  Route::post('/admin/product/category/create','Admin\ProductCategoryController@create');
  Route::post('/admin/product/category/update','Admin\ProductCategoryController@update');
  Route::post('/admin/product/category/remove','Admin\ProductCategoryController@delete');

  Route::get('/admin/product/brand','Admin\BrandController@index');
  Route::get('/admin/product/brand/list','Admin\BrandController@listCate');
  Route::post('/admin/product/brand/create','Admin\BrandController@create');
  Route::post('/admin/product/brand/update','Admin\BrandController@update');
  Route::post('/admin/product/brand/remove','Admin\BrandController@delete');

  Route::get('/admin/carousel','Admin\CarouselController@index');
  Route::get('/admin/carousel/list','Admin\CarouselController@listItems');
  Route::get('/admin/carousel/load','Admin\CarouselController@load');
  Route::post('/admin/carousel/create','Admin\CarouselController@create');
  Route::post('/admin/carousel/update','Admin\CarouselController@update');
  Route::post('/admin/carousel/remove','Admin\CarouselController@delete');

  Route::get('/admin/config','Admin\SiteConfigController@index');
  Route::post('/admin/config/update','Admin\SiteConfigController@update');
});
Route::group(['middleware' => ['roles:super_admin']], function() {
  Route::get('/admin/users','Admin\UserController@index');
  Route::get('/admin/users/list','Admin\UserController@listUser');
  Route::post('/admin/users/create','Admin\UserController@create');
  Route::post('/admin/users/update','Admin\UserController@update');
  Route::post('/admin/users/remove','Admin\UserController@delete');
});
