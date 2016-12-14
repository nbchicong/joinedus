@extends('layouts.cbl.site.layout')
@section('title') {{$entry->title}} - Tin tức & sự kiện @endsection
@section('content')
    @include('widgets.cbl.site.carousel')
    <div class="container-fluid">
        @include('widgets.cbl.site.product-special')
        <div class="row">
            @include('widgets.cbl.site.product-cate')
            <div class="col-md-9 col-sm-8 cbl-list-content col-xs-12">
                <div class="row">
                    <h4 class="media-heading">{{$entry->title}}</h4>
                    <div class="cover" style="text-align:center">
                        <img class="" alt="{{$entry->title}}" src="{{url('file/get')}}/{{$entry->image}}" style="max-width:100%">
                    </div>
                    <div class="content">
                        {{Helper::echoHtml($entry->content)}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection