@extends('layouts.cbl.site.layout')
@section('title') {{$page->title}} @endsection
@section('content')
    @include('widgets.cbl.site.carousel')
    <div class="container-fluid">
        @include('widgets.cbl.site.product-special')
        <div class="row">
            @include('widgets.cbl.site.product-cate')
            <div class="col-md-9 col-sm-8 cbl-list-content col-xs-12">
                <div class="row">
                    <h4 class="media-heading">{{$page->title}}</h4>
                    <div class="content">
                        {{$page->content}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection