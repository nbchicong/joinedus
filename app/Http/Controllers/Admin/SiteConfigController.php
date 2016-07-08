<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 08/07/2016
 * Time: 13:30 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: SiteConfigController.php
 * @package: App\Http\Controllers\Admin
 * @author: nbchicong
 */
/**
 * Class SiteConfigController
 * @package App\Http\Controllers\Admin
 */


namespace App\Http\Controllers\Admin;

use App\Utils\StringUtils;
use Log;
use App\Data\BooleanDTO;
use App\SiteConfigModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteConfigController extends Controller{
  protected function index() {
    return view('admin.config', array('title'=>'Cấu hình site'));
  }
  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function load(Request $request) {
    $id = $request->input('id');
    return response()->json(SiteConfigModel::find($id));
  }
  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  protected function update(Request $request) {
    $item = SiteConfigModel::first();
    Log::debug("Request");
    Log::debug($request);
    Log::debug("First item config");
    Log::debug($item);
    if ($request->user()->hasRole('ADMIN')) {
      $input = $request->all();
      if ($item) {
        $dto = new BooleanDTO($item->update($input));
        return response()->json($dto->output());
      } else {
        $item = new SiteConfigModel();
        $input = array_merge(array('id' => StringUtils::generateUuid()), $input);
        Log::debug($input);
        return response()->json($item->create($input));
      }
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
}