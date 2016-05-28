<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>@yield('page_title')</title>
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
    @yield('style')
    <script type="text/javascript" src="{{asset('js/admin/ace-extra.min.js')}}"></script>
</head>
<body class="no-skin">
@yield('body')
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
@yield('script')
</body>