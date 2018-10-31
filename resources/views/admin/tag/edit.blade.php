@extends('admin.layout.main')
@section('content')
    <ul class="nav nav-pills">
        <li>
            <a href="{{route('admin.tag.index')}}">标签列表</a>
        </li>
        <li class="active">
            <a href="{{route('admin.tag.edit', $tag->id)}}">修改标签</a>
        </li>
    </ul>
    <form action="{{route('admin.tag.update', $tag->id)}}" method="post" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">修改标签</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    @include('admin.layout._error')
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标签名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$tag->name}}" e="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">修改</button>
            </div>
        </div>
    </form>

@endsection