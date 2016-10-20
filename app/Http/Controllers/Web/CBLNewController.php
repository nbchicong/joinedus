<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 20/10/2016
 * Time: 7:30 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : CBLNewController.php
 * @package: App\Http\Controllers\Web
 * @author : nbchicong
 */
/**
 * Class CBLNewController
 * @package App\Http\Controllers\Web
 */


namespace App\Http\Controllers\Web;

use Log;
use Illuminate\Support\Facades\App;
use App\Model\CarouselModel;
use App\Model\EntryModel;
use App\Model\ProductCategoryModel;
use App\Utils\Constants;
use App\Http\Controllers\AbstractController;

class CBLNewController extends AbstractController {
  public function index($lang='vi') {
    App::setLocale($lang);
    return view('cbl.news', array(
        'categoryList' => $this->loadCateList(),
        'carouselList' => $this->getCarousel(),
        'newsList' => $this->getNewsList()
    ));
  }
  
  public function load($entryCode) {
    Log::debug('entry code: '.$entryCode);
    $entry = EntryModel::where('code', $entryCode)->first();
    if (!$entry)
      $entry = new EntryModel();
    return view('cbl.news-detail', array(
        'categoryList' => $this->loadCateList(),
        'carouselList' => $this->getCarousel(),
        'entry' => $entry
    ));
  }
  
  private function getCarousel() {
    return CarouselModel::paginate(Constants::HOME_CAROUSEL_PAGE_SIZE);
  }
  
  private function getNewsList() {
    return EntryModel::paginate(0);
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