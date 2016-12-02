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

use App\Model\BrandModel;
use App\Data\BooleanDTO;
use App\Utils\StringUtils;
use App\Http\Controllers\AbstractController;
use Illuminate\Http\Request;

class BrandController extends AbstractController {
  protected function index() {
    return view('admin.brand', array('title'=>'Danh sách nhà sản xuất'));
  }
  protected function listCate() {
    return response()->json(BrandModel::paginate(0));
  }

  private function getModel(BrandModel $model, Request $request) {
    $model->name = $this->getParams('name');
    $model->code = StringUtils::replace2Code($model->name);
    $model->intro = $this->getParams('intro');
    $model->position = $this->getParams('position');
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
    if (!empty($itemId) && $this->getPrincipal()->hasRole('ADMIN')) {
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
  
  /**
   * Init Controller
   */
  public function init()
  {
    // TODO: Implement init() method.
  }
}