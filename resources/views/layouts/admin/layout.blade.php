@extends('layouts.admin.master')
@section('body')
    @include('widgets.admin.header')
    <div id="main-container" class="main-container ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('main-container')}catch(e){}
        </script>
        @include('widgets.admin.sidebar')
        <div class="main-content">
            <div class="main-content-inner">
                @include('widgets.admin.breadcrumbs')
                @yield('content')
            </div>
        </div>
        @include('widgets.admin.footer')
    </div>
@endsection