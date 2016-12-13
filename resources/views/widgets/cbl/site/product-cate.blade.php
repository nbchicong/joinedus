<div class="col-md-3 col-sm-4 cbl-left-bar hidden-xs-down">
    <div class="jumbotron">
        <h5 class="title">Danh mục sản phẩm</h5>
        <hr>
        <div class="list-group">
            @foreach($categoryList as $cate)
            <a href="{{Helper::getWebUrl('/san-pham/'.$cate->code.'.'.$cate->id)}}" class="list-group-item list-group-item-action">{{$cate->name}}</a>
                @if(!empty($cate->childrens))
                <div class="list-group">
                    @foreach($cate->childrens as $subCate)
                        @if(isset($subCate))
                    <a style="font-size:14px" href="{{Helper::getWebUrl('/san-pham/'.$cate->code.'/'.$subCate->code.'.'.$subCate->id)}}" class="list-group-item list-group-item-action"><i class="fa fa-angle-right"></i> <span style="padding-left:10px">{{$subCate->name}}</span></a>
                        @endif
                    @endforeach
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>