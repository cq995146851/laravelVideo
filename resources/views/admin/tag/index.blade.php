@extends('admin.layout.main')
@section('content')
    <ul class="nav nav-pills">
        <li class="active">
            <a href="{{route('admin.tag.index')}}">标签列表</a>
        </li>
        <li>
            <a href="{{route('admin.tag.create')}}">新建标签</a>
        </li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">标签列表</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th style="width: 10%">编号</th>
                    <th>标签</th>
                    <th style="width: 20%">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('admin.tag.edit', $tag->id)}}" class="btn btn-default">编辑</a>
                                <a href="javascript:;" class="btn btn-default" onclick="del('{{$tag->id}}')">删除</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('my-js')
    <script>
        function del(id) {
            $.ajax({
                method: 'DELETE',
                url: '/admin/tag/'+id,
                dateType: 'json',
                data: {'_token': '{{csrf_token()}}'},
                beforeSend: function () {
                    i = layer.load();
                },
                success: function (res) {
                    layer.close(i);
                    if(!res){
                        layer.msg('服务端错误', {time: 2000});
                    }
                    layer.msg(res.msg, {time: 2000});
                    setTimeout(function () {
                        location.reload();
                    },2000)
                },
                error: function () {
                    layer.close(i);
                    layer.msg('请求失败', {time: 2000});
                }
            })
        }
    </script>
@endsection