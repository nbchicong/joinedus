<div class="col-md-3 col-sm-4 cbl-left-bar hidden-xs-down">
    <div class="jumbotron">
        <h5 class="title">Danh mục sản phẩm</h5>
        <hr>
        <div class="list-group">
            @foreach($categoryList as $cate)
            <a href="{{Helper::getWebUrl('/san-pham/'.$cate->code)}}" class="list-group-item list-group-item-action">{{$cate->name}}</a>
            @endforeach
        </div>
    </div>
</div>