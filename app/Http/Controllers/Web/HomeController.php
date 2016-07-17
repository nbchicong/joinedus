<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 14/05/2016
 * Time: 12:30 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: HomeController.php
 * @author: nbchicong
 */
/**
 * @package App\Http\Controllers\Web
 * @class HomeController
 */


namespace App\Http\Controllers\Web;

use Log;
use App\CarouselModel;
use App\EntryModel;
use App\BrandModel;
use App\ProductModel;
use App\ProductCategoryModel;
use App\Utils\Constants;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
  public function index($lang='vi') {
    App::setLocale($lang);
    return view('home', array(
        'page' => 'home',
        'categoryList' => $this->loadCateList(),
        'brandList' => $this->loadBrandList(),
        'carouselList' => CarouselModel::paginate(Constants::HOME_CAROUSEL_PAGE_SIZE),
        'featureProductList' => ProductModel::paginate(Constants::HOME_FEATURE_PRODUCT_SIZE)
    ));
  }

  private function totalPaging($list, $pageSize) {
    $total = count($list);
    return ceil($total/$pageSize);
  }

  private function loadBrandList() {
    return BrandModel::all();
  }

  private function loadCateByParentId($parentId) {
    return ProductCategoryModel::where('parentCateId', $parentId)->get();
  }

  private function loadCateList() {
    $cateParentList = ProductCategoryModel::where('parentCateId', '')->get();
    $cateChildrenList = ProductCategoryModel::where('parentCateId', '<>', '')->get();
    foreach ($cateChildrenList as $cate)
      if (!empty($cate->parentCateId))
        foreach ($cateParentList as $parent)
          if ($parent->id == $cate->parentCateId)
            $parent->childrens = $this->loadCateByParentId($cate->parentCateId);
    Log::debug("List cate");
    Log::debug($cateParentList);
    return $cateParentList;
  }

  private function updateProductCountView(ProductModel $product) {
    Log::debug("Update Product Count View");
    $countView = $product->countView;
    if (empty($countView))
      $countView = 0;
    $product->countView = ($countView + 1);
    $product->update($product->toArray());
    $this->updateCategoryCountView(ProductCategoryModel::find($product->categoryId));
    $this->updateBrandCountView(BrandModel::find($product->brandId));
  }

  private function updateCategoryCountView(ProductCategoryModel $category) {
    Log::debug("Update Category Count View");
    $countView = $category->countView;
    if (empty($countView))
      $countView = 0;
    $category->countView = ($countView + 1);
    $category->update($category->toArray());
  }

  private function updateBrandCountView(BrandModel $brand) {
    Log::debug("Update Brand Count View");
    $countView = $brand->countView;
    if (empty($countView))
      $countView = 0;
    $brand->countView = ($countView + 1);
    $brand->update($brand->toArray());
  }

  public function products() {
    return view('products', array(
        'page' => 'products',
        'categoryList' => $this->loadCateList(),
        'brandList' => $this->loadBrandList(),
        'productList' => ProductModel::paginate(Constants::HOME_PRODUCT_PAGE_SIZE),
        'totalPage' => $this->totalPaging(ProductModel::all(), Constants::HOME_PRODUCT_PAGE_SIZE)
    ));
  }

  public function productDetails($code) {
    $product = ProductModel::where('nameCode', $code)->first();
    if (!$product) {
      $product = new ProductModel();
    } else {
      $this->updateProductCountView($product);
    }
    return view('product_details', array(
        'page' => 'product_details',
        'categoryList' => $this->loadCateList(),
        'brandList' => $this->loadBrandList(),
        'productDetail' => $product
    ));
  }

  public function productCategories($code) {
    $cate = ProductCategoryModel::where('code', $code)->first();
    $list = ProductModel::where('categoryId', $cate->id)->paginate(Constants::HOME_PRODUCT_PAGE_SIZE);
    $this->updateCategoryCountView($cate);
    return view('products', array(
        'page' => 'products',
        'categoryList' => $this->loadCateList(),
        'brandList' => $this->loadBrandList(),
        'productList' => $list,
        'totalPage' => $this->totalPaging($list, Constants::HOME_PRODUCT_PAGE_SIZE)
    ));
  }

  public function productBrands($brandCode) {
    $cate = BrandModel::where('code', $brandCode)->first();
    $list = ProductModel::where('brandId', $cate->id)->paginate(Constants::HOME_PRODUCT_PAGE_SIZE);
    Log::debug($cate);
    $this->updateBrandCountView($cate);
    return view('products', array(
        'page' => 'products',
        'categoryList' => $this->loadCateList(),
        'brandList' => $this->loadBrandList(),
        'productList' => $list,
        'totalPage' => $this->totalPaging($list, Constants::HOME_PRODUCT_PAGE_SIZE)
    ));
  }

  public function blog() {
    return view('blog', array(
        'page' => 'blog',
        'categoryList' => $this->loadCateList(),
        'brandList' => $this->loadBrandList(),
        'entryList' => EntryModel::paginate(Constants::HOME_ENTRY_PAGE_SIZE),
        'totalPage' => $this->totalPaging(EntryModel::all(), Constants::HOME_ENTRY_PAGE_SIZE)
    ));
  }

  public function blogItem($entryCode) {
    $entry = EntryModel::where('code', $entryCode)->first();
    if (!$entry)
      $entry = new EntryModel();
    return view('blog_post', array(
        'page' => 'blog_post',
        'categoryList' => $this->loadCateList(),
        'brandList' => $this->loadBrandList(),
        'entryDetail' => $entry
    ));
  }

  public function contactUs() {
    return view('contact_us', array('page' => 'contact_us'));
  }

  public function login() {
    return view('login', array('page' => 'home'));
  }

  public function logout() {
    Auth::logout();
    return view('login', array('page' => 'home'));
  }

  public function cart() {
    return view('cart', array('page' => 'home'));
  }

  public function checkout() {
    return view('checkout', array('page' => 'home'));
  }

  public function search($query) {
    return view('products', array('page' => 'products'));
  }
}