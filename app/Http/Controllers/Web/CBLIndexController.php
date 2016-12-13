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

use App\Bo\ProductBO;
use App\Bo\ProductCategoryBO;
use Log;
use Illuminate\Support\Facades\App;
use App\Model\CarouselModel;
use App\Utils\Constants;
use App\Http\Controllers\AbstractController;

class CBLIndexController extends AbstractController {
  /**
   * @var \App\Bo\ProductBO
   */
  private $bo;
  
  /**
   * @var \App\Bo\ProductCategoryBO
   */
  private $cateBO;
  
  public function index($lang='vi') {
    App::setLocale($lang);
    return view('cbl.index', array(
        'categoryList' => $this->loadCateList(),
        'carouselList' => $this->getCarousel(),
        'newProductList' => $this->bo->getNewest(),
        'featureProductList' => $this->bo->getFeature()
    ));
  }
  
  private function getCarousel() {
    return CarouselModel::paginate(Constants::HOME_CAROUSEL_PAGE_SIZE);
  }

  public function loadCateList() {
    $cateParentList = $this->cateBO->getParent();
    foreach ($cateParentList as $parent) {
      $cateChildrenList = $this->cateBO->getChildren($parent->id);
      if (!empty($cateChildrenList)) {
        $parent->childrens = $cateChildrenList;
      }
    }
    return $cateParentList;
  }
  
  /**
   * Init Controller
   */
  public function init() {
    $this->bo = new ProductBO();
    $this->cateBO = new ProductCategoryBO();
  }
}