<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 14/05/2016
 * Time: 12:30 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: HomeController.php
 * @author: nbchicong
 */
/**
 * @package App\Http\Controllers\Web
 * @class HomeController
 */


namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller{
//  protected $redirectTo = '/index';

  protected function index() {
    return view('home', ['name'=>'Chí Công']);
  }
}