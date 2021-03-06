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
 * @package App\Bo
 */


namespace App\Bo;


use App\Data\DbConstant;
use App\Model\BaseModel;
use Illuminate\Support\Facades\DB;

abstract class AbstractBO implements DatabaseImpl {
  protected $tableName;
  
  public function __construct() {
    $this->init();
  }
  
  /**
   * @param $query
   *
   * @return mixed
   */
  protected function executeQuery($query) {
    return DB::raw($query);
  }
  
  /**
   * Get Query Table
   * @return \Illuminate\Database\Query\Builder
   */
  protected function getDbTable() {
    return DB::table($this->tableName);
  }
  
  /**
   * @return int
   */
  public function count() {
    return $this->getDbTable()->offset(-1)->count('*');
  }
  
  /**
   * @param String $id
   * @return array|static[]
   */
  public function load($id) {
    return $this->getDbTable()->where(DbConstant::ID_KEY, $id)->get();
  }
  
  /**
   * @param BaseModel $model
   * @return bool
   */
  public function add($model) {
    $this->getDbTable()->insert($model->toArray());
    return true;
  }
  
  /**
   * @param BaseModel $model
   * @return bool
   */
  public function update($model) {
    $this->getDbTable()
        ->where(DbConstant::ID_KEY, $model[DbConstant::ID_KEY])
        ->update($model->toArray());
    return true;
  }
  
  /**
   * @param String $id
   * @return bool
   */
  public function delete($id) {
    $this->getDbTable()->where(DbConstant::ID_KEY, $id)->delete();
    return true;
  }
}