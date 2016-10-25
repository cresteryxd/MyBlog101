@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="#">Management</a> &raquo; Modify_Password
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>Modify Password</h3>
        @if(count($errors) > 0)
            <div class="mark">
                @foreach($errors->all() as $error)
                    <p>{{$error}} </p>
                @endforeach
            </div>
        @endif



    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form method="post" action="">
        {{csrf_field()}}



        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>Original Password：</th>
                <td>
                    <input type="password" name="password_o"> </i>Input Original Password</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>New Password：</th>
                <td>
                    <input type="password" name="password"> </i>Password 6-20 Digits</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>Confirm Password：</th>
                <td>
                    <input type="password" name="password_confirmation"> </i>Retype Password</span>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="Submit">
                    <input type="button" class="back" onclick="history.go(-1)" value="Back">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection