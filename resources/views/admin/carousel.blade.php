@extends('layouts.admin.layout')
@section('page_title')
    {{$title}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/grid.css')}}" />
@endsection
@section('content')
    <div class="toolbar breadcrumbs ace-save-state breadcrumbs-fixed">
        <button id="btn-back" class="btn btn-primary btn-sm" style="display:none">
            <i class="fa fa-arrow-left"></i> Quay lại
        </button>
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
            <div id="item-content" class="container-fluid" style="display:none">
                <form action="{{url('admin/carousel/create')}}" method="post" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-header">Tên shop</label>
                        <div class="col-sm-5">
                            <input type="text" id="txt-header" name="header" placeholder="Tên shop" class="form-control" value="{{$site->siteName}}">
                        </div>
                        <label class="col-sm-2 control-label no-padding-right" for="txt-title">Tiêu đề</label>
                        <div class="col-sm-3">
                            <input type="text" id="txt-title" name="title" placeholder="Tiêu đề" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-category">Sản phẩm</label>
                        <div class="col-sm-5">
                            <select id="cbb-product" name="productId" class="form-control">
                                @if(count($productList) > 0)
                                    @foreach($productList as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <label class="col-sm-2 control-label no-padding-right" for="file-image">Hình ảnh</label>
                        <div class="col-sm-3">
                            <input type="file" id="file-image" name="fileUpload" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-price">Nội dung</label>
                        <div class="col-sm-10">
                            <textarea rows="2" id="txt-message" name="message" placeholder="Nội dung" class="form-control"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="txt-id" name="id" value="" />
                </form>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('script')
    <script src="{{asset('js/jquery/plugin/jquery.form.min.js')}}"></script>
    <script src="{{asset('js/libs/components/grid.min.js')}}"></script>
    <script src="{{asset('js/libs/components/grid-columns.min.js')}}"></script>
    <script src="{{asset('js/admin/libs/carousel-entity.min.js')}}"></script>
@endsection