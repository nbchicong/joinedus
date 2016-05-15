@extends('layouts.admin.layout')
@section('content')
    <div class="page-content">
        <div class="ace-settings-container" id="ace-settings-container">
            <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-cog bigger-130"></i>
            </div>
            <div class="ace-settings-box clearfix" id="ace-settings-box">
                <div class="pull-left width-50">
                    <div class="ace-settings-item">
                        <div class="pull-left">
                            <select id="skin-colorpicker" class="hide">
                                <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                            </select><div class="dropdown dropdown-colorpicker">		<a data-toggle="dropdown" class="dropdown-toggle"><span class="btn-colorpicker" style="background-color:#438EB9"></span></a><ul class="dropdown-menu dropdown-caret"><li><a class="colorpick-btn selected" style="background-color:#438EB9;" data-color="#438EB9"></a></li><li><a class="colorpick-btn" style="background-color:#222A2D;" data-color="#222A2D"></a></li><li><a class="colorpick-btn" style="background-color:#C6487E;" data-color="#C6487E"></a></li><li><a class="colorpick-btn" style="background-color:#D0D0D0;" data-color="#D0D0D0"></a></li></ul></div>
                        </div>
                        <span>&nbsp; Choose Skin</span>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off">
                        <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off">
                        <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off">
                        <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off">
                        <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off">
                        <label class="lbl" for="ace-settings-add-container">
                            Inside
                            <b>.container</b>
                        </label>
                    </div>
                </div><!-- /.pull-left -->
                <div class="pull-left width-50">
                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off">
                        <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                    </div>
                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off">
                        <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                    </div>
                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off">
                        <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                    </div>
                </div><!-- /.pull-left -->
            </div><!-- /.ace-settings-box -->
        </div><!-- /.ace-settings-container -->
        <div class="page-header">
            <h1>
                Email Templates
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    along with an email converter tool
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="alert alert-block alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    The following sample email templates are converted using the provided email tool which
                    converts normal Bootstrap HTML to email friendly table layout with inline CSS!
                </div>
                <div class="space-12"></div>
                <div class="row">
                    <div class="col-xs-3">
                        <a href="./build/demo/email-confirmation.html" class="thumbnail" target="_blank">
                            <img class="img-responsive" src="./dist/images/email1.png" alt="Email Template">
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="./build/demo/email-navbar.html" class="thumbnail" target="_blank">
                            <img class="img-responsive" src="./dist/images/email2.png" alt="Email Template">
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="./build/demo/email-newsletter.html" class="thumbnail" target="_blank">
                            <img class="img-responsive" src="./dist/images/email3.png" alt="Email Template">
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="./build/demo/email-contrast.html" class="thumbnail" target="_blank">
                            <img class="img-responsive" src="./dist/images/email4.png" alt="Email Template">
                        </a>
                    </div>
                </div>
                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection