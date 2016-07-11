<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 25/06/2016
 * Time: 5:16 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: CarouselController.php
 * @package: App\Http\Controllers\Admin
 * @author: nbchicong
 */
/**
 * Class CarouselController
 * @package App\Http\Controllers\Admin
 */


namespace App\Http\Controllers\Admin;

use Log;
use App\Data\BooleanDTO;
use App\ProductModel;
use App\CarouselModel;
use App\Http\Controllers\FileEntryController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarouselController extends Controller {
  protected function index() {
    return view('admin.carousel', array(
        'title'=>'Banner slider',
        'productList' => ProductModel::paginate(0)
    ));
  }

  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function load(Request $request) {
    $id = $request->input('id');
    return response()->json(CarouselModel::find($id));
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   */
  protected function listItems() {
    return response()->json(CarouselModel::paginate(0));
  }

  /**
   * @param CarouselModel $entry
   * @param Request $request
   * @return CarouselModel
   */
  private function getModel(CarouselModel $entry, Request $request) {
    Log::debug('Request');
    Log::debug($request);
    $fileStore = new FileEntryController();
    $entry->header = $request->input('header');
    $entry->title = $request->input('title');
    $entry->productId = $request->input('productId');
    $entry->message = $request->input('message');
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
    if ($request->user()->hasRole('ADMIN')) {
      $entry = new CarouselModel();
      $entry = $this->getModel($entry, $request);
      $dto = new BooleanDTO($entry->save());
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }

  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function update(Request $request) {
    $id = $request->input('id');
    if (!empty($id) && $request->user()->hasRole('ADMIN')) {
      $entry = CarouselModel::find($id);
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
    if (!empty($id) && $request->user()->hasRole('ADMIN')) {
      $entry = CarouselModel::find($id);
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