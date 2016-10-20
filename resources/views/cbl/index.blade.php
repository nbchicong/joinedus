@extends('layouts.cbl.site.layout')
@section('title') Trang chủ @endsection
@section('content')
    @include('widgets.cbl.site.carousel')
    <div class="container-fluid">
        @include('widgets.cbl.site.product-special')
        <div class="row">
            @include('widgets.cbl.site.product-cate')
            <div class="col-md-9 col-sm-8 cbl-list-content col-xs-12">
                <div class="row">
                    @foreach($newProductList as $product)
                    <div class="col-md-4 cbl-item">
                        <a href="{{Helper::getWebUrl('/san-pham/'.$product->categoryId.'/'.$product->nameCode)}}">
                            <img src="{{url('file/get')}}/{{$product->imageCodes}}">
                            <div class="name">{{$product->name}}</div>
                        </a>
                    </div>
                    @endforeach
                    {{--<div class="col-md-4 cbl-item">--}}
                        {{--<a href="#">--}}
                            {{--<img src="http://agb.com.vn/upload/product/519147958744.jpg">--}}
                            {{--<div class="name">1033-2B</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 cbl-item">--}}
                        {{--<a href="#">--}}
                            {{--<img src="http://agb.com.vn/upload/product/519147958744.jpg">--}}
                            {{--<div class="name">1033-2B</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 cbl-item">--}}
                        {{--<a href="#">--}}
                            {{--<img src="http://agb.com.vn/upload/product/519147958744.jpg">--}}
                            {{--<div class="name">1033-2B</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 cbl-item">--}}
                        {{--<a href="#">--}}
                            {{--<img src="http://agb.com.vn/upload/product/519147958744.jpg">--}}
                            {{--<div class="name">1033-2B</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 cbl-item">--}}
                        {{--<a href="#">--}}
                            {{--<img src="http://agb.com.vn/upload/product/519147958744.jpg">--}}
                            {{--<div class="name">1033-2B</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection