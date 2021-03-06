@extends('layouts.layout')

@section('content')
<section id="advertisement">
    <div class="container">
        <img src="{{asset('images/shop/advertisement.jpg')}}" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    @include('shared.sidebar')
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    @foreach($productList as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{url('file/get')}}/{{$product->imageCodes}}" alt="" />
                                    <h2>{{Helper::getPrice($product->price)}}</h2>
                                    <p>{{$product->name}}</p>
                                    <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    <a href="{{url('products/details')}}/{{$product->nameCode}}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{Helper::getPrice($product->price)}}</h2>
                                        <p>{{$product->name}}</p>
                                        <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        <a href="{{url('products/details')}}/{{$product->nameCode}}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View More</a>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="choose">--}}
                                {{--<ul class="nav nav-pills nav-justified">--}}
                                    {{--<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>--}}
                                    {{--<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    @endforeach
                    @if($totalPage > 0)
                    <ul class="pagination">
                        @for($i=0; $i<$totalPage; $i++)
                            <li @if($i==0)class="active"@endif><a href="?page={{$i+1}}">{{$i+1}}</a></li>
                        @endfor
                    </ul>
                    @endif
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection