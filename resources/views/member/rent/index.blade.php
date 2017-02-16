@extends('member.main')
@section('content')
    @include('member.common.crumb')
    @include('member.rent.search')
    <div class="mem_tab">@include('member.common.lists')</div>
    <div class="hr_tab"></div>
    <!-- 空白 -->
    <div class="list_kongbai">&nbsp;</div>
    <div class="list">
        <table class="list_tab">
            <tr>
                <td>编号</td>
                <td>设备名称</td>
                <td>供求关系</td>
                <td>缩略图</td>
                <td>发布人</td>
                <td>创建时间</td>
                <td>操作</td>
            </tr>
        @if(count($datas))
            @foreach($datas as $data)
            <tr>
                <td>{{ $data['id'] }}</td>
                <td>{{ $data['name'] }}</td>
                <td>{{ $data['genreName'] }}</td>
                <td>@if($data['thumb'])<img src="{{$data['thumb']}}" width="100">@else/@endif</td>
                <td>{{ UserNameById($data['uid']) }}</td>
                <td>{{ $data['createTime'] }}</td>
                <td>
                    {{--@if($curr['url']=='')--}}
                        <a href="{{DOMAIN}}member/rent/{{ $data['id'] }}" class="list_btn">查看</a>
                        <a href="{{DOMAIN}}member/rent/{{ $data['id'] }}/edit" class="list_btn">编辑</a>
                        {{--<a href="{{DOMAIN}}member/rent/{{ $data['id'] }}/destroy" class="list_btn">删除</a>--}}
                    {{--@else--}}
                        {{--<a href="{{DOMAIN}}member/rent/{{ $data['id'] }}/restore" class="list_btn">还原</a>--}}
                        {{--<a href="{{DOMAIN}}member/rent/{{ $data['id'] }}/forceDelete" class="list_btn">销毁记录</a>--}}
                    {{--@endif--}}
                </td>
            </tr>
            @endforeach
        @else <tr><td colspan="10" style="text-align:center;">没有记录</td></tr>
        @endif
        </table>
        @include('member.common.page2')
    </div>
@stop