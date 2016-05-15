<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 15/05/2016
 * Time: 2:04 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name: BaseModel.php
 * @package: App
 * @author: nbchicong
 */
/**
 * Class BaseModel
 * @package App
 */


namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BaseModel extends Model {
  public function select($sql_stmt) {
    return DB::select($sql_stmt);
  }

  public function queryDb($sql_stmt) {
    DB::statement($sql_stmt);
  }
}