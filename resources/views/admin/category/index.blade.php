@extends('layouts.admin.layout')
@section('content')
    <div class="toolbar breadcrumbs ace-save-state breadcrumbs-fixed">
        <button id="btn-add" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-category">
            <i class="fa fa-plus"></i> Tạo mới
        </button>
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                Danh sách loại sản phẩm
                {{--<small>--}}
                    {{--<i class="ace-icon fa fa-angle-double-right"></i>--}}
                    {{--along with an email converter tool--}}
                {{--</small>--}}
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div id="list-items">
                    <div class="row">
                        <table id="category-table-list" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Create At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($categoryList) > 0)
                                @foreach($categoryList as $cate)
                                    <tr>
                                        <td>
                                            <a href="#">{{$cate->name}}</a>
                                        </td>
                                        <td>{{$cate->create_at}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="2">Không có dữ liệu để hiển thị</td></tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="modal-category" tabindex="-1" role="dialog" aria-labelledby="modal-label">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal-label">Loại sản phẩm</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="cash-request-value" class="col-sm-3 control-label">Tên loại</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="txt-cate-name" placeholder="Tên loại">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cash-request-message" class="col-sm-3 control-label">Thuộc loại/nhóm</label>
                                        <div class="col-sm-9">
                                            <select id="cbb-cate-parent" class="form-control">
                                                <option value="">-----</option>
                                                @if(count($categoryList) > 0)
                                                    @foreach($categoryList as $cate)
                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Hủy bỏ</button>
                                <button id="btn-send-request" type="button" class="btn btn-primary" data-action="save"><i class="fa fa-save"></i> Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('script')
    <script src="{{asset('js/admin/category/CategoryEntity.js')}}"></script>
@endsection