<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 20/10/2016
 * Time: 8:50 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : CBLPageController.php
 * @package: App\Http\Controllers\Web
 * @author : nbchicong
 */
/**
 * Class CBLPageController
 * @package App\Http\Controllers\Web
 */


namespace App\Http\Controllers\Web;

use Log;
use App\Model\CarouselModel;
use App\Model\PageContentModel;
use App\Model\ProductCategoryModel;
use App\Utils\Constants;
use App\Http\Controllers\AbstractController;

class CBLPageController extends AbstractController {
  public function load($code) {
    Log::debug('page code: '.$code);
    $page = PageContentModel::where('code', $code)->first();
    if (!$page)
      $page = new PageContentModel();
    return view('cbl.page', array(
        'categoryList' => $this->loadCateList(),
        'carouselList' => $this->getCarousel(),
        'page' => $page
    ));
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