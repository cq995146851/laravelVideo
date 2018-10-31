@extends('admin.layout.main')
@section('content')
    <form action="{{route('admin.my.resetPassword')}}" method="post" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">重置密码</h3>
            </div>
            <div class="panel-body">
                @include('admin.layout._error')
                {{csrf_field()}}
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">原始密码</label>
                    <div class="col-sm-10">
                        <input type="password" name="old_password" class="form-control" value="{{old('old_password')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">新密码</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" value="{{old('password')}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">修改</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection