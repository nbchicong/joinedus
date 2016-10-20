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
 * @class CBLIndexController
 */


namespace App\Http\Controllers\Web;

use Log;
use Illuminate\Support\Facades\App;
use App\Model\CarouselModel;
use App\Model\ProductModel;
use App\Model\ProductCategoryModel;
use App\Utils\Constants;
use App\Http\Controllers\AbstractController;

class CBLIndexController extends AbstractController {
  public function index($lang='vi') {
    App::setLocale($lang);
    return view('cbl.index', array(
        'categoryList' => $this->loadCateList(),
        'carouselList' => $this->getCarousel(),
        'newProductList' => $this->getNewProduct(),
        'featureProductList' => $this->getFeatureProduct()
    ));
  }
  
  private function getFeatureProduct() {
    return ProductModel::where('feature', 1)
        ->limit(Constants::HOME_FEATURE_PRODUCT_SIZE)
        ->get();
  }
  
  private function getNewProduct() {
    return ProductModel::where('countView', 0)
        ->orderBy('name')
        ->limit(Constants::HOME_NEW_PRODUCT_SIZE)
        ->get();
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
    Log::debug("List cate");
    Log::debug($cateParentList);
    return $cateParentList;
  }
}