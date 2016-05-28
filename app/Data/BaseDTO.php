<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 21/05/2016
 * Time: 1:20 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name: BaseDTO.php
 * @package: App\Data
 * @author: nbchicong
 */
/**
 * Class BaseDTO
 * @package App\Data
 */


namespace App\Data;


abstract class BaseDTO {
  private $items = array();
  private $total = 0;

  /**
   * BaseDTO constructor.
   * @param array $items
   */
  public function __construct(array $items){
    $this->items = $items;
    $this->total = count($items);
  }

  /**
   * @return array
   */
  public function getItems() {
    return $this->items;
  }

  /**
   * @param array $items
   */
  public function setItems($items) {
    $this->items = $items;
  }

  /**
   * @return int
   */
  public function getTotal() {
    return $this->total;
  }

  /**
   * @param int $total
   */
  public function setTotal($total) {
    $this->total = $total;
  }

  public function output() {
    return array(
      'total' => $this->getTotal(),
      'items' => $this->getItems()
    );
  }

}