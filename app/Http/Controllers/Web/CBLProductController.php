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
    if (!$product)
      $product = new ProductModel();
    else {
      $product = $product[0];
      $this->updateCountView($product);
    }
    Log::debug($product->details);
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
          'productList' => $this->productBO->query('', -1, -1),
          'current' => 0
      ));
    elseif ($cateCode == 'khuyen-mai')
      return view('cbl.product', array(
          'categoryList' => $this->loadCateList(),
          'carouselList' => $this->getCarousel(),
          'productList' => $this->productBO->getPromotion(),
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
  
  private function updateCountView($product) {
    Log::debug("Update Product Count View: ". $product->details);
    $this->productBO->updateCountView($product->id);
    $this->cateBO->updateCountView($product->categoryId);
    if (!is_null($product->brandId)) {
      // TODO: update brand count view
    }
  }
  
  /**
   * Init Controller
   */
  public function init() {
    $this->productBO = new ProductBO();
    $this->cateBO = new ProductCategoryBO();
  }
}