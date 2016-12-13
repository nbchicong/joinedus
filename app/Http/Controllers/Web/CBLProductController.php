<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 20/10/2016
 * Time: 8:55 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : CBLProductController.php
 * @package: App\Http\Controllers\Web
 * @author : nbchicong
 */
/**
 * Class CBLProductController
 * @package App\Http\Controllers\Web
 */


namespace App\Http\Controllers\Web;

use App\Bo\ProductBO;
use App\Bo\ProductCategoryBO;
use Illuminate\Http\Request;
use Log;
use App\Http\Requests\BaseRequest;
use App\Model\BrandModel;
use App\Model\CarouselModel;
use App\Model\ProductModel;
use App\Model\ProductCategoryModel;
use App\Utils\Constants;
use App\Http\Controllers\AbstractController;

class CBLProductController extends AbstractController {
  /**
   * @var \App\Bo\ProductBO
   */
  private $productBO;
  
  /**
   * @var \App\Bo\ProductCategoryBO
   */
  private $cateBO;
  
  public function index() {
    $request = new BaseRequest();
    $offset = $request->input('current', 0);
    return view('cbl.product', array(
        'categoryList' => $this->loadCateList(),
        'carouselList' => $this->getCarousel(),
        'productList' => $this->getProductList($offset),
        'current' => $offset
    ));
  }
  
  public function load($cate, $productId, $code) {
    Log::debug('Load Product '. $productId);
    $product = $this->productBO->load($productId);
    if (!$product) {
      $product = new ProductModel();
    } else {
      /** @noinspection PhpParamsInspection */
      $this->updateProductCountView($product);
    }
    return view('cbl.product-detail', array(
        'categoryList' => $this->loadCateList(),
        'carouselList' => $this->getCarousel(),
        'productDetail' => $product
    ));
  }
  
  public function cate(Request $request, $cateCode, $cateId) {
    Log::debug('Load Category');
    $offset = $this->getOffset($request);
    if ($cateCode == 'catalogue')
      return view('cbl.product', array(
          'categoryList' => $this->loadCateList(),
          'carouselList' => $this->getCarousel(),
          'productList' => $this->getAllProduct(),
          'current' => 0
      ));
    elseif ($cateCode == 'khuyen-mai')
      return view('cbl.product', array(
          'categoryList' => $this->loadCateList(),
          'carouselList' => $this->getCarousel(),
          'productList' => $this->getPromotion($offset),
          'current' => 0
      ));
    else
      return view('cbl.product', array(
          'categoryList' => $this->loadCateList(),
          'carouselList' => $this->getCarousel(),
          'productList' => $this->getByCate($cateId),
          'current' => $offset
      ));
  }
  
  public function subCate(Request $request, $cate, $cateCode, $cateId) {
    Log::debug('Load Sub Category');
    $offset = $this->getOffset($request);
    return view('cbl.product', array(
        'categoryList' => $this->loadCateList(),
        'carouselList' => $this->getCarousel(),
        'productList' => $this->getByCate($cateId),
        'current' => $offset
    ));
  }
  
  private function getAllProduct() {
    return ProductModel::all();
  }
  
  private function getProductList($offset) {
    if (!$offset)
      $offset = 0;
    return ProductModel::offset($offset)
        ->limit(Constants::PRODUCT_PAGE_SIZE)
        ->get();
  }
  
  private function getPromotion($offset) {
    return ProductModel::where('promotions', 1)
        ->offset($offset)
        ->limit(Constants::PRODUCT_PAGE_SIZE)
        ->get();
  }
  
  private function getByCate($cateId) {
    $cate = $this->cateBO->load($cateId);
    if ($cate)
      return $this->productBO->queryByCate($cateId, null, null);
    return array();
  }
  
  private function getTotal() {
    return ProductModel::count();
  }
  
  private function getCarousel() {
    return CarouselModel::paginate(Constants::HOME_CAROUSEL_PAGE_SIZE);
  }
  
  private function loadCateByParentId($parentId) {
    return ProductCategoryModel::where('parentCateId', $parentId)->get();
  }
  
  private function loadCateList() {
    $cateParentList = ProductCategoryModel::where('parentCateId', '')->get();
    $cateChildrenList = ProductCategoryModel::where('parentCateId', '<>', '')->get();
    foreach ($cateChildrenList as $cate)
      if (!empty($cate->parentCateId))
        foreach ($cateParentList as $parent)
          if ($parent->id == $cate->parentCateId)
            $parent->childrens = $this->loadCateByParentId($cate->parentCateId);
    return $cateParentList;
  }
  
  private function updateProductCountView($product) {
    Log::debug("Update Product Count View: ");
    Log::debug($product);
    $countView = $product->countView;
    if (empty($countView))
      $countView = 0;
    $product->countView = ($countView + 1);
    $product->update($product->toArray());
    $this->updateCategoryCountView(ProductCategoryModel::find($product->categoryId));
    $this->updateBrandCountView(BrandModel::find($product->brandId));
  }
  
  private function updateCategoryCountView(ProductCategoryModel $category) {
    Log::debug("Update Category Count View");
    $countView = $category->countView;
    if (empty($countView))
      $countView = 0;
    $category->countView = ($countView + 1);
    $category->update($category->toArray());
  }
  
  private function updateBrandCountView(BrandModel $brand) {
    Log::debug("Update Brand Count View");
    $countView = $brand->countView;
    if (empty($countView))
      $countView = 0;
    $brand->countView = ($countView + 1);
    $brand->update($brand->toArray());
  }
  
  /**
   * Init Controller
   */
  public function init() {
    $this->productBO = new ProductBO();
    $this->cateBO = new ProductCategoryBO();
  }
}