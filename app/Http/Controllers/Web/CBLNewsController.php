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
 * Class CBLNewsController
 * @package App\Http\Controllers\Web
 */


namespace App\Http\Controllers\Web;

use App\Bo\NewsBO;
use App\Model\CarouselModel;
use App\Model\EntryModel;
use App\Utils\Constants;
use App\Http\Controllers\AbstractController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class CBLNewsController extends AbstractController {
  /**
   * @var \App\Bo\NewsBO
   */
  private $bo;
  
  /**
   * @var \App\Http\Controllers\Web\CBLIndexController
   */
  private $indexCtrl;
  public function index($lang='vi') {
    App::setLocale($lang);
    return view('cbl.news', array(
        'categoryList' => $this->indexCtrl->loadCateList(),
        'carouselList' => $this->getCarousel(),
        'newsList' => $this->bo->getNewest()
    ));
  }
  
  public function load($entryId, $entryCode) {
    $entry = $this->bo->loadWithCode($entryId, $entryCode);
    if (!$entry)
      $entry = new EntryModel();
    return view('cbl.news-detail', array(
        'categoryList' => $this->indexCtrl->loadCateList(),
        'carouselList' => $this->getCarousel(),
        'entry' => $entry
    ));
  }
  
  private function getCarousel() {
    return CarouselModel::paginate(Constants::HOME_CAROUSEL_PAGE_SIZE);
  }
  
  /**
   * Init Controller
   */
  public function init() {
    $this->indexCtrl = new CBLIndexController();
    $this->bo = new NewsBO();
  }
}