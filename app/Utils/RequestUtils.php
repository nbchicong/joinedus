<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 23/09/2016
 * Time: 9:27 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : RequestUtils.php
 * @package: ${NAMESPACE}
 * @author : nbchicong
 */

use App\WebConstant;

class RequestUtils {
  public static function getWebUrl($path) {
    return url($path) . WebConstant::WEB_EXT;
  }
  public static function getServiceUrl($path) {
    return url($path) . WebConstant::SERVICE_EXT;
  }
}