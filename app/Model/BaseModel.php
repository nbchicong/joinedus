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
 * @package App\Model
 */


namespace App\Model;

use App\Data\DbConstant;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model {
  protected $primaryKey = DbConstant::ID_KEY;
  public function getClassName() {
    return get_class($this);
  }
}