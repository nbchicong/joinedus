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
use App\Utils\StringUtils;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller{
  protected function index() {
    return view('admin.product-category', array(
        'categoryList' => ProductCategoryModel::paginate(0),
        'title'=>'Danh sách thể loại')
    );
  }
  protected function listCate() {
    return response()->json(ProductCategoryModel::paginate(0));
  }

  private function getModel(ProductCategoryModel $model, Request $request) {
    $model->name = $request->input('name');
    $model->code = StringUtils::replace2Code($model->name);
    $model->parentCateId = $request->input('parentCateId');
    return $model;
  }
  protected function create(Request $request) {
    $cate = new ProductCategoryModel();
    $cate = $this->getModel($cate, $request);
    $dto = new BooleanDTO($cate->save());
    return response()->json($dto->output());
  }
  protected function update(Request $request) {
    $cateId = $request->input('id');
    if (!empty($cateId) && $request->user()->hasRole('ADMIN')) {
      $cateItem = ProductCategoryModel::find($cateId);
      if ($cateItem) {
        $cateItem = $this->getModel($cateItem, $request);
        $dto = new BooleanDTO($cateItem->save());
        return response()->json($dto->output());
      }
      $dto = new BooleanDTO(false);
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
  protected function delete(Request $request) {
    $cateId = $request->input('id');
    if (!empty($cateId) && $request->user()->hasRole('ADMIN')) {
      $cateItem = ProductCategoryModel::find($cateId);
      if ($cateItem) {
        $dto = new BooleanDTO($cateItem->delete());
        return response()->json($dto->output());
      }
      $dto = new BooleanDTO(false);
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
}