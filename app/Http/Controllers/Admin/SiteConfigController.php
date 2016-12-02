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

use Illuminate\Http\Request;
use Log;
use App\Utils\StringUtils;
use App\Data\BooleanDTO;
use App\Model\SiteConfigModel;
use App\Http\Controllers\AbstractController;

class SiteConfigController extends AbstractController {
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
    if ($request->user()->hasRole('ADMIN')) {
      $input = $request->all();
      Log::debug($request->all());
      Log::debug($item);
      if ($item) {
        $item->siteName = $request->siteName;
        $item->siteCode = $request->siteCode;
        $item->siteLogo = $request->siteLogo;
        $item->siteDescription = $request->siteDescription;
        $item->siteTitle = $request->siteTitle;
        $item->keywords = $request->keywords;
        $item->tags = $request->tags;
        $item->author = $request->author;
        $item->copyright = $request->copyright;
        $item->phone = $request->phone;
        $item->email = $request->email;
        $item->address = $request->address;
        $item->language = $request->language;
        $item->currency = $request->currency;
        $item->status = $request->status;
        $item->pendingPage = $request->pendingPage;
        $item->facebookAcc = $request->facebookAcc;
        $item->zaloAcc = $request->zaloAcc;
        $item->gplusAcc = $request->gplusAcc;
        $item->linkedinAcc = $request->linkedinAcc;
        
        $dto = new BooleanDTO($item->save());
        return response()->json($dto->output());
      } else {
        $item = new SiteConfigModel();
        $input = array_merge(array('id' => StringUtils::generateUuid()), $input);
        return response()->json($item->create($input));
      }
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
  
  /**
   * Init Controller
   */
  public function init() {
    // TODO: Implement init() method.
  }
}