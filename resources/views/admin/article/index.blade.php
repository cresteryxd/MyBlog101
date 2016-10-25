@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">Management</a> &raquo; Article_Management
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">

    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>Article List</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>Add Article</a>
                    <a href="{{url('admin/article')}}"><i class="fa fa-circle-o"></i>All Article</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>Title</th>
                        <th>Views</th>
                        <th>Editor</th>
                        <th>Time</th>
                        <th>Manipulation</th>
                    </tr>

                    @foreach($data as $v)
                    <tr>

                        <td class="tc">{{$v->art_id}}</td>
                        <td>
                            <a href="#">{{$v->art_title}}</a>
                        </td>
                        <td>{{$v->art_view}}</td>
                        <td>{{$v->art_editor}}</td>
                        <td>{{date( 'Y-m-d, H:m:s', $v->art_time)}}</td>
                        <td>
                            <a href="{{url('admin/article/'.$v->art_id.'/edit')}}">EDIT</a>
                            <a href="javascript:;" onclick="delArt({{$v->art_id}})">DELETE</a>
                        </td>
                    </tr>
                    @endforeach

                </table>

                <div class="page_list">
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <style>
        .result_content ul li span {
            font-size: 15px;
            padding: 6px 12px;
        }
    </style>

    <script>
        //delete category
        function delArt(art_id) {
            layer.confirm('Do you really want to delete this Article？', {
                btn: ['Yes','No'] //按钮
            }, function(){
//                alert(cate_id);
//                layer.msg(cate_id.' Deleted', {icon: 1});
                $.post("{{url('admin/article/')}}/"+art_id, {'_method':'delete', '_token':"{{csrf_token()}}"}, function (data) {
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 1});
                })
            }, function(){
                layer.msg('You can edit the content by clicking EDIT if you do not want to delete it', {
                    time: 2000, //20s后自动关闭

                });
            });
        }
    </script>


@endsection