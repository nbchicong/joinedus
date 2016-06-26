<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 16/05/2016
 * Time: 5:49 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: BrandController.php
 * @package: App\Http\Controllers\Admin
 * @author: nbchicong
 */
/**
 * Class BrandController
 * @package App\Http\Controllers\Admin
 */


namespace App\Http\Controllers\Admin;

use App\BrandModel;
use App\Data\BooleanDTO;
use App\Utils\StringUtils;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandController extends Controller{
  protected function index() {
    return view('admin.brand', array('title'=>'Danh sách nhà sản xuất'));
  }
  protected function listCate() {
    return response()->json(BrandModel::paginate(0));
  }

  private function getModel(BrandModel $model, Request $request) {
    $model->name = $request->input('name');
    $model->code = StringUtils::replace2Code($model->name);
    $model->intro = $request->input('intro');
    return $model;
  }
  protected function create(Request $request) {
    $item = new BrandModel();
    $item = $this->getModel($item, $request);
    $dto = new BooleanDTO($item->save());
    return response()->json($dto->output());
  }
  protected function update(Request $request) {
    $itemId = $request->input('id');
    if (!empty($itemId) && $request->user()->hasRole('ADMIN')) {
      $item = BrandModel::find($itemId);
      if ($item) {
        $item = $this->getModel($item, $request);
        $dto = new BooleanDTO($item->save());
        return response()->json($dto->output());
      }
      $dto = new BooleanDTO(false);
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
  protected function delete(Request $request) {
    $itemId = $request->input('id');
    if (!empty($itemId) && $request->user()->hasRole('ADMIN')) {
      $item = BrandModel::find($itemId);
      if ($item) {
        $dto = new BooleanDTO($item->delete());
        return response()->json($dto->output());
      }
      $dto = new BooleanDTO(false);
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
}