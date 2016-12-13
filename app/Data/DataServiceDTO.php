<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 03/12/2016
 * Time: 4:02 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : DataServiceDTO.php
 * @package: App\Data
 * @author : nbchicong
 */
/**
 * Class DataServiceDTO
 * @package App\Data
 */


namespace App\Data;

use Log;

class DataServiceDTO extends BaseDTO {
  
  /**
   * DataServiceDTO constructor.
   *
   * @param array $items
   * @param       $total
   */
  public function __construct(array $items, $total) {
    parent::__construct($items);
    $this->setTotal(isset($total)?$total:count($items));
    return $this;
  }
  
  public function output() {
    return array(
      'total' => $this->getTotal(),
      'data' => $this->getItems()
    );
  }
}