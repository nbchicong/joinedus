@extends('layouts.cbl.site.layout')
@section('title') {{$productDetail->name}} - Sản phẩm @endsection
@section('content')
    @include('widgets.cbl.site.carousel')
    <div class="container-fluid">
        @include('widgets.cbl.site.product-special')
        <div class="row">
            @include('widgets.cbl.site.product-cate')
            <div class="col-md-9 col-sm-8 cbl-list-content col-xs-12">
                <div class="row">
                    <h4 class="media-heading">{{$productDetail->name}}</h4>
                    <div class="cover" style="text-align:center">
                        <img class="" alt="{{$productDetail->name}}" src="{{url('file/get')}}/{{$productDetail->imageCodes}}" style="max-width:100%">
                    </div>
                    <div class="content">
                        {{Helper::echoHtml($productDetail->details)}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection