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
                    <h2 class="title text-center">Latest From our Blog</h2>
                    @foreach($entryList as $entry)
                    <div class="single-blog-post">
                        <h3>{{$entry->title}}</h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> {{$entry->author}}</li>
                                <li><i class="fa fa-clock-o"></i> {{$entry->create_at}}</li>
                                <li><i class="fa fa-calendar"></i> {{$entry->create_at}}</li>
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
                            <img src="{{url('file/get')}}/{{$entry->image}}" alt="">
                        </a>
                        <p>{{substr($entry->content, 0, 100)}}</p>
                        <a  class="btn btn-primary" href="{{url('blog/entry')}}/{{$entry->code}}">Read More</a>
                    </div>
                    @endforeach
                    @if($totalPage > 0)
                    <div class="pagination-area">
                        <ul class="pagination">
                            @for($i=0; $i<$totalPage; $i++)
                            <li><a href="?page={{$i+1}}" @if($i==0)class="active"@endif>{{$i+1}}</a></li>
                            @endfor
                            {{--<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>--}}
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection