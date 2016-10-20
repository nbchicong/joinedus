<?php

namespace App\Model;

class CarouselModel extends BaseModel {
  protected $table = 'carousels';
  protected $fillable = array('productId', 'header', 'title', 'image', 'saleImage', 'message');
}
