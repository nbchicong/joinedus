<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 30/07/2016
 * Time: 23:34
 * ---------------------------------------------------
 * Project:
 * @name: HomeController.php
 * @author: nbchicong
 */
/**
 * @package App\Http\Controllers\Web
 * @class RegisterController
 */

namespace App\Http\Controllers\Web;

use Log;
use App\Model\User;
use App\Http\Controllers\AbstractController;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Request;

class RegisterController extends AbstractController {
    public function __construct() {
        parent::__construct();
        $this->model = new User();
    }

    protected function index() {
        return view('register', array(
          'page' => 'register'
        ));
    }

    protected function register(Request $request) {
      /**
       * @type User
       */
        $user = $this->getModel($request);
        $user->setPassword(Hash::make($user->getPassword()));
        if($user->save()) {
          return redirect()->guest('login');
        }
    }
}