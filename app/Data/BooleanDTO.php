<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 21/05/2016
 * Time: 1:33 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name: BooleanDTO.php
 * @package: App\Data
 * @author: nbchicong
 */
/**
 * Class BooleanDTO
 * @package App\Data
 */


namespace App\Data;


class BooleanDTO extends BaseDTO {
  private $success = false;

  /**
   * BooleanDTO constructor.
   * @param bool $success
   */
  public function __construct($success) {
    $this->success = $success;
  }

  /**
   * @return boolean
   */
  public function isSuccess() {
    return $this->success;
  }

  /**
   * @param boolean $success
   */
  public function setSuccess($success) {
    $this->success = $success;
  }

  public function output() {
    return array('success'=>$this->isSuccess());
  }
}