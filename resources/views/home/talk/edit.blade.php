@extends('home.main')
@section('content')
    <div class="talk_con">
        <form class="form" data-am-validator method="POST" action="/talk/{{$data->id}}" enctype="multipart/form-data">
            <div class="head">添加新的话题</div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="POST">

            <input type="text" class="talk_input" placeholder="标题，至少2个字符" minlength="2" required name="name" value="{{ $data->name }}"/>
            <div style="height:10px;"></div>

            @include('UEditor::head')
            <script type="text/plain" id="container" name="intro">
                {!! $data->content !!}
            </script>
            <script type="text/javascript">
                var ue = UE.getEditor('container',{
                    initialFrameWidth:800,
                    initialFrameHeight:400,
                    toolbars:[['redo','undo','bold','italic','underline','strikethrough','horizontal','forecolor','fontfamily','fontsize','indent','priview','directionality','paragraph','searchreplace','insertimage','imagefloat','pasteplain','help']]
                });
                ue.ready(function() {
                    //此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
                });
            </script>

            <div style="height:40px;"></div>
            <button type="submit" class="homebtn" style="margin-left:350px;">保存修改</button>
            <div style="height:50px;"></div>
        </form>
    </div>
@stop