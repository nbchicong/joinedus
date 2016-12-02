@extends('layouts.admin.layout')
@section('page_title')
    {{$title}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/grid.css')}}" />
@endsection
@section('content')
    <div class="toolbar breadcrumbs ace-save-state breadcrumbs-fixed">
        <button id="btn-save" class="btn btn-primary btn-sm">
            <i class="fa fa-save"></i> Lưu
        </button>
    </div>
    <div class="page-content">
        <div class="row">
            <!-- PAGE CONTENT BEGINS -->
            <div id="item-content" class="container-fluid">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-name">Tên website</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-name" name="siteName" placeholder="Shop..." class="form-control" value="{{$site->siteName}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-title">Tiêu đề</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-title" name="siteTitle" placeholder="Shop..." class="form-control" value="{{$site->siteTitle}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-code">Code</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-code" name="siteCode" placeholder="shop-ban-hang" class="form-control" value="{{$site->siteCode}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-logo">Hình đại diện</label>
                        <div class="col-sm-10">
                            <input type="file" id="txt-logo" name="siteLogo" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-desc">Mô tả</label>
                        <div class="col-sm-10">
                            <textarea rows="2" id="txt-desc" name="siteDescription" class="form-control">{{$site->siteDescription}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-keywords">Keywords</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-keywords" name="keywords" class="form-control"  value="{{$site->keywords}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-tags">Tags</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-tags" name="tags" class="form-control" placeholder="shop,thời trang trẻ,..." value="{{$site->tags}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-author">Author</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-author" name="author" placeholder="Author..." class="form-control" value="{{$site->author}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-copyright">Copyright</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-copyright" name="copyright" placeholder="Copyright..." class="form-control" value="{{$site->copyright}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-phone">Điện thoại</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-phone" name="phone" placeholder="08 399 191 50" class="form-control" value="{{$site->phone}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-email">Email</label>
                        <div class="col-sm-10">
                            <input type="email" id="txt-email" name="email" placeholder="supporter@example.com" class="form-control" value="{{$site->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-address">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-address" name="address" placeholder="1 Hoàng Văn Thụ, ..." class="form-control" value="{{$site->address}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="cbb-lang">Ngôn ngữ</label>
                        <div class="col-sm-10">
                            <select id="cbb-lang" class="form-control" name="language">
                                <option value="VN" @if($site->language == 'VN') selected @endif>Việt Nam</option>
                                <option value="EN" @if($site->language == 'EN') selected @endif>English</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="cbb-currency">Đơn vị giá</label>
                        <div class="col-sm-10">
                            <select id="cbb-currency" class="form-control" name="currency">
                                <option value="VND" @if($site->currency == 'VND') selected @endif>ĐỒNG</option>
                                <option value="USD" @if($site->currency == 'USD') selected @endif>USD</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="cbb-status">Trạng thái hoạt động</label>
                        <div class="col-sm-10">
                            <select id="cbb-status" class="form-control" name="status">
                                <option value="1" @if($site->status == 1) selected @endif>Đang hoạt động</option>
                                <option value="0" @if($site->status == 0) selected @endif>Đang bảo trì</option>
                                <option value="-1" @if($site->status == -1) selected @endif>Ngừng hoạt động</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-page-pending">Trang chờ</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-page-pending" name="pendingPage" placeholder="http://www.example.com/page-waiting-example.html" class="form-control" value="{{$site->pendingPage}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-social-fb">Facebook</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-social-fb" name="facebookAcc" placeholder="http://www.facebook.com/page-facebook" class="form-control" value="{{$site->facebookAcc}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-social-zl">Zalo</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-social-zl" name="zaloAcc" placeholder="Nhập số điện thoại" class="form-control" value="{{$site->zaloAcc}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-social-gg">Google +</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-social-gg" name="gplusAcc" placeholder="http://www.plus.google.com/page-google-plus" class="form-control" value="{{$site->gplusAcc}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txt-social-in">Linked In</label>
                        <div class="col-sm-10">
                            <input type="text" id="txt-social-in" name="linkedinAcc" placeholder="http://www.linkedin.com/page-linked-in" class="form-control" value="{{$site->linkedinAcc}}">
                        </div>
                    </div>
                </form>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('script')
    <script src="{{asset('js/admin/libs/site-config-entity.min.js')}}"></script>
@endsection