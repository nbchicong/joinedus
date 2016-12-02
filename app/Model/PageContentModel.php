<?php

namespace App\Model;

class PageContentModel extends BaseModel {
  protected $table = 'page_content';
  protected $fillable = array('title', 'code', 'author', 'content', 'tags');
}
