<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselModel extends Model {
  protected $table = 'carousels';
  protected $fillable = array('productId', 'header', 'title', 'image', 'saleImage', 'message');
}
