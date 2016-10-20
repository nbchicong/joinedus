<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 01/08/2016
 * Time: 7:24 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: ClazzUtils.php
 * @package: App\Utils
 * @author: nbchicong
 */
/**
 * Class ClazzUtils
 * @package App\Utils
 */


namespace App\Utils;

use Log;

class ClazzUtils {
  /**
   * Get Properties of Class
   * @param $clazz
   * @return array
   */
  public static function getProperties($clazz) {
    if (is_string($clazz))
      $clazz = new $clazz();
    $reflectObj = new \ReflectionObject($clazz);
    $destProperties = array();
    foreach ($reflectObj->getProperties() as $property) {
      $property->setAccessible(true);
      $destProperties[$property->getName()] = $property->getValue($clazz);
    }
    return $destProperties;
  }
  public static function convertClazz($srcClass, $destClass) {
    if (is_string($destClass))
      $destClass = new $destClass();
    $source = new \ReflectionObject($srcClass);
    $dest = new \ReflectionObject($destClass);
    $properties = $source->getProperties();
    foreach ($properties as $property) {
      $property->setAccessible(true);
      $name = $property->getName();
      $value = $property->getValue($srcClass);
      if ($dest->hasProperty($name)) {
        $prop = $dest->getProperty($name);
        $prop->setAccessible(true);
        $prop->setValue($destClass, $value);
      } else {
        $destClass->{$name} = $value;
      }
    }
    return $destClass;
  }
}