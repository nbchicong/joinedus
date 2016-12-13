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
use Log;
use App\Bo\UserProfileBO;
use App\Data\DataServiceDTO;
use App\WebConstant;
use App\Model\User;
use App\Data\BooleanDTO;
use App\Http\Controllers\AbstractController;

class UserController extends AbstractController {
  /**
   * @var \App\Bo\UserProfileBO
   */
  private $bo;
  protected function index() {
    return view('admin.user', array('title'=>'Danh sách người dùng'));
  }
  protected function paging(Request $request) {
    $keyword = $this->getParams('keywords', $request);
    $offset = $this->getOffset($request);
    $dto = new DataServiceDTO(
        $this->bo->query($keyword, WebConstant::AD_PAGE_LIMIT, $offset * WebConstant::AD_PAGE_LIMIT),
        $this->bo->count()
    );
    return response()->json($dto->output());
  }
  
  private function getModel(User $model, Request $request) {
    $model->name = $this->getParams('name', $request);
    $model->email = $this->getParams('email', $request);
    $model->role = $this->getParams('role', $request);
    return $model;
  }
  
  protected function create(Request $request) {
    if ($this->getPrincipal($request) && $this->getPrincipal($request)->hasRole('SUPER_ADMIN')) {
      $user = new User();
      $user = $this->getModel($user, $request);
      $user->password = User::generatePassword();
      $dto = new BooleanDTO($this->bo->add($user->toArray()));
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
  protected function update(Request $request) {
    $userId = $this->getParams('id', $request);
    $userItem = $this->bo->load($userId);
    if ($userItem && $request->user()->hasRole('SUPER_ADMIN')) {
      Log::debug('Has role');
      /** @noinspection PhpParamsInspection */
      $userItem = $this->getModel($userItem, $request);
      $dto = new BooleanDTO($this->bo->update($userItem->toArray()));
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
  
  protected function delete(Request $request) {
    $userId = $this->getParams('id', $request);
    $userItem = $this->bo->load($userId);
    if ($userItem && $this->getPrincipal($request) && $this->getPrincipal($request)->hasRole('SUPER_ADMIN')) {
      $dto = new BooleanDTO($this->bo->delete($userId));
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
  
  /**
   * Init Controller
   */
  public function init() {
    // TODO: check role access
    $this->bo = new UserProfileBO();
  }
}
