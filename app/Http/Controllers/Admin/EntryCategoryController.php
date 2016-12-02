<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 25/06/2016
 * Time: 6:22 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: EntryCategoryController.php
 * @package: App\Http\Controllers\Admin
 * @author: nbchicong
 */
/**
 * Class EntryCategoryController
 * @package App\Http\Controllers\Admin
 */


namespace App\Http\Controllers\Admin;


use App\Data\BooleanDTO;
use App\Model\EntryCategoryModel;
use App\Http\Controllers\AbstractController;
use App\Utils\StringUtils;
use Illuminate\Http\Request;

class EntryCategoryController extends AbstractController {
  protected function index() {
    return view('admin.entry-category', array(
        'title'=>'Danh sách bài viết',
        'cateList' => EntryCategoryModel::paginate(0)
    ));
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   */
  protected function listItems() {
    return response()->json(EntryCategoryModel::paginate(0));
  }

  /**
   * @param EntryCategoryModel $entry
   * @param Request $request
   * @return EntryCategoryModel
   */
  private function getModel(EntryCategoryModel $entry, Request $request) {
    $entry->name = $request->input('name');
    $entry->code = StringUtils::replace2Code($entry->name);
    $entry->parentId = $request->input('parentId');
    return $entry;
  }

  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function create(Request $request) {
    $entry = new EntryCategoryModel();
    $entry = $this->getModel($entry, $request);
    $dto = new BooleanDTO($entry->save());
    return response()->json($dto->output());
  }

  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function update(Request $request) {
    $id = $request->input('id');
    if (!empty($id) && $request->user()->hasRole('WRITER')) {
      $entry = EntryCategoryModel::find($id);
      if ($entry) {
        $entry = $this->getModel($entry, $request);
        $dto = new BooleanDTO($entry->save());
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
    $id = $request->input('id');
    if (!empty($id) && $request->user()->hasRole('WRITER')) {
      $entry = EntryCategoryModel::find($id);
      if ($entry) {
        $dto = new BooleanDTO($entry->delete());
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