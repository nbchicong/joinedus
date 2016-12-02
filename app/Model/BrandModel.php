<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 15/05/2016
 * Time: 2:04 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name: BrandModel.php
 * @package: App
 * @author: nbchicong
 */
/**
 * Class BrandModel
 * @package App\Model
 */


namespace App\Model;

class BrandModel extends BaseModel {
  protected $table = 'product_brands';
  protected $fillable = array('name', 'code', 'intro', 'countView', 'position');
}