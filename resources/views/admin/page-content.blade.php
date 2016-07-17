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
        <button id="btn-create" class="btn btn-primary btn-sm">
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
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-title">Tiêu đề</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-title" name="title" placeholder="Tiêu đề" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-tags">Tags</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-tags" name="tags" placeholder="Tags" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea name="content" id="txt-content" class="form-control" rows="10"></textarea>
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
    <script src="{{asset('js/admin/libs/page-content-entity.min.js')}}"></script>
@endsection