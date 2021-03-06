<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 26/06/2016
 * Time: 10:31 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name: StringUtils.php
 * @package: App\Utils
 * @author: nbchicong
 */
/**
 * Class StringUtils
 * @package App\Utils
 */


namespace App\Utils;


class StringUtils {
  public static function generateUuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
  }
  public static function removeAccents($str) {
    $unwanted_array = array(
        'Š' => 'S', 'š' => 's',
        'Ž' => 'Z', 'ž' => 'z',
        'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A',
        'À' => 'A', 'Á' => 'A', 'Ạ' => 'A', 'Ã' => 'A', 'Ả' => 'A',
        'Ă' => 'A', 'Ằ' => 'A', 'Ắ' => 'A', 'Ặ' => 'A', 'Ẵ' => 'A', 'Ẳ' => 'A',
        'Â' => 'A', 'Ầ' => 'A', 'Ấ' => 'A', 'Ậ' => 'A', 'Ẫ' => 'A', 'Ẩ' => 'A',
        'Ç' => 'C',
        'Đ' => 'D',
        'Ë' => 'E',
        'È' => 'E', 'É' => 'E', 'Ẹ' => 'E', 'Ẽ' => 'E', 'Ẻ' => 'E',
        'Ê' => 'E', 'Ề' => 'E', 'Ế' => 'E', 'Ệ' => 'E', 'Ễ' => 'E', 'Ể' => 'E',
        'Î' => 'I', 'Ï' => 'I',
        'Ì' => 'I', 'Í' => 'I', 'Ị' => 'I', 'Ĩ' => 'I', 'Ỉ' => 'I',
        'Ñ' => 'N',
        'Ö' => 'O', 'Ø' => 'O',
        'Ò' => 'O', 'Ó' => 'O', 'Ọ' => 'O', 'Õ' => 'O', 'Ỏ' => 'O',
        'Ô' => 'O', 'Ồ' => 'O', 'Ố' => 'O', 'Ộ' => 'O', 'Ỗ' => 'O', 'Ổ' => 'O',
        'Ơ' => 'O', 'Ờ' => 'O', 'Ớ' => 'O', 'Ợ' => 'O', 'Ỡ' => 'O', 'Ở' => 'O',
        'Û' => 'U', 'Ü' => 'U',
        'Ù' => 'U', 'Ú' => 'U', 'Ụ' => 'U', 'Ũ' => 'U', 'Ủ' => 'U',
        'Ư' => 'U', 'Ừ' => 'U', 'Ứ' => 'U', 'Ự' => 'U', 'Ữ' => 'U', 'Ử' => 'U',
        'Ỳ' => 'Y', 'Ý' => 'Y', 'Ỵ' => 'Y', 'Ỹ' => 'Y', 'Ỷ' => 'Y',
        'Þ' => 'B', 'ß' => 'Ss',
        'ä' => 'a', 'å' => 'a', 'æ' => 'a',
        'à' => 'a', 'á' => 'a', 'ạ' => 'a', 'ã' => 'a', 'ả' => 'a',
        'ă' => 'a', 'ằ' => 'a', 'ắ' => 'a', 'ặ' => 'a', 'ẵ' => 'a', 'ẳ' => 'a',
        'â' => 'a', 'ầ' => 'a', 'ấ' => 'a', 'ậ' => 'a', 'ẫ' => 'a', 'ẩ' => 'a',
        'ç' => 'c',
        'đ' => 'd',
        'ë' => 'e',
        'è' => 'e', 'é' => 'e', 'ẹ' => 'e', 'ẽ' => 'e', 'ẻ' => 'e',
        'ê' => 'e', 'ề' => 'e', 'ế' => 'e', 'ệ' => 'e', 'ễ' => 'e', 'ể' => 'e',
        'î' => 'i', 'ï' => 'i',
        'ì' => 'i', 'í' => 'i', 'ị' => 'i', 'ĩ' => 'i', 'ỉ' => 'i',
        'ñ' => 'n',
        'ð' => 'o', 'ö' => 'o', 'ø' => 'o',
        'ò' => 'o', 'ó' => 'o', 'ọ' => 'o', 'õ' => 'o', 'ỏ' => 'o',
        'ô' => 'o', 'ồ' => 'o', 'ố' => 'o', 'ộ' => 'o', 'ỗ' => 'o', 'ổ' => 'o',
        'ơ' => 'o', 'ờ' => 'o', 'ớ' => 'o', 'ợ' => 'o', 'ỡ' => 'o', 'ở' => 'o',
        'û' => 'u',
        'ù' => 'u', 'ú' => 'u', 'ụ' => 'u', 'ũ' => 'u', 'ủ' => 'u',
        'ư' => 'u', 'ừ' => 'u', 'ứ' => 'u', 'ự' => 'u', 'ữ' => 'u', 'ử' => 'u',
        'ÿ' => 'y',
        'ỳ' => 'y', 'ý' => 'y', 'ỵ' => 'y', 'ỹ' => 'y', 'ỷ' => 'y',
        'þ' => 'b');
    return strtr($str, $unwanted_array);
  }

  public static function replace2Code($str) {
    return str_replace(" ", "-", trim(strtolower(StringUtils::removeAccents($str))));
  }

  public static function isEmpty($str) {
    return $str == '' || $str == ' ' || $str == null;
  }
}