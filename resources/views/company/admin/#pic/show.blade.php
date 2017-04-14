@extends('company.admin.main')
@section('content')
    @include('company.admin.common.crumb')

    <div class="com_admin_list">
        <h3 class="center pos">{{ $lists['func']['name'] }}详情页</h3>
        <table class="table_create" cellspacing="0" cellpadding="0">
            <tr>
                <td class="field_name">序号：</td>
                <td>{{ $data->id }}</td>
            </tr>
            <tr>
                <td class="field_name">图片名称：</td>
                <td>{{ $data->name }}</td>
            </tr>
            <tr>
                <td class="field_name">预览：</td>
                <td>
                    {{--<div class="img"><img src="{{ $data->url }}" style="@if($size=$data->getPicSize($data,$w=150,$h=$data->height))width:{{$size}}px;@endif height:{{$data->height}}px;"></div>--}}
                    <img src="{{ $data->getUrl() }}" width="500">
                </td>
            </tr>
            <tr>
                <td class="field_name">介绍：</td>
                <td>{{ $data->intro }}</td>
            </tr>
            {{--<tr>--}}
                {{--<td class="field_name">是否删除：</td>--}}
                {{--<td>{{ $data->del ? '已删除' : '未删除' }}</td>--}}
            {{--</tr>--}}
            <tr>
                <td class="field_name">上传时间：</td>
                <td>{{ $data->createTime() }}</td>
            </tr>
            <tr>
                <td class="field_name">更新时间：</td>
                <td>{{ $data->updateTime() }}</td>
            </tr>

            <tr><td class="center" colspan="2" style="border:0;cursor:pointer;">
                    {{--<a href="/company/admin/job/{{$data->id}}/edit">--}}
                        {{--<button class="companybtn">修&nbsp;&nbsp;改</button></a>--}}
                    <a><button class="companybtn" onclick="history.go(-1)">返&nbsp;&nbsp;回</button></a>
                </td></tr>
        </table>
    </div>
@stop
