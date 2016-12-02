<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 30/11/2016
 * Time: 11:24 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : ControllerImpl.php
 * @package: App\Http\Controllers
 * @author : nbchicong
 */
/**
 * Class ControllerImpl
 * @package App\Http\Controllers
 */


namespace App\Http\Controllers;


interface ControllerImpl {
  /**
   * Init Controller
   */
  public function init();
}