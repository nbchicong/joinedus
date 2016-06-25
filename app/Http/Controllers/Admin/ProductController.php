<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 06/06/2016
 * Time: 11:57 PM
 * ---------------------------------------------------
 * Project: laravel
 * @name: ProductController.php
 * @package: App\Http\Controllers\Admin
 * @author: nbchicong
 */
/**
 * Class ProductController
 * @package App\Http\Controllers\Admin
 */


namespace App\Http\Controllers\Admin;

use Log;
use App\BrandModel;
use App\ProductCategoryModel;
use App\ProductModel;
use App\Data\BooleanDTO;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller {
  protected function index() {
    return view('admin.product', array(
        'title'=>'Danh sách sản phẩm',
        'categoryList' => ProductCategoryModel::paginate(0),
        'brandList' => BrandModel::paginate(0)
    ));
  }

  protected function load(Request $request) {
    $id = $request->input('id');
    return response()->json(ProductModel::find($id));
  }
  protected function listItems() {
    return response()->json(ProductModel::paginate(0));
  }
  protected function create(Request $request) {
    Log::debug('Request');
    Log::debug($request);
    $fileStore = new FileEntryController();
    $product = new ProductModel();
    $product->name = $request->input('product_name');
    $product->code = $request->input('code');
    $product->categoryId = $request->input('categoryId');
    $product->brandId = $request->input('brandId');
    $product->quantity = $request->input('quantity');
    $product->availability = $request->input('availability');
    $product->price = $request->input('price');
    $product->promotions = $request->input('promotions');
    $product->discount = $request->input('discount');
    $product->details = $request->input('details');
    $product->tags = $request->input('tags');
    $product->rating = 0;
    $file = $fileStore->saveToLocal();
    if (isset($file->code)) {
      $product->imageCodes = $file->code;
      $product->imagePaths = $file->mimetype;
    }
    $dto = new BooleanDTO($product->save());
    return response()->json($dto->output());
  }
  protected function update(Request $request) {
    $itemId = $request->input('id');
    $product = ProductModel::find($itemId);
    if ($product && $request->user()->hasRole('ADMIN')) {
      $fileStore = new FileEntryController();
      $product->name = $request->input('product_name');
      $product->code = $request->input('code');
      $product->categoryId = $request->input('categoryId');
      $product->brandId = $request->input('brandId');
      $product->quantity = $request->input('quantity');
      $product->availability = $request->input('availability');
      $product->price = $request->input('price');
      $product->promotions = $request->input('promotions');
      $product->discount = $request->input('discount');
      $product->details = $request->input('details');
      $product->tags = $request->input('tags');
      $file = $fileStore->saveToLocal();
      if (isset($file->code) && !is_null($file) && !empty($file)) {
        $product->image_codes = $file->code;
        $product->image_paths = $file->mimetype;
      }
      $dto = new BooleanDTO($product->save());
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
  protected function delete(Request $request) {
    $itemId = $request->input('id');
    $item = ProductModel::find($itemId);
    if ($item && $request->user()->hasRole('ADMIN')) {
      $dto = new BooleanDTO($item->delete());
      return response()->json($dto->output());
    }
    $dto = new BooleanDTO(false);
    return response()->json($dto->output());
  }
}