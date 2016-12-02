<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 10/07/2016
 * Time: 7:44 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: ProductCategoryBO.php
 * @package: App\BO
 * @author: nbchicong
 */
/**
 * Class ProductCategoryBO
 * @package App\Bo
 */


namespace App\Bo;


use App\Model\ProductCategoryModel;

class ProductCategoryBO extends AbstractBO {
  public function init() {
    $this->tableName = 'product_category';
  }
  
  /**
   * @param String $keyword
   * @param int $limit
   * @param int $offset
   *
   * @return array|static[]
   */
  public function query($keyword, $limit, $offset) {
    return $this->getDbTable()
        ->where('name', 'LIKE', '%'.$keyword.'%')
        ->orWhere('code', 'LIKE', '%'.$keyword.'%')
        ->limit($limit)->offset($offset)
        ->get();
  }
}