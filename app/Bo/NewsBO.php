<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 11/12/2016
 * Time: 7:31 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : NewsBO.php
 * @package: App\Bo
 * @author : nbchicong
 */
/**
 * Class NewsBO
 * @package App\Bo
 */


namespace App\Bo;


use App\Utils\Constants;

class NewsBO extends AbstractBO {
  
  /**
   * @param string $keyword
   * @param int    $limit
   * @param int    $offset
   *
   * @return array|static[]
   */
  public function query($keyword, $limit, $offset) {
    $query = $this->getDbTable();
    if (!assertThat($keyword, isEmptyOrNullString())) {
      $query->where('title', 'LIKE', '%' . $keyword . '%')
          ->orWhere('code', 'LIKE', '%' . $keyword . '%')
          ->orWhere('content', 'LIKE', '%' . $keyword . '%');
    }
    if (isset($limit) && $limit > 0)
      $query->limit($limit);
    if (isset($offset) && $offset > 0)
      $query->offset($offset);
    $query->orderBy('created_at');
    return $query->get();
  }
  
  /**
   * @param string $id
   * @param string $code
   *
   * @return mixed
   */
  public function loadWithCode($id, $code) {
    return $this->getDbTable()
        ->where('id', $id)
        ->first();
  }
  
  /**
   * @return array|static[]
   */
  public function getNewest() {
    $query = $this->getDbTable();
    $query->orderBy('created_at')
        ->limit(Constants::ADMIN_PAGE_SIZE)
        ->offset(0);
    return $query->get();
  }
  
  /**
   * Init Database
   */
  public function init() {
    $this->tableName = 'entries';
  }
}