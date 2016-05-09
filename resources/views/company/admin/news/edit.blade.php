@extends('company.admin.main')
@section('content')
    @include('company.admin.common.crumb')

    <div class="com_admin_list">
        <form data-am-validator method="POST" action="/company/admin/news/{{ $data->id }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="genre" value="1">{{--新闻资讯genre==1--}}
            <table class="table_create">
                <tr>
                    <td class="field_name"><label>名称：</label></td>
                    <td class="right"><input type="text" class="field_value" placeholder="至少2位" minlength="2" name="name" value="{{ $data->name }}"/></td>
                </tr>
                {{--<tr><td></td></tr>--}}

                <tr>
                    <td class="field_name"><label>类型：</label></td>
                    <td class="right">
                        <select name="type" required>
                            <option value="7" {{ $data->type==7 ? 'selected' : ''}}>新闻</option>
                            <option value="8" {{ $data->type==8 ? 'selected' : ''}}>资讯</option>
                        </select>
                    </td>
                </tr>
                {{--<tr><td></td></tr>--}}

                <tr>
                    <td class="field_name"><label>图片：</label></td>
                    <td class="right">
                        <select name="pic_id" required>
                        @if(count($pics))
                            @foreach($pics as $pic)
                                <option value="{{ $pic->id }}" {{ $data->pic_id==$pic->id ? 'selected' : ''}}>{{ $pic->name }}</option>
                            @endforeach
                        @endif
                        </select>
                        <span class="right">&nbsp;&nbsp;<a href="/company/admin/pic" class="pic_list_a">图片列表</a></span>
                    </td>
                </tr>
                {{--<tr><td></td></tr>--}}

                <tr>
                    <td class="field_name"><label>介绍：</label></td>
                    {{--<td class="right"><textarea name="require" cols="40" rows="5"></textarea></td>--}}
                    <td class="right" style="position:relative;z-index:0;">
                        @include('UEditor::head')
                        <script id="container" name="intro" type="text/plain">
                            {!! $data->intro !!}
                        </script>
                        <script type="text/javascript">
                            var ue = UE.getEditor('container',{
                                initialFrameWidth:400,
                                initialFrameHeight:100,
                                toolbars:[['redo','undo','bold','italic','underline','strikethrough','horizontal','forecolor','fontfamily','fontsize','priview','directionality','paragraph','imagefloat','insertimage','searchreplace','pasteplain','help','fullscreen']]
                            });
                            ue.ready(function() {
                                //此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
                            });
                        </script>
                    </td>
                </tr>
                {{--<tr><td></td></tr>--}}

                <tr>
                    <td class="field_name"><label>排序：</label></td>
                    <td class="right"><input type="text" class="field_value" pattern="^\d+$" name="sort" value="{{ $data->sort }}"/></td>
                </tr>
                {{--<tr><td></td></tr>--}}

                <tr>
                    <td class="field_name"><label>前台公司页面显示否：</label></td>
                    <td class="right">
                        <label><input type="radio" name="isshow" value="0" {{ $data->isshow==0 ? 'checked' : ''}}> 不显示&nbsp;&nbsp;</label>
                        <label><input type="radio" name="isshow" value="1" {{ $data->isshow==1 ? 'checked' : ''}}> 显示&nbsp;&nbsp;</label>
                    </td>
                </tr>
                {{--<tr><td></td></tr>--}}

                <tr><td colspan="2" style="text-align:center;">
                        <button class="companybtn" onclick="history.go(-1)">返 &nbsp;&nbsp;&nbsp;回</button>
                        <button type="submit" class="companybtn">保存修改</button>
                    </td></tr>
            </table>
        </form>
    </div>
@stop
