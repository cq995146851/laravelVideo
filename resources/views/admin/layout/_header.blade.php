<div class="container-fluid">
    <!--导航-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                    <li class="top_menu">
                        <a href="?s=site/entry/home&siteid=18&mark=platform" class="quickMenuLink">
                            <i class="'fa-w fa fa-comments-o"></i> 网站主页 </a>
                    </li>
                    <li class="top_menu">
                        <a href="http://houdunwang.com" target="_blank">
                            <i class="'fa-w fa fa-cubes"></i> 实战培训 </a>
                    </li>
                    <li class="top_menu">
                        <a href="http://houdunren.com" class="quickMenuLink">
                            <i class="'fa-w fa fa-cubes"></i> 在线视频 </a>
                    </li>
                    <li class="top_menu">
                        <a href="http://bbs.houdunwang.com" class="quickMenuLink">
                            <i class="'fa-w fa fa-cubes"></i> 论坛讨论 </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <img src="{{asset('/admin/images/mm.jpg')}}" style="width: 25px; height: 25px; border-radius: 50%">
                        {{\Auth::guard('admin')->user()->name}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin.my.resetPassword')}}">我的帐号</a></li>
                        <li><a href="{{route('admin.logout')}}">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!--导航end-->
</div>