<h2>Danh mục</h2>
<div class="panel-group category-products" id="accordian"><!--category-products-->
    {{--{{trans('auth.failed')}}--}}
    @foreach($categoryList as $cate)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a @if(!empty($cate->childrens))data-toggle="collapse" data-parent="#accordian"@endif href="@if(!empty($cate->childrens))#product-cate-{{$cate->code}}@else{{url('products/categories')}}/{{$cate->code}}@endif">
                    @if(!empty($cate->childrens))<span class="badge pull-right"><i class="fa fa-plus"></i></span>@endif
                    {{$cate->name}}
                </a>
            </h4>
        </div>
        @if(!empty($cate->childrens)||isset($cate->childrens))
        <div id="product-cate-{{$cate->code}}" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    @foreach($cate->childrens as $child)
                    <li><a href="{{url('products/categories')}}/{{$child->code}}">{{$child->name}} </a></li>
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
            @foreach($brandList as $brand)
            <li><a href="{{url('products/brands')}}/{{$brand->code}}"> {{$brand->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div><!--/brands_products-->

<div class="shipping text-center"><!--shipping-->
    <img src="{{asset('images/home/shipping.jpg')}}" alt="" />
</div><!--/shipping-->