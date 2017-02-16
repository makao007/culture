@extends('member.main')
@section('content')
    {{--@include('member.common.crumb')--}}
    <div class="mem_crumb">
        <a href="{{DOMAIN}}member">会员后台</a> /
        <a href="{{DOMAIN}}member/wallet">会员福利</a> / 福利兑换记录
    </div>
    <div class="mem_tab">
        <ul>
            <a href="{{DOMAIN}}member/wallet"><li>返回</li></a>
        </ul>
    </div>
    <div class="hr_tab"></div>
    <div class="list_kongbai">&nbsp;</div>
    <div class="list">
        <table class="list_tab" style="text-align:center;">
            <tr>
                <td>用户名</td>
                <td>兑换类型</td>
                <td>原始数量</td>
                <td>福利额度</td>
                <td>创建时间</td>
            </tr>
        @if(count($datas))
            @foreach($datas as $data)
            <tr>
                <td>{{UserNameById($data['uid'])}}</td>
                <td>{{$data['genreName']}}</td>
                <td>{{$data['originNumber']}}</td>
                <td>{{$data['val']}}</td>
                <td>{{$data['createTime']}}</td>
            </tr>
            @endforeach
        @else <tr><td colspan="10" style="text-align:center;">没有记录</td></tr>
        @endif
        </table>
        @include('member.common.page2')
    </div>
@stop