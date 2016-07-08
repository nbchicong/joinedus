<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageContentModel extends Model {
  protected $primaryKey = 'id';
  protected $table = 'page_content';
  protected $fillable = array('title', 'code', 'author', 'content', 'tags');
}
