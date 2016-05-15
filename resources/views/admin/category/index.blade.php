@extends('layouts.admin.layout')
@section('content')
    <div class="page-content">
        <div class="ace-settings-container" id="ace-settings-container">
            <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-cog bigger-130"></i>
            </div>
        </div><!-- /.ace-settings-container -->
        <div class="page-header">
            <h1>
                Email Templates
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    along with an email converter tool
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="alert alert-block alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    The following sample email templates are converted using the provided email tool which
                    converts normal Bootstrap HTML to email friendly table layout with inline CSS!
                </div>
                <div class="space-12"></div>
                <div class="row">
                    <table id="simple-table" class="table  table-bordered table-hover">
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
                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection