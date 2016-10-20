@extends('layouts.cbl.site.layout')
@section('title') Sản phẩm @endsection
@section('content')
    @include('widgets.cbl.site.carousel')
    <div class="container-fluid">
        @include('widgets.cbl.site.product-special')
        <div class="row">
            @include('widgets.cbl.site.product-cate')
            <div class="col-md-9 col-sm-8 cbl-list-content col-xs-12">
                <div class="row">
                    @foreach($productList as $product)
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
                    <!--{{$totalPage = round(count($productList)/9)}}-->
                    @if($totalPage > 0)
                    <div>
                        <ol data-total="{{$totalPage}}">
                            @for($index = 0; $index < $totalPage; $index++)
                            <li>
                                @if($index==$current)
                                <a href="javascript:;">
                                    <i>{{$index}}</i>
                                </a>
                                @else
                                <a href="{{Helper::getWebUrl('/san-pham')}}?current={{$index}}">
                                    <b>{{$index}}</b>
                                    </a>
                                @endif
                            </li>
                            @endfor
                        </ol>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection