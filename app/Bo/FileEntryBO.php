<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 03/12/2016
 * Time: 3:12 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : FileEntryBO.php
 * @package: App\Bo
 * @author : nbchicong
 */
/**
 * Class FileEntryBO
 * @package App\Bo
 */


namespace App\Bo;


class FileEntryBO extends AbstractBO {
  
  /**
   * @param $keyword
   * @param $limit
   * @param $offset
   *
   * @return array|static[]
   */
  public function query($keyword, $limit, $offset) {
    return $this->getDbTable()
        ->where('filename', 'LIKE', '%'.$keyword.'%')
        ->orWhere('code', 'LIKE', '%'.$keyword.'%')
        ->orWhere('original_filename', 'LIKE', '%'.$keyword.'%')
        ->limit($limit)->offset($offset)
        ->get();
  }
  
  /**
   * @param string $code
   *
   * @return mixed
   */
  public function loadByCode($code) {
    return $this->getDbTable()->where('code', $code)->first();
  }
  
  /**
   * @param $name
   *
   * @return mixed
   */
  public function loadByName($name) {
    return $this->getDbTable()->where('filename', $name)->first();
  }
  
  public function init() {
    $this->tableName = 'file_store';
  }
}