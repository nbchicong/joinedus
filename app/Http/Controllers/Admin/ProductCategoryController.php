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

use App\Bo\ProductCategoryBO;
use Illuminate\Http\Request;
use App\Model\ProductCategoryModel;
use App\Data\BooleanDTO;
use App\Utils\StringUtils;
use App\Http\Controllers\AbstractController;

class ProductCategoryController extends AbstractController {
  /**
   * @var \App\Bo\ProductCategoryBO
   */
  private $bo;
  
  public function index() {
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
    $dto = new BooleanDTO($this->bo->add($cate));
    return response()->json($dto->output());
  }
  protected function update(Request $request) {
    $cateId = $request->input('id');
    if (!empty($cateId) && $request->user()->hasRole('ADMIN')) {
      $cateItem = ProductCategoryModel::find($cateId);
      if ($cateItem) {
        $cateItem = $this->getModel($cateItem, $request);
        $dto = new BooleanDTO($this->bo->update($cateItem));
        return response()->json($dto->output());
      }
      $dto = new BooleanDTO(false);
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
  
  /**
   * Delete Category by Id
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  protected function delete(Request $request) {
    $cateId = $request->input('id');
    if (!empty($cateId) && $request->user()->hasRole('ADMIN')) {
      $cateItem = $this->bo->load($cateId);
      if ($cateItem) {
        $dto = new BooleanDTO($this->bo->delete($cateId));
        return response()->json($dto->output());
      }
      $dto = new BooleanDTO(false);
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
  /**
   * Init Controller
   */
  public function init() {
    $this->bo = new ProductCategoryBO();
  }
}