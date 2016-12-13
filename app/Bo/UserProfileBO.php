<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 05/12/2016
 * Time: 10:02 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : UserProfileBO.php
 * @package: App\Bo
 * @author : nbchicong
 */
/**
 * Class UserProfileBO
 * @package App\Bo
 */


namespace App\Bo;


class UserProfileBO extends AbstractBO {
  
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
          ->orWhere('code', 'LIKE', '%' . $keyword . '%');
    }
    if (isset($limit) && $limit > 0)
      $query->limit($limit);
    if (isset($offset) && $offset > 0)
      $query->offset($offset);
    $query->select(['id', 'name', 'email', 'role']);
    return $query->get();
  }
  
  /**
   * Init Database
   */
  public function init() {
    $this->tableName = 'users';
  }
}