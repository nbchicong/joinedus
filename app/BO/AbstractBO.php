<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 25/07/2016
 * Time: 8:47 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name: AbstractBO.php
 * @package: App\BO
 * @author: nbchicong
 */
/**
 * Class AbstractBO
 * @package App\BO
 */


namespace App\BO;


use Illuminate\Support\Facades\DB;

class AbstractBO {
  protected $tableName;
  private $queryTable;

  public function __construct() {
    $this->queryTable = DB::table($this->tableName);
  }

  protected function getDataTable() {
    return $this->queryTable;
  }

  protected function query() {
    
  }
}