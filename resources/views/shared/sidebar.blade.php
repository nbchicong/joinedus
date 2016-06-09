<h2>Danh mục</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    {{--{{trans('auth.failed')}}--}}
    @foreach($categoryList as $cate)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a @if(!empty($cate->childrens))data-toggle="collapse" data-parent="#accordian"@endif href="@if(!empty($cate->childrens))#product-cate-{{$cate->id}}@else{{url('products/categories')}}/{{$cate->id}}@endif">
                    @if(!empty($cate->childrens))<span class="badge pull-right"><i class="fa fa-plus"></i></span>@endif
                    {{$cate->name}}
                </a>
            </h4>
        </div>
        @if(!empty($cate->childrens)||isset($cate->childrens))
        <div id="product-cate-{{$cate->id}}" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    @foreach($cate->childrens as $child)
                    <li><a href="{{url('products/categories')}}/{{$child->parentCateId}}/{{$child->id}}">{{$child->name}} </a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
    @endforeach
</div><!--/category-products-->

<div class="brands_products"><!--brands_products-->
    <h2>Brands</h2>
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="{{url('products/brands/acne')}}"> <span class="pull-right">(50)</span>Acne</a></li>
            <li><a href="{{url('products/brands/grune-erde')}}"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
            <li><a href="{{url('products/brands/albiro')}}"> <span class="pull-right">(27)</span>Albiro</a></li>
            <li><a href="{{url('products/brands/ronhill')}}"> <span class="pull-right">(32)</span>Ronhill</a></li>
            <li><a href="{{url('products/brands/oddmolly')}}"> <span class="pull-right">(5)</span>Oddmolly</a></li>
            <li><a href="{{url('products/brands/boudestijn')}}"> <span class="pull-right">(9)</span>Boudestijn</a></li>
            <li><a href="{{url('products/brands/rosch-creative-culture')}}"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
        </ul>
    </div>
</div><!--/brands_products-->

<div class="shipping text-center"><!--shipping-->
    <img src="{{asset('images/home/shipping.jpg')}}" alt="" />
</div><!--/shipping-->