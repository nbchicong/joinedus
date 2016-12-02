<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 15/05/2016
 * Time: 2:04 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name: EntryCategoryModel.php
 * @package: App
 * @author: nbchicong
 */
/**
 * Class EntryCategoryModel
 * @package App
 */


namespace App\Model;

class EntryCategoryModel extends BaseModel {
  protected $table = 'entry_category';
  protected $fillable = array('name', 'parentId');
}