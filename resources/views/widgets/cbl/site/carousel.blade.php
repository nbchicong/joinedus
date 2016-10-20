@if(count($carouselList) > 0)
<div id="carousel-generic" class="carousel slide" data-ride="carousel" style="margin-top:65px">
    <ol class="carousel-indicators">
        @for($index = 0; $index < count($carouselList); $index++)
        <li data-target="#carousel-generic" data-slide-to="{{$index}}" @if($index==0) class="active" @endif></li>
        @endfor
    </ol>
    <div class="carousel-inner" role="listbox" {{$index = 0}}>
        @foreach($carouselList as $item)
        <div class="carousel-item  @if($index==0) active @endif" {{$index++}}>
            <img src="{{url('file/get')}}/{{$item->image}}" alt="{{$item->title}}">
        </div>
        @endforeach
    </div>
    <a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev">
        <span class="icon-prev" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endif