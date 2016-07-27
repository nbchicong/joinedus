@extends('layouts.layout')

@section('content')   
<section id="advertisement">
    <div class="container">
        <img src="images/shop/advertisement.jpg" alt="" />
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
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <div class="single-blog-post">
                        <h3>{{$entryDetail->title}}</h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> {{$entryDetail->author}}</li>
                                <li><i class="fa fa-clock-o"></i> {{$entryDetail->create_at}}</li>
                                <li><i class="fa fa-calendar"></i> {{$entryDetail->create_at}}</li>
                            </ul>
                            <span>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </span>
                        </div>
                        <a href="">
                            <img src="{{url('file/get')}}/{{$entryDetail->image}}" alt="">
                        </a>
                        <p>{{$entryDetail->content}}</p>
                        <div class="pager-area">
                            <ul class="pager pull-right">
                                <li><a href="#">Pre</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!--/blog-post-area-->

                <div class="rating-area">
                    <ul class="ratings">
                        <li class="rate-this">Rate this item:</li>
                        <li>
                            <i class="fa fa-star color"></i>
                            <i class="fa fa-star color"></i>
                            <i class="fa fa-star color"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </li>
                        <li class="color">(6 votes)</li>
                    </ul>
                    @if(!empty($entryDetail->tags))
                    <ul class="tag">
                        <li>TAG:</li>
                        @foreach(explode(",", $entryDetail->tags) as $tag)
                        <li><a class="color" href="javascript:;">{{$tag}} <span>/</span></a></li>
                        @endforeach
                    </ul>
                    @endif
                </div><!--/rating-area-->

                <div class="socials-share">
                    <a href=""><img src="{{asset('images/blog/socials.png')}}" alt=""></a>
                </div><!--/socials-share-->

                <div class="media commnets">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{asset('images/blog/man-one.jpg')}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Annie Davis</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="blog-socials">
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                            <a class="btn btn-primary" href="">Other Posts</a>
                        </div>
                    </div>
                </div><!--Comments-->
                <div class="response-area">
                    <h2>3 RESPONSES</h2>
                    <div class="fb-comments" data-href="http://{{$_SERVER['HTTP_HOST']}}{{$_SERVER['REQUEST_URI']}}" data-numposts="5" data-width="847px"></div>
                    <div id="fb-root"></div>
                    <script>
                        (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>
                </div><!--/Response-area-->
            </div>	
        </div>
    </div>
</section>

@endsection