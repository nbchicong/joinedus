<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 30/11/2016
 * Time: 11:33 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : DatabaseImpl.php
 * @package: App\Bo
 * @author : nbchicong
 */
/**
 * Class DatabaseImpl
 * @package App\Bo
 */


namespace App\Bo;


interface DatabaseImpl {
  /**
   * Init Database
   */
  public function init();
}