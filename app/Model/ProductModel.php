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

namespace App\Model;

class ProductModel extends BaseModel {
  protected $primaryKey = 'id';
  protected $table = 'products';
  protected $fillable = array(
      'name',
      'code',
      'categoryId',
      'brandId',
      'imageCodes',
      'imagePaths',
      'quantity',
      'availability',
      'price',
      'promotions',
      'discount',
      'details',
      'tags',
      'rating');
}