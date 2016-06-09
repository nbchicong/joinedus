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
  protected function create(Request $request) {
    $item = BrandModel::create($request->all());
    $dto = new BooleanDTO(isset($item->id));
    return response()->json($dto->output());
  }
  protected function update(Request $request) {
    $itemId = $request->input('id');
    $item = BrandModel::find($itemId);
    if ($item && $request->user()->hasRole('ADMIN')) {
      $item->name = $request->input('name');
      $item->intro = $request->input('intro');
      $dto = new BooleanDTO($item->save());
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
  protected function delete(Request $request) {
    $itemId = $request->input('id');
    $item = BrandModel::find($itemId);
    if ($item && $request->user()->hasRole('ADMIN')) {
      $dto = new BooleanDTO($item->delete());
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
}