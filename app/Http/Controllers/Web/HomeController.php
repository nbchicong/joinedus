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

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProductCategoryModel;

class HomeController extends Controller{

  public function index() {
    $category = ProductCategoryModel::paginate(0);
    return view('home', array('page' => 'home', 'categoryList' => $category));
  }

  public function products() {
    return view('products', array('page' => 'products'));
  }

  public function productDetails($id) {
    return view('product_details', array('page' => 'products'));
  }

  public function productCategories($name) {
    return view('products', array('page' => 'products'));
  }

  public function productBrands($name, $category = null) {
    return view('products', array('page' => 'products'));
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