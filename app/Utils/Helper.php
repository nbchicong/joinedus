<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 10/07/2016
 * Time: 9:17 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: Helper.php
 * @package: App\Http
 * @author: nbchicong
 */
/**
 * Class Helper
 * @package App\Http
 */


//namespace App\Utils;

use App\WebConstant;
use App\Model\SiteConfigModel;

class Helper {
  public static function getPrice($price) {
    $siteConfig = SiteConfigModel::first();
    if ($siteConfig->currency == 'USD') {
      return '$' . $price;
    }
    if ($siteConfig->currency == 'VND') {
      return $price . ' đồng';
    }
    return $price;
  }

  public static function getRequestUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    return $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  }
  
  public static function getRouteWebPath($path) {
    return $path . WebConstant::WEB_EXT;
  }
  
  public static function getRouteServicePath($path) {
    return $path . WebConstant::SERVICE_EXT;
  }
  
  public static function getWebUrl($path) {
    return url($path) . WebConstant::WEB_EXT;
  }
  
  public static function getServiceUrl($path) {
    return url($path) . WebConstant::SERVICE_EXT;
  }
  
  public static function echoHtml($content) {
    echo html_entity_decode($content);
    return '';
  }
}