@extends('layouts.admin.layout')
@section('page_title')
    {{$title}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/grid.css')}}" />
@endsection
@section('content')
    <div class="toolbar breadcrumbs ace-save-state breadcrumbs-fixed">
        <button id="btn-add" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Tạo mới
        </button>
        <button id="btn-save" class="btn btn-primary btn-sm" data-action="save" style="display:none">
            <i class="fa fa-save"></i> Lưu
        </button>
    </div>
    <div class="page-content">
        <div class="row">
            <!-- PAGE CONTENT BEGINS -->
            <div id="list-items"></div>
            <div id="item-content" style="display:none">
                <form action="{{url('admin/product/create')}}" method="post" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-name">Tên sản phẩm</label>
                        <div class="col-sm-5">
                            <input type="text" id="txt-name" name="name" placeholder="Tên sản phẩm" class="form-control">
                        </div>
                        <label class="col-sm-2 control-label no-padding-right" for="txt-code">Mã sản phẩm</label>
                        <div class="col-sm-3">
                            <input type="text" id="txt-code" name="code" placeholder="Mã sản phẩm" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-category">Loại sản phẩm</label>
                        <div class="col-sm-5">
                            <select id="cbb-category" name="categoryId" class="form-control">
                                @if(count($categoryList) > 0)
                                    @foreach($categoryList as $cate)
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <label class="col-sm-2 control-label no-padding-right" for="txt-brand">Nhà sản xuất</label>
                        <div class="col-sm-3">
                            <select id="cbb-brand" name="brandId" class="form-control">
                                @if(count($brandList) > 0)
                                    @foreach($brandList as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-price">Giá</label>
                        <div class="col-sm-2">
                            <input type="text" id="txt-price" name="price" placeholder="Giá" class="form-control">
                        </div>
                        <label class="col-sm-2 control-label no-padding-right" for="txt-quantity">Số lượng</label>
                        <div class="col-sm-2">
                            <input type="text" id="txt-quantity" name="quantity" placeholder="Số lượng" class="form-control">
                        </div>
                        <label class="col-sm-2 control-label no-padding-right" for="txt-availability">Trạng thái bán</label>
                        <div class="col-sm-2">
                            <label>
                                <input id="cbx-availability" name="availability" class="ace ace-switch ace-switch-6" type="checkbox">
                                <span class="lbl"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-promotions">Khuyến mãi</label>
                        <div class="col-sm-2">
                            <label>;l
                                <input id="cbx-promotions" name="promotions" class="ace ace-switch ace-switch-6" type="checkbox">
                                <span class="lbl"></span>
                            </label>
                        </div>
                        <label class="col-sm-2 control-label no-padding-right" for="txt-discount">% Khuyến mãi</label>
                        <div class="col-sm-2">
                            <input type="text" id="txt-discount" name="discount" placeholder="% khuyến mãi" class="form-control">
                        </div>
                        <label class="col-sm-2 control-label no-padding-right" for="txt-tags">Tags</label>
                        <div class="col-sm-2">
                            <input type="text" id="txt-tags" name="tags" placeholder="Tags" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('script')
    <script src="{{asset('js/libs/components/grid.min.js')}}"></script>
    <script src="{{asset('js/libs/components/grid-columns.min.js')}}"></script>
    <script src="{{asset('js/admin/libs/brand-entity.min.js')}}"></script>
@endsection