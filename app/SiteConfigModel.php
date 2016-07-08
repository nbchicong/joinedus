<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteConfigModel extends Model {
  protected $table = 'site_config';
  protected $fillable = array(
      'siteName',
      'siteCode',
      'siteLogo',
      'siteTitle',
      'author',
      'copyright',
      'phone',
      'email',
      'address',
      'language',
      'currency'
  );
}
