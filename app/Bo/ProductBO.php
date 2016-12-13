<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 10/12/2016
 * Time: 5:32 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : ProductBO.php
 * @package: App\Bo
 * @author : nbchicong
 */
/**
 * Class ProductBO
 * @package App\Bo
 */


namespace App\Bo;


use App\Utils\Constants;

class ProductBO extends AbstractBO {
  
  /**
   * @param $keyword
   * @param $limit
   * @param $offset
   *
   * @return array|static[]
   */
  public function query($keyword, $limit, $offset) {
    $query = $this->getDbTable();
    if (!assertThat($keyword, isEmptyOrNullString())) {
      $query->where('name', 'LIKE', '%' . $keyword . '%')
          ->orWhere('nameCode', 'LIKE', '%' . $keyword . '%')
          ->orWhere('details', 'LIKE', '%' . $keyword . '%');
    }
    if (isset($limit) && $limit > 0)
      $query->limit($limit);
    if (isset($offset) && $offset > 0)
      $query->offset($offset);
    $query->select();
    return $query->get();
  }
  
  /**
   * @return array|static[]
   */
  public function getFeature() {
    return $this->getDbTable()
        ->orWhere('feature', 1)
        ->limit(Constants::HOME_FEATURE_PRODUCT_SIZE)
        ->get();
  }
  
  /**
   * @return array|static[]
   */
  public function getNewest() {
    $query = $this->getDbTable();
    $query->where('countView', '=', 0)
        ->orderBy('created_at')
        ->limit(Constants::HOME_NEW_PRODUCT_SIZE)
        ->offset(0);
    return $query->get();
  }
  
  /**
   * @param string $cateId
   * @param int    $limit
   * @param int    $offset
   *
   * @return array|static[]
   */
  public function queryByCate($cateId, $limit, $offset) {
    $query = $this->getDbTable()->where('categoryId', $cateId);
    if (isset($limit) && $limit > 0)
      $query->limit($limit);
    if (isset($offset) && $offset > 0)
      $query->offset($offset);
    return $query->get();
  }
  
  public function updateCountView($productId) {
    $this->getDbTable()->where('id', $productId)->increment('countView', 1);
  }
  
  /**
   * Init Database
   */
  public function init() {
    $this->tableName = 'products';
  }
}