@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">Management</a> &raquo; <a href="{{url('admin/links')}}"> Link_Management</a> &raquo; Edit_Link
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>Edit Link</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/links/create')}}"><i class="fa fa-plus"></i>Add Link</a>
                <a href="{{url('admin/links')}}"><i class="fa fa-circle-o"></i>Link List</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    <div class="result_wrap">
        <form action="{{url('admin/links/'.$field->link_id)}}" method="post">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i>Link_Name：</th>
                    <td>
                        <input type="text" name="link_name" value="{{$field->link_name}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>Link name is required</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>Link_Url：</th>
                    <td>
                        <input type="text" class="lg" name="link_url" value="{{$field->link_url}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>Link url is required</span>
                    </td>
                </tr>
                <tr>
                    <th>Link_Title：</th>
                    <td>
                        <input type="text" class="lg" name="link_title" value="{{$field->link_title}}">
                    </td>
                </tr>
                <tr>
                    <th>Order：</th>
                    <td>
                        <input type="text" class="sm" name="link_order" value="{{$field->link_order}}">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="Submit">
                        <input type="button" class="back" onclick="history.go(-1)" value="back">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection