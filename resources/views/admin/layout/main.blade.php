<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>后盾人 - houdunren.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('/plugins/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/plugins/uploadfile/uploadfile.css')}}" rel="stylesheet">
</head>
<body>
@include('admin.layout._header')
<!--主体-->
<div class="container-fluid admin_menu" style="margin: 60px auto">
    <div class="row">
        @include('admin.layout._sidebar')
        <div class="col-xs-12 col-sm-9 col-lg-10">
            @include('admin.layout._message')
            @yield('content')
        </div>
    </div>
</div>
@include('admin.layout._footer')
</body>
</html>
<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/plugins/layer/layer.js')}}"></script>
<script src="{{asset('/plugins/uploadfile/uploadfile.js')}}"></script>
@yield('my-js')