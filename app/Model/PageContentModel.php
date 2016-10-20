<?php

namespace App\Model;

class PageContentModel extends BaseModel {
  protected $primaryKey = 'id';
  protected $table = 'page_content';
  protected $fillable = array('title', 'code', 'author', 'content', 'tags');
}
