@extends('layouts.admin')
@section('content')
	<!--Head Start-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">Back-Stage Management</div>
			<ul>
				<li><a href="#" class="active">Home Page</a></li>
				<li><a href="#">Management Page</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>Administrator：admin</li>
				<li><a href="{{url('admin/pass')}}" target="main">Modify Password</a></li>
				<li><a href="{{url('admin/quit')}}">Quit</a></li>
			</ul>
		</div>
	</div>
	<!--Head End-->

	<!--LeftNavi Start-->
	<div class="menu_box">
		<ul>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>Operations</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/category/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>Add Category</a></li>
					<li><a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>Category List</a></li>
					<li><a href="{{url('admin/article/create')}}"  target="main"><i class="fa fa-plus-square"></i>Add Article</a></li>
					<li><a href="{{url('admin/article')}}"  target="main"><i class="fa fa-fw fa-list-ul"></i>All Article</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-cog"></i>Settings</h3>
				<ul class="sub_menu" style="display: block">
					<li><a href="{{url('admin/links')}}" target="main"><i class="fa fa-fw fa-cubes"></i>Links</a></li>
					<li><a href="#" target="main"><i class="fa fa-fw fa-database"></i>Recover</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-thumb-tack"></i>Tools</h3>
				<ul class="sub_menu">
					<li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>Icon</a></li>
					<li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery</a></li>
					<li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>Web Color</a></li>
					<li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>Other</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!--LeftNavi End-->

	<!--MainPart Start-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--MainPart End-->

	<!--Bottom Start-->
	<div class="bottom_box">
		Powered By Marlabs Daniel Yan</a>.
	</div>
	<!--Bottom End-->

@endsection
