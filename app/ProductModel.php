<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 15/05/2016
 * Time: 2:04 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name: ProductModel.php
 * @package: App
 * @author: nbchicong
 */
/**
 * Class ProductModel
 * @package App
 */

namespace App;

class ProductModel extends BaseModel {
  protected $primaryKey = 'id';
  protected $table = 'product_category';
  protected $fillable = array('name', 'parentCateId');
}