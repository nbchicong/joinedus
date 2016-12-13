<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 04/12/2016
 * Time: 10:24 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name   : StorageUtils.php
 * @package: App\Utils
 * @author : nbchicong
 */
/**
 * Class StorageUtils
 * @package App\Utils
 */

namespace App\Utils;

use App\WebConstant;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StorageUtils {
  
  /**
   * @return \Illuminate\Contracts\Filesystem\Filesystem
   */
  public static function getPublicDisk() {
    return Storage::disk(WebConstant::PUBLIC_STORAGE);
  }
  
  /**
   * @param $fileName
   *
   * @return string
   */
  public static function loadByName($fileName)  {
    return StorageUtils::getPublicDisk()->get($fileName);
  }
  
  /**
   * @param string       $fileName
   * @param UploadedFile $file
   */
  public static function save($fileName, UploadedFile $file) {
    StorageUtils::getPublicDisk()->put($fileName, File::get($file));
  }
  
  /**
   * @param $fileName
   *
   * @return mixed
   */
  public static function delete($fileName)  {
    return Storage::delete($fileName);
  }
  
  /**
   * @param $fileName
   *
   * @return string
   */
  public static function getFilePath($fileName) {
    return Storage::url($fileName);
  }
}