<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('pageTitle') - {{$site->siteName}}</title>
    <link type="text/css" rel="stylesheet" href="{{asset('css/cbl/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/cbl/tether.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500&subset=vietnamese">
    <link type="text/css" rel="stylesheet" href="{{asset('css/cbl/style.css')}}">
</head>
<body>
@include('widgets.cbl.site.top-menu')
@yield('body')
@include('widgets.cbl.site.footer')
<script type="text/javascript" src="{{asset('js/jquery/jquery-3.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bs4/tether.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bs4/bootstrap.min.js')}}"></script>
</body>
</html>