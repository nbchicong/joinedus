<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 16/05/2016
 * Time: 5:49 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: ProductCategoryController.php
 * @package: App\Http\Controllers\Admin
 * @author: nbchicong
 */
/**
 * Class ProductCategoryController
 * @package App\Http\Controllers\Admin
 */


namespace App\Http\Controllers\Admin;

use App\ProductCategoryModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller{
  protected function index() {
    $category = ProductCategoryModel::orderBy('created_at','desc')->paginate(5);
    $title = 'Danh thể loại';
    return view('admin.category.index', ['categoryList'=>$category, 'title'=>$title]);
  }
  protected function create(Request $request) {
    $cate = new ProductCategoryModel();
    $cate->save($request);
  }
}