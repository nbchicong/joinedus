<?php

namespace App\Model;

class SiteConfigModel extends BaseModel {
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
