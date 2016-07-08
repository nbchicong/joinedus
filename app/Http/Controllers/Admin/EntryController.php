<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 25/06/2016
 * Time: 5:16 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: EntryController.php
 * @package: App\Http\Controllers\Admin
 * @author: nbchicong
 */
/**
 * Class EntryController
 * @package App\Http\Controllers\Admin
 */


namespace App\Http\Controllers\Admin;

use Log;
use App\Data\BooleanDTO;
use App\EntryCategoryModel;
use App\EntryModel;
use App\Utils\StringUtils;
use App\Http\Controllers\FileEntryController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntryController extends Controller {
  protected function index() {
    return view('admin.entry', array(
        'title'=>'Danh sách bài viết',
        'cateList' => EntryCategoryModel::paginate(0)
    ));
  }

  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function load(Request $request) {
    $id = $request->input('id');
    return response()->json(EntryModel::find($id));
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   */
  protected function listItems() {
    return response()->json(EntryModel::paginate(0));
  }

  /**
   * @param EntryModel $entry
   * @param Request $request
   * @return EntryModel
   */
  private function getModel(EntryModel $entry, Request $request) {
    Log::debug('Request');
    Log::debug($request);
    $fileStore = new FileEntryController();
    $entry->title = $request->input('title');
    $entry->code = StringUtils::replace2Code($entry->title);
    $entry->cateId = $request->input('cateId');
    $entry->author = $request->user()->getUsername();
    $entry->content = $request->input('content');
    $entry->rating = $request->input('rating');
    $entry->tags = $request->input('tags');
    $file = $fileStore->saveToLocal();
    if (isset($file->code)) {
      $entry->image = $file->code;
    }
    return $entry;
  }

  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function create(Request $request) {
    $entry = new EntryModel();
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
      $entry = EntryModel::find($id);
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
      $entry = EntryModel::find($id);
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
}