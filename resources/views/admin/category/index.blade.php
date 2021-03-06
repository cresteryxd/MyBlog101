@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">Management</a> &raquo; Category_Management
    </div>
    <!--面包屑导航 结束-->

	{{--<!--结果页快捷搜索框 开始-->--}}
	{{--<div class="search_wrap">--}}
        {{--<form action="" method="post">--}}
            {{--<table class="search_tab">--}}
                {{--<tr>--}}
                    {{--<th width="120">选择分类:</th>--}}
                    {{--<td>--}}
                        {{--<select onchange="javascript:location.href=this.value;">--}}
                            {{--<option value="">全部</option>--}}
                            {{--<option value="http://www.baidu.com">百度</option>--}}
                            {{--<option value="http://www.sina.com">新浪</option>--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<th width="70">关键字:</th>--}}
                    {{--<td><input type="text" name="keywords" placeholder="关键字"></td>--}}
                    {{--<td><input type="submit" name="sub" value="查询"></td>--}}
                {{--</tr>--}}
            {{--</table>--}}
        {{--</form>--}}
    {{--</div>--}}
    {{--<!--结果页快捷搜索框 结束-->--}}

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>Category List</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>Add Category</a>
                    <a href="{{url('admin/category')}}"><i class="fa fa-circle-o"></i>All Category</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        {{--<th class="tc" width="5%"><input type="checkbox" name=""></th>--}}
                        <th class="tc">Order</th>
                        <th class="tc">ID</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Views</th>
                        <th>Manipulations</th>

                    </tr>

                    @foreach($data as $v)

                    <tr>

                        <td class="tc">
                            <input type="text" onchange="changeOrder(this, {{$v->cate_id}})" value="{{$v->cate_order}}">
                        </td>
                        <td class="tc">{{$v->cate_id}}</td>
                        <td>
                            <a href="#">{{$v->_cate_name}}</a>
                        </td>
                        <td>{{$v->cate_title}}</td>
                        <td>{{$v->cate_view}}</td>

                        <td>
                            <a href="{{url('admin/category/'.$v->cate_id.'/edit')}}">EDIT</a>
                            <a href="javascript:;" onclick="delCate({{$v->cate_id}})">DELETE</a>
                        </td>
                    </tr>

                    @endforeach
                </table>







            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <script>
        function changeOrder(obj, cate_id) {
            var cate_order = $(obj).val();
            $.post("{{url('admin/cate/changeorder')}}", {'_token':'{{csrf_token()}}', 'cate_id':cate_id,'cate_order':cate_order}, function (data) {
                if(data.status == 0){
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }

                window.location.reload();
            });
        }

        //delete category
        function delCate(cate_id) {
            layer.confirm('Do you really want to delete this category？', {
                btn: ['Yes','No'] //按钮
            }, function(){
//                alert(cate_id);
//                layer.msg(cate_id.' Deleted', {icon: 1});
                $.post("{{url('admin/category/')}}/"+cate_id, {'_method':'delete', '_token':"{{csrf_token()}}"}, function (data) {
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 1});
                })
            }, function(){
                layer.msg('也可以这样', {
                    time: 20000, //20s后自动关闭
                    btn: ['明白了', '知道了']
                });
            });
        }



    </script>

    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script>
        function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaktNKzfqF7-s8n4OypkwfOgkIK_xZm9E&callback=initMap">
    </script>
@endsection
