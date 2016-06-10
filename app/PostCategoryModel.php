<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 15/05/2016
 * Time: 2:04 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name: PostCategoryModel.php
 * @package: App
 * @author: nbchicong
 */
/**
 * Class PostCategoryModel
 * @package App
 */


namespace App;

class PostCategoryModel extends BaseModel {
  protected $primaryKey = 'id';
  protected $table = 'post_category';
  protected $fillable = array('name', 'parentId');
}