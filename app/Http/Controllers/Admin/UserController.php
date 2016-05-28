<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 27/05/2016
 * Time: 6:15 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: UserController.php
 * @package: App\Http\Controllers\Admin
 * @author: nbchicong
 */
/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */


namespace App\Http\Controllers\Admin;

use App\User;
use App\Data\BooleanDTO;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller {
  protected function index() {
    return view('admin.user.index', array(
            'categoryList' => User::paginate(0),
            'title'=>'Danh sách người dùng')
    );
  }
  protected function listUser() {
//    $dto = new ListDTO(ProductCategoryModel::paginate(0));
    return response()->json(User::paginate(0));
  }
  protected function create(Request $request) {
    $user = new User();
    $user = $user->create($request->all());
    $dto = new BooleanDTO(isset($user->id));
    return response()->json($dto->output());
  }
  protected function update(Request $request) {
    $user = new User();
    $user = $user->find($request->id);
    $dto = new BooleanDTO($user->save($request->all()));
    return response()->json($dto->output());
  }
  protected function delete(Request $request) {
    $user = new User();
    $user = $user->find($request->input('id'));
    $dto = new BooleanDTO($user->delete());
    return response()->json($dto->output());
  }
}
