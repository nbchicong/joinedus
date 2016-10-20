<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 25/06/2016
 * Time: 5:45 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: EntryModel.php
 * @package: App
 * @author: nbchicong
 */
/**
 * Class EntryModel
 * @package App
 */


namespace App\Model;


class EntryModel extends BaseModel {
  protected $primaryKey = 'id';
  protected $table = 'entries';
  protected $fillable = array('title', 'cateId', 'author', 'content', 'image', 'rating', 'tags');
}