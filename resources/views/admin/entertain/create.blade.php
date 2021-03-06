@extends('admin.main')
@section('content')
    <div class="admin-content">
        @include('admin.common.crumb')
        <div class="am-g">
            @include('admin.common.menu')
        </div>
        <hr/>

        <div class="am-g">
            @include('admin.common.info')
            <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                <form class="am-form" data-am-validator method="POST" action="{{DOMAIN}}admin/entertain" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <div class="am-form-group">
                            <label>标题 / Title：</label>
                            <input type="text" placeholder="至少2个字符" minlength="2" maxlength="20" required name="title"/>
                        </div>

                        <div class="am-form-group">
                            <label>内容 / Content：</label>
                            <textarea name="intro" cols="50" rows="5" minlegth="2" maxlength="255" required></textarea>
                        </div>

                        {{--<div class="am-form-group">--}}
                            {{--<label for="content">动态内容 / Activity Content：</label>--}}
                            {{--@include('UEditor::head')--}}
                            {{--<script id="container" name="content" type="text/plain"></script>--}}
                            {{--<!-- 实例化编辑器 -->--}}
                            {{--<script type="text/javascript">--}}
                                {{--var ue = UE.getEditor('container',{--}}
                                    {{--//initialFrameWidth:500,--}}
                                    {{--//initialFrameHeight:200,--}}
{{--//                                    toolbars:[['redo','undo','bold','italic','underline','strikethrough','horizontal','forecolor','fontfamily','fontsize','priview','directionality','paragraph','searchreplace','pasteplain','help']]--}}
                                {{--});--}}
                                {{--ue.ready(function() {--}}
                                    {{--//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.--}}
                                    {{--ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');--}}
                                {{--});--}}
                            {{--</script>--}}
                        {{--</div>--}}

                        <div class="am-form-group">
                            <label>发布方 / User Name：</label>
                            <input type="text" placeholder="至少2个字符" minlength="2" maxlength="20" required name="uname"/>
                        </div>

                        <button type="submit" class="am-btn am-btn-primary">保存添加</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@stop

