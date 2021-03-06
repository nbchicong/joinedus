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
use Illuminate\Http\Request;
use App\Model\BrandModel;
use App\Model\ProductCategoryModel;
use App\Model\ProductModel;
use App\Data\BooleanDTO;
use App\Utils\StringUtils;
use App\Http\Controllers\AbstractController;
use App\Http\Controllers\FileEntryController;

class ProductController extends AbstractController {
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
  
  private function convertPromotion($promotions) {
    return ($promotions == 'on' || $promotions) ? 1 : 0;
  }

  protected function getModel(ProductModel $product, Request $request) {
    Log::debug('Request');
    Log::debug($request);
    $fileStore = new FileEntryController();
    $product->name = $request->input('product_name');
    $product->nameCode = StringUtils::replace2Code($product->name);
    $product->code = $request->input('code');
    $product->categoryId = $request->input('categoryId');
    $product->brandId = $request->input('brandId');
    $product->quantity = $request->input('quantity');
    $product->availability = $request->input('availability');
    $product->price = $request->input('price');
    $product->promotions = $this->convertPromotion($request->input('promotions'));
    $product->discount = $request->input('discount');
    $product->details = $request->input('details');
    $product->tags = $request->input('tags');
    $product->rating = 0;
    $file = $fileStore->saveToLocal();
    if (isset($file->code) && !is_null($file) && !empty($file)) {
      $product->imageCodes = $file->code;
      $product->imagePaths = $file->mimetype;
    }
    return $product;
  }

  protected function create(Request $request) {
    $product = new ProductModel();
    $product = $this->getModel($product, $request);
    $dto = new BooleanDTO($product->save());
    return response()->json($dto->output());
  }
  protected function update(Request $request) {
    $itemId = $request->input('id');
    if (!empty($itemId) && $request->user()->hasRole('ADMIN')) {
      $product = ProductModel::find($itemId);
      if ($product) {
        $product = $this->getModel($product, $request);
        $dto = new BooleanDTO($product->save());
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
      $item = ProductModel::find($itemId);
      if ($item) {
        $deleted = $item->delete();
        if ($deleted) {
          $dto = new BooleanDTO(FileEntryController::remove($item->imageCodes));
          return response()->json($dto->output());
        }
        $dto = new BooleanDTO($deleted);
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
  public function init() {
    // TODO: Implement init() method.
  }
}