@extends('layouts.admin.layout')
@section('page_title')
    {{$title}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/grid.css')}}" />
@endsection
@section('content')
    <div class="toolbar breadcrumbs ace-save-state breadcrumbs-fixed">
        <button id="btn-add" class="btn btn-primary btn-sm"><!-- data-toggle="modal" data-target="#modal-category"-->
            <i class="fa fa-plus"></i> Tạo mới
        </button>
    </div>
    <div class="page-content">
        <div class="row">
            <!-- PAGE CONTENT BEGINS -->
            <div id="list-items"></div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('script')
    <script type="text/javascript">
        var listCate = [{id:'','name':'-----'}];
        @if(count($cateList) > 0)
            @foreach($cateList as $cate)
        listCate.push({id: '{{$cate->id}}', 'name': '{{$cate->name}}'});
            @endforeach
        @endif
    </script>
    <script src="{{asset('js/libs/components/grid.min.js')}}"></script>
    <script src="{{asset('js/libs/components/grid-columns.min.js')}}"></script>
    <script src="{{asset('js/admin/libs/entry-category-entity.min.js')}}"></script>
@endsection