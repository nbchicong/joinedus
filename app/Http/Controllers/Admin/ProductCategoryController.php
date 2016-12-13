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

use Illuminate\Http\Request;
use Log;
use App\Bo\ProductCategoryBO;
use App\Data\DataServiceDTO;
use App\WebConstant;
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
        'categoryList' => $this->bo->query('', -1, 0),
        'title'=>'Danh sách thể loại')
    );
  }
  protected function paging(Request $request) {
    $keyword = $this->getParams('keywords', $request);
    $offset = $this->getParams('pageNumber', $request);
    $dto = new DataServiceDTO(
        $this->bo->query($keyword, WebConstant::AD_PAGE_LIMIT, $offset * WebConstant::AD_PAGE_LIMIT),
        $this->bo->count()
    );
    return response()->json($dto->output());
  }

  private function getModel(ProductCategoryModel $model, Request $request) {
    $model->name = $this->getParams('name', $request);
    $model->code = StringUtils::replace2Code($model->name);
    $model->parentCateId = $this->getParams('parentCateId', $request);
    return $model;
  }
  
  protected function create(Request $request) {
    $cate = new ProductCategoryModel();
    $cate = $this->getModel($cate, $request);
    $dto = new BooleanDTO($this->bo->add($cate));
    return response()->json($dto->output());
  }
  protected function update(Request $request) {
    $cateId = $this->getParams('id', $request);
    if (!empty($cateId) && $this->getPrincipal($request) && $this->getPrincipal($request)->hasRole('ADMIN')) {
      $cateItem = $this->bo->load($cateId);
      if ($cateItem) {
        /** @noinspection PhpParamsInspection */
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