<div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
    <!--扩展模块动作 start-->
    <div class="panel panel-default">
        <!--系统菜单-->
        <div class="panel-heading">
            <h4 class="panel-title">系统管理</h4>
            <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                <i class="fa fa-chevron-circle-down"></i>
            </a>
        </div>
        <ul class="list-group menus">
            <li class="list-group-item">
                <a href="{{route('admin.my.resetPassword')}}">我的资料 </a>
            </li>
        </ul>
        <div class="panel-heading">
            <h4 class="panel-title">内容管理</h4>
            <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                <i class="fa fa-chevron-circle-down"></i>
            </a>
        </div>
        <ul class="list-group menus">
            <li class="list-group-item">
                <a href="{{route('admin.tag.index')}}">内容标签 </a>
            </li>
            <li class="list-group-item">
                <a href="{{route('admin.lesson.index')}}">
                    视频管理 </a>
            </li>
        </ul>
        <!----------返回模块列表 start------------>
        <!--模块列表-->
        <!--模块列表 end-->
    </div>
</div>