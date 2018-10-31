<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link href="{{asset('/plugins/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <style>
        .container-fluid {
            position: absolute;
            width: 100%;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            background: url('/admin/images/login.jpg') no-repeat center;
        }
        .form-container {
            background: rgba(255,255,255,0.5);
            width:400px;
            margin:120px auto;
        }
        .form-control {
            padding-left: 26px;
        }
        .fa {
            position: relative;
            top: 27px;
            left: 6px;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        @include('admin.layout._message')
        <div class="form-container row">
            <form action="{{route('admin.login')}}" method="post" class="form-horizontal col-md-offset-3" role="form">
                <h3>后台登录</h3>
                @include('admin.layout._error')
                {{csrf_field()}}
                <div class="col-md-9">
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <input type="text" name="name" class="form-control" placeholder="请输入用户名">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" class="form-control" placeholder="请输入密码">
                    </div>
                    <div class="col-md-offset-10">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">登录</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<script src="{{asset('/js/app.js')}}"></script>
