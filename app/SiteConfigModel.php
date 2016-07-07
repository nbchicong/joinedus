<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteConfigModel extends Model {
  protected $table = 'site_config';
  protected $fillable = array('title', 'cateId', 'author', 'content', 'image', 'rating', 'tags');
}
