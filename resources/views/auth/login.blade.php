<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Đăng nhập quản trị</title>
    <meta name="description" content="overview & stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{asset('css/admin/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <!-- text fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300" />
    <!-- ace styles -->
    <link rel="stylesheet" href="{{asset('css/admin/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{asset('css/admin/ace-part2.min.css')}}" class="ace-main-stylesheet" />
    <link rel="stylesheet" href="{{asset('css/admin/ace-ie.min.css')}}" />
    <![endif]-->
    <link rel="stylesheet" href="{{asset('css/admin/style.css')}}" />
    <script type="text/javascript" src="{{asset('js/admin/ace-extra.min.js')}}"></script>
</head>
<body class="login-layout light-login">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="ace-icon fa fa-leaf green"></i>
                            <span class="grey" id="id-text2">Đăng nhập Quản trị</span>
                        </h1>
                        <h4 class="blue" id="id-company-text">©ChauBaoLinhCo</h4>
                    </div>
                    <div class="space-6"></div>
                    <div class="position-relative">
                        <div id="login-box" class="login-box widget-box no-border visible">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger text-center">
                                        <i class="ace-icon fa fa-lock green"></i>
                                        Nhập email và mật khẩu
                                    </h4>

                                    <div class="space-6"></div>

                                    <form action="{{url('auth/login')}}" method="post">
                                        <p class="red">{{$errors->first('email')}}</p>
                                        <p class="red">{{$errors->first('password')}}</p>
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                                    <i class="ace-icon fa fa-user"></i>
                                                </span>
                                            </label>

                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                                    <i class="ace-icon fa fa-lock"></i>
                                                </span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace">
                                                    <span class="lbl"> Ghi nhớ tôi</span>
                                                </label>

                                                <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                    <span class="bigger-110">Đăng nhập</span>
                                                    <i class="ace-icon fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div><!-- /.widget-main -->

                                <div class="toolbar clearfix">
                                    <div>
                                        <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                            <i class="ace-icon fa fa-arrow-left"></i>
                                            I forgot my password
                                        </a>
                                    </div>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->

                        <div id="forgot-box" class="forgot-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header red lighter bigger">
                                        <i class="ace-icon fa fa-key"></i>
                                        Retrieve Password
                                    </h4>

                                    <div class="space-6"></div>
                                    <p>
                                        Enter your email and to receive instructions
                                    </p>

                                    <form>
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="email" class="form-control" placeholder="Email">
                                                    <i class="ace-icon fa fa-envelope"></i>
                                                </span>
                                            </label>

                                            <div class="clearfix">
                                                <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                                    <span class="bigger-110">Tạo lại mật khẩu!</span>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div><!-- /.widget-main -->

                                <div class="toolbar center">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        <i class="ace-icon fa fa-arrow-left"></i>
                                        Quay lại đăng nhập
                                    </a>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.forgot-box -->
                    </div><!-- /.position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div>
<!--[if !IE]> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- <![endif]-->
<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<![endif]-->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/jquery/plugin/notify.min.js')}}"></script>
<script src="{{asset('js/admin/ace-elements.min.js')}}"></script>
<script src="{{asset('js/admin/ace.min.js')}}"></script>
<script src="{{asset('js/libs/base.min.js')}}"></script>
<script src="{{asset('js/libs/hashtable.min.js')}}"></script>
<script src="{{asset('js/libs/components/dialog.min.js')}}"></script>
<script src="{{asset('js/libs/class/entity.min.js')}}"></script>
</body>