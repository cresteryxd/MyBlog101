@extends('layouts.admin')
@section('content')
	<!--面包屑导航 开始-->
	<div class="crumb_warp">
		<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
		<i class="fa fa-home"></i> <a href="{{url('admin/info')}}">Management</a> &raquo; Basic_info
	</div>
	<!--面包屑导航 结束-->
	
	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>Express Operation</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>Add Category</a>
                <a href="#"><i class="fa fa-recycle"></i>Multiple Delete</a>
                <a href="#"><i class="fa fa-refresh"></i>Resort</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

	
    <div class="result_wrap">
        <div class="result_title">
            <h3>Basic OS infomation</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>OS</label><span>{{PHP_OS}}</span>
                </li>
                <li>
                    <label>Environment</label><span>{{$_SERVER['SERVER_SOFTWARE']}}</span>
                </li>
                <li>
                    <label>PHP Running Method</label><span>apache2handler</span>
                </li>
                <li>
                    <label>Version</label><span>v-0.1</span>
                </li>
                <li>
                    <label>Attachment Limit</label><span><?php echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"Attachment Not Allowed"; ?></span>
                </li>
                <li>
                    <label>EST time</label><span><?php echo date('Y/m/d H:i:s')?></span>
                </li>
                <li>
                    <label>Server DN/IP</label><span>{{$_SERVER['SERVER_NAME']}} [ {{$_SERVER['SERVER_ADDR']}} ]</span>
                </li>
                <li>
                    <label>Host</label><span>{{$_SERVER['SERVER_ADDR']}}</span>
                </li>
            </ul>
        </div>
    </div>


    <div class="result_wrap">
        <div class="result_title">
            <h3>Help</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>Official Forum：</label><span><a href="#">http://bbs.houdunwang.com</a></span>
                </li>
                <li>
                    <label>Official QQ：</label><span><a href="#"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png"></a></span>
                </li>
            </ul>
        </div>
    </div>
	<!--结果集列表组件 结束-->

@endsection