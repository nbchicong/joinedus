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

use Illuminate\Http\Request;
use App\Model\User;
use App\Data\BooleanDTO;
use App\Http\Controllers\AbstractController;

class UserController extends AbstractController {
  protected function index() {
    return view('admin.user', array('title'=>'Danh sách người dùng'));
  }
  protected function listUser() {
//    $dto = new ListDTO(ProductCategoryModel::paginate(0));
    return response()->json(User::paginate(0));
  }
  protected function create(Request $request) {
    $user = User::create($request->all());
    $dto = new BooleanDTO(isset($user->id));
    return response()->json($dto->output());
  }
  protected function update(Request $request) {
    $userId = $request->input('id');
    $userItem = User::find($userId);
    if ($userItem && $request->user()->hasRole('SUPER_ADMIN')) {
      $userItem->name = $request->input('name');
      $userItem->email = $request->input('email');
      $userItem->role = $request->input('role');
      $dto = new BooleanDTO($userItem->save());
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
  protected function delete(Request $request) {
    $userId = $request->input('id');
    $userItem = User::find($userId);
    if ($userItem && $request->user()->hasRole('SUPER_ADMIN')) {
      $dto = new BooleanDTO($userItem->delete());
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
}
