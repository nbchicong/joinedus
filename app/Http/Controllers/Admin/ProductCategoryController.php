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
use App\Data\BooleanDTO;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller{
  protected function index() {
    return view('admin.category.index', array(
        'categoryList' => ProductCategoryModel::paginate(0),
        'title'=>'Danh sách thể loại')
    );
  }
  protected function listCate() {
//    $dto = new ListDTO(ProductCategoryModel::paginate(0));
    return response()->json(ProductCategoryModel::paginate(0));
  }
  protected function create(Request $request) {
    $cate = new ProductCategoryModel();
    $cate = $cate->create($request->all());
    $dto = new BooleanDTO(isset($cate->id));
    return response()->json($dto->output());
  }
  protected function update(Request $request) {
    $cate = new ProductCategoryModel();
    $cate = $cate->find($request->id);
    $dto = new BooleanDTO($cate->save($request->all()));
    return response()->json($dto->output());
  }
  protected function delete(Request $request) {
    $cate = new ProductCategoryModel();
    $cate = $cate->find($request->input('id'));
    $dto = new BooleanDTO($cate->delete());
    return response()->json($dto->output());
  }
}