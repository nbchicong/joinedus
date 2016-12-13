<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 31/07/2016
 * Time: 06:19
 * ---------------------------------------------------
 * Project: joinedus
 * @name: AbstractController.php
 * @author: nbchicong
 */
/**
 * @package App\Http\Controllers
 * @class AbstractController
 */

namespace App\Http\Controllers;

use App\WebConstant;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

abstract class AbstractController extends Controller {
  protected $model = null;
  
  /**
   * Get current language of system
   * @return string
   */
  protected function getLanguage() {
    return App::getLocale();
  }

  /**
   * Check has user logged
   * @return bool
   */
  protected function isAuth() {
    return Auth::check();
  }
  
  /**
   * Get current user logged
   * @param Request $request
   *
   * @return \App\Model\User|null
   */
  protected function getPrincipal(Request $request) {
    if ($this->isAuth())
      return $request->user();
    return null;
  }
//
//  private function isIgnoredParams($paramName) {
//    return $paramName == WebConstant::PAGE_OFFSET_PARAM
//        || $paramName == WebConstant::PAGE_LIMIT_PARAM
//        || $paramName == WebConstant::LANG_PARAM;
//  }

//  /**
//   * Get model from request
//   * @param Request $request
//   * @return {*}
//   */
//  protected function getModel(Request $request) {
//    Log::debug("Abstract Controller");
//    Log::debug($request->all());
//    if ($this->model != null)
//      foreach ($request->all() as $name => $value)
//        if (!$this->isIgnoredParams($name))
//          $this->model->{WebConstant::PREFIX_SET_FUNC_MODEL . ucfirst($name)}($value);
//    return $this->model;
//  }
  
  /**
   * Get Limit rows query
   * @param Request $request
   *
   * @return int
   */
  protected function getLimit(Request $request) {
    return (int) $this->getParams(WebConstant::PAGE_LIMIT_PARAM, $request, WebConstant::AD_PAGE_LIMIT);
  }
  
  /**
   * Get offset rows query
   * @param Request $request
   *
   * @return int
   */
  protected function getOffset(Request $request) {
    return (int) $this->getParams(WebConstant::PAGE_OFFSET_PARAM, $request, 0);
  }

  protected function index() {}
}