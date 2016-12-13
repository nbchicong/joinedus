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

use Illuminate\Support\Facades\Log;

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
    $query = $this->getDbTable();
    if (!assertThat($keyword, isEmptyOrNullString())) {
      $query->where('name', 'LIKE', '%' . $keyword . '%')
          ->orWhere('code', 'LIKE', '%' . $keyword . '%');
    }
    if (isset($limit) && $limit > 0)
      $query->limit($limit);
    if (isset($offset) && $offset > 0)
      $query->offset($offset);
    return $query->get();
  }
  
  /**
   * @return array|static[]
   */
  public function getParent() {
    return $this->getDbTable()
        ->where('parentCateId', '=', '')
        ->orWhereNull('parentCateId')
        ->get();
  }
  
  /**
   * @param string $parentId
   *
   * @return array|static[]
   */
  public function getChildren($parentId = '') {
    $this->getDbTable();
    if (!empty($parentId)) {
      return $this->getDbTable()->where('parentCateId', $parentId)->get();
    }
    return $this->getDbTable()
        ->where('parentCateId', '<>', '')
        ->get();
  }
}