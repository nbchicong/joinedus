<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 14/05/2016
 * Time: 12:30 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: HomeController.php
 * @author: nbchicong
 */
/**
 * @package App\Http\Controllers\Web
 * @class HomeController
 */


namespace App\Http\Controllers\Web;

use Log;
use App\BrandModel;
use App\ProductModel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProductCategoryModel;

class HomeController extends Controller {

  public function index($lang='vi') {
    App::setLocale($lang);
    return view('home', array(
        'page' => 'home',
        'categoryList' => ProductCategoryModel::paginate(0),
        'brandList' => BrandModel::paginate(0),
        'featureProductList' => ProductModel::paginate(3)
    ));
  }

  public function products() {
    return view('products', array(
        'page' => 'products',
        'categoryList' => ProductCategoryModel::paginate(0),
        'brandList' => BrandModel::paginate(0),
        'productList' => ProductModel::paginate(0)
    ));
  }

  public function productDetails($code) {
    $product = ProductModel::where('nameCode', $code)->first();
    if (!$product) {
      $product = new ProductModel();
    }
    return view('product_details', array(
        'page' => 'products',
        'categoryList' => ProductCategoryModel::paginate(0),
        'brandList' => BrandModel::paginate(0),
        'productDetail' => $product
    ));
  }

  public function productCategories($parentId, $code) {
    $cate = ProductCategoryModel::where('code', $code)->first();
    return view('products', array(
        'page' => 'products',
        'categoryList' => ProductCategoryModel::paginate(0),
        'brandList' => BrandModel::paginate(0),
        'productList' => ProductModel::where('categoryId', $cate->id)->get()
    ));
  }

  public function productBrands($brandCode) {
    $cate = BrandModel::where('code', $brandCode)->first();
    Log::debug($cate);
    return view('products', array(
        'page' => 'products',
        'categoryList' => ProductCategoryModel::paginate(0),
        'brandList' => BrandModel::paginate(0),
        'productList' => ProductModel::where('brandId', $cate->id)->get()
    ));
  }

  public function blog() {
    return view('blog', array('page' => 'blog'));
  }

  public function blogItem($id) {
    return view('blog_item', array('page' => 'blog'));
  }

  public function contactUs() {
    return view('contact_us', array('page' => 'contact_us'));
  }

  public function login() {
    return view('login', array('page' => 'home'));
  }

  public function logout() {
    Auth::logout();
    return view('login', array('page' => 'home'));
  }

  public function cart() {
    return view('cart', array('page' => 'home'));
  }

  public function checkout() {
    return view('checkout', array('page' => 'home'));
  }

  public function search($query) {
    return view('products', array('page' => 'products'));
  }
}