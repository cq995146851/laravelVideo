@extends('admin.layout.main')
@section('content')
    <ul class="nav nav-pills">
        <li>
            <a href="{{route('admin.lesson.index')}}">课程列表</a>
        </li>
        <li class="active">
            <a href="{{route('admin.lesson.edit', $lesson->id)}}">修改课程</a>
        </li>
    </ul>
    <form action="{{route('admin.lesson.update', $lesson->id)}}" method="post" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">新建课程</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    @include('admin.layout._error')
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">课程标题</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="{{$lesson->title}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">课程描述</label>
                        <div class="col-sm-10">
                            <textarea name="desc" class="form-control" cols="30" rows="5"
                                      style="resize: none">{{$lesson->desc}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">预览图</label>
                        <input type="hidden" name="preview" value="{{$lesson->preview}}">
                        <div class="col-sm-10">
                            <div id="fileuploader">Upload</div>
                            原图片:<img src="{{$lesson->preview}}" width="100px" height="100px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">是否推荐</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="is_commend" value="1"
                                       @if($lesson->is_commend == 1) checked @endif>是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_commend" value="0"
                                       @if($lesson->is_commend == 0) checked @endif> 否
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">是否热门</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="is_hot" value="1" @if($lesson->is_hot == 1) checked @endif>是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_hot" value="0" @if($lesson->is_hot == 0) checked @endif> 否
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">点击数</label>
                        <div class="col-sm-10">
                            <input type="number" name="click_count" min="0" value="{{$lesson->click_count}}"
                                   class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default" id="video">
            <div class="panel-heading">
                <h3 class="panel-title">视频管理</h3>
            </div>
            <div class="panel-body">
                <div class="panel panel-default"
                     v-for="(video, index) of videos"
                >
                    <div class="panel-body">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">视频标题</label>
                                <div class="col-sm-10">
                                    <input type="text" v-model="video.title" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">视频地址</label>
                                <div class="col-sm-10">
                                    <input type="text" v-model="video.path" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-danger btn-sm" @click.prevent.stop="handleVideoDel(index)">删除视频</button>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" @click.prevent.stop="handleVideoAdd">添加视频</button>
            </div>
            <textarea name="videos" hidden>@{{videos}}</textarea>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
    </form>

@endsection
@section('my-js')
    <script>
        //课程预览图上传
        $("#fileuploader").uploadFile({
            url: "{{route('admin.lesson.upload')}}",
            method: 'post',
            fileName: "preview",
            formData: {_token: '{{csrf_token()}}'},
            maxFileSize: 2 * 1024 * 1024,
            maxFileCount: 1,
            allowedTypes: 'jpg,jpeg,png,gif',
            uploadStr: '上传预览图',
            extErrorStr: '图片格式错误',
            sizeErrorStr: '图片最多2M',
            maxFileCountErrorStr: '只能上传一个文件',
            // dragDropStr: '拖放',
            onSuccess: function (files, data, xhr, pd) {
                $('input[name=preview]').attr('value', data);
                let img = '<img src="' + data + '" class="uploadimg">';
                $('.ajax-file-upload-statusbar').hide();
                $('.ajax-file-upload-container').append(img);
                $('.uploadimg').css({'width': '100px', 'height': '100px'});
            },
            onError: function (files, status, errMsg, pd) {
                console.log(files);
                console.log(status);
                console.log(errMsg);
                console.log(pd);
                layer.msg('上传失败', {icon: 2, time: 2000})
            }

        });

        //视频增加和删除
        let video = new Vue({
            el: '#video',
            data: {
                videos: []
            },
            methods: {
                handleVideoDel(index) {
                    this.videos.splice(index, 1)
                },
                handleVideoAdd() {
                    this.videos.push({title: '', path: '', id: ''})
                }
            },
            mounted() {
                this.$nextTick(() => {
                    this.videos = {!! $videos !!}
                })
            }
        })

    </script>
@endsection