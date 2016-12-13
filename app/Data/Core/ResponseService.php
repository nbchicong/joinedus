<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 05/12/2016
 * Time: 10:14 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : ResponseService.php
 * @package: App\Data\Core
 * @author : nbchicong
 */
/**
 * Class ResponseService
 * @package App\Data\Core
 */


namespace App\Data\Core;


use App\Data\BaseDTO;

class ResponseService {
  
  /** @noinspection PhpMissingParentConstructorInspection */
  /**
   * ResponseService constructor.
   *
   * @param BaseDTO $dto
   * @param int     $status
   * @param array   $headers
   */
  public function __construct($dto) {
    return response()->json($dto->output());
  }
}