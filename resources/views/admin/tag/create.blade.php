@extends('admin.layout.main')
@section('content')
    <ul class="nav nav-pills">
        <li>
            <a href="{{route('admin.tag.index')}}">标签列表</a>
        </li>
        <li class="active">
            <a href="{{route('admin.tag.create')}}">新建标签</a>
        </li>
    </ul>
    <form action="{{route('admin.tag.store')}}" method="post" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">新增标签</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    @include('admin.layout._error')
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标签名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
    </form>

@endsection