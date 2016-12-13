@extends('layouts.cbl.site.layout')
@section('title') Tin tức & sự kiện @endsection
@section('content')
    @include('widgets.cbl.site.carousel')
    <div class="container-fluid">
        @include('widgets.cbl.site.product-special')
        <div class="row">
            @include('widgets.cbl.site.product-cate')
            <div class="col-md-9 col-sm-8 cbl-list-content col-xs-12">
                <div class="row">
                    @foreach($newsList as $new)
                    <div class="media cbl-news-item">
                        <a class="media-left"  href="{{Helper::getWebUrl('/tin-tuc/'.$new->id.'/'.$new->code)}}">
                            <img class="media-object" data-src="{{url('file/get')}}/{{$new->image}}" alt="{{$new->title}}" src="{{url('file/get')}}/{{$new->image}}" data-holder-rendered="true">
                        </a>
                        <div class="media-body">
                            <a class="cbl-news-title" href="{{Helper::getWebUrl('/tin-tuc/'.$new->id.'/'.$new->code)}}">
                                <h4 class="media-heading">{{$new->title}}</h4>
                            </a>
                            {{--<p>Đăng vào:</p>--}}
                            {{--<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>--}}
                        </div>
                    </div>
                    @endforeach
                    {{--<div class="media cbl-news-item">--}}
                        {{--<a class="media-left" href="#">--}}
                            {{--<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_157a7c7a9a6%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_157a7c7a9a6%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2214.5%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">--}}
                        {{--</a>--}}
                        {{--<div class="media-body">--}}
                            {{--<a class="cbl-news-title" href="#">--}}
                                {{--<h4 class="media-heading">Media heading</h4>--}}
                            {{--</a>--}}
                            {{--<p>Đăng vào:</p>--}}
                            {{--<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="media cbl-news-item">--}}
                        {{--<a class="media-left" href="#">--}}
                            {{--<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_157a7c7a9a6%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_157a7c7a9a6%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2214.5%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">--}}
                        {{--</a>--}}
                        {{--<div class="media-body">--}}
                            {{--<a class="cbl-news-title" href="#">--}}
                                {{--<h4 class="media-heading">Media heading</h4>--}}
                            {{--</a>--}}
                            {{--<p>Đăng vào:</p>--}}
                            {{--<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection