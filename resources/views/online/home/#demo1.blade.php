@extends('online.main')
@section('content')
    {{--  在线创建窗口 --}}
    <div class="online_win">
        <div class="frame_title">动画名称</div>
        <iframe src="{{DOMAIN}}online/p/lay" frameborder="0" width="720" height="438" scrolling="no" allowtransparency="true"></iframe>
    </div>
@stop