<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 08/07/2016
 * Time: 13:21 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: PageContentController.php
 * @package: App\Http\Controllers\Admin
 * @author: nbchicong
 */
/**
 * Class PageContentController
 * @package App\Http\Controllers\Admin
 */


namespace App\Http\Controllers\Admin;

use App\Data\BooleanDTO;
use App\PageContentModel;
use App\Utils\StringUtils;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageContentController extends Controller{
  protected function index() {
    return view('admin.page-content', array('title'=>'Danh sách trang nội dung'));
  }
  /**
   * @param PageContentModel $model
   * @param Request $request
   * @return \App\PageContentModel
   */
  private function getModel(PageContentModel $model, Request $request) {
    $model->title = $request->input('title');
    $model->code = StringUtils::replace2Code($model->name);
    $model->author = $request->user()->getUsername();
    $model->content = $request->input('content');
    $model->tags = $request->input('tags');
    return $model;
  }
  /**
   * @return \Illuminate\Http\JsonResponse
   */
  protected function listItems() {
    return response()->json(PageContentModel::paginate(0));
  }
  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function load(Request $request) {
    $id = $request->input('id');
    return response()->json(PageContentModel::find($id));
  }
  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function create(Request $request) {
    $item = new PageContentModel();
    $item = $this->getModel($item, $request);
    $dto = new BooleanDTO($item->save());
    return response()->json($dto->output());
  }
  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function update(Request $request) {
    $itemId = $request->input('id');
    if (!empty($itemId) && $request->user()->hasRole('WRITER')) {
      $item = PageContentModel::find($itemId);
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
  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function delete(Request $request) {
    $itemId = $request->input('id');
    if (!empty($itemId) && $request->user()->hasRole('WRITER')) {
      $item = PageContentModel::find($itemId);
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