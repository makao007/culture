@extends('company.admin.main')
@section('content')
    @include('company.admin.common.crumb')

    <div class="com_admin_list">
        <form data-am-validator method="POST" action="/company/admin/firm/{{ $data->id }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="POST">
            <table class="table_create">
                <tr>
                    <td class="field_name"><label>服务名称：</label></td>
                    <td class="right"><input type="text" class="field_value" name="name" value="{{ $data->name }}"/></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="field_name"><label>内容：</label></td>
                    {{--<td class="right"><textarea name="intro" cols="40" rows="5"></textarea></td>--}}
                    <td class="right" style="position:relative;z-index:0;" colspan="2">
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

                <tr>
                    <td class="field_name"><label>标题：</label></td>
                    <td class="right"><input type="text" class="field_value" name="title" value="{{ $data->title }}"/></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="field_name"><label>图片：</label></td>
                    <td class="right">
                        <select name="pic_id">
                            <option value="0" {{ $data->pic_id==0 ? 'selected' : '' }}>选择图片</option>
                            @if($pics)
                                @foreach($pics as $pic)
                                    <option value="{{ $pic->id }}" {{ $data->pic_id==$pic->id ? 'selected' : '' }}>{{ $pic->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <a href="/company/admin/pic" class="job">图片列表</a>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td class="field_name"><label>细节详情：</label></td>
                    <td class="right" colspan="2"><textarea name="detail" cols="40" rows="5">{{ $data->detail }}</textarea></td>
                </tr>

                <tr>
                    <td class="field_name"><label>标题小字：</label></td>
                    <td class="right" id="small">
                    @if($data->small && isset($data->smalls) && $data->smalls)
                        @foreach($data->smalls as $ksmall=>$vsmall)
                        <input type="text" class="field_value" name="small{{ $ksmall+1 }}" value="{{ $vsmall }}"/>
                        @endforeach
                    @else
                        <input type="text" class="field_value" name="small1"/>
                    @endif
                    </td>
                    <td class="right" style="width:100px;"><a class="list_btn" id="add">增加</a></td>
                    <input type="hidden" name="numSmall" value="{{ $data->numSmall }}">
                    <script>
                        $(document).ready(function(){
                            var num = $("input[name='numSmall']");
                            var small = $("#small");
                            $("#add").click(function(){
                                if(num.val()>3){ alert('小字数量最多4个！');return false; }
                                num[0].value = num.val()*1+1;
                                small.append('<input type="text" class="field_value" style="margin:5px auto;width:300px;" name="small'+num.val()+'">');

                            });
                        });
                    </script>
                </tr>

                <tr>
                    <td class="field_name"><label>排序：</label></td>
                    <td class="right"><input type="text" class="field_value" name="sort2" value="{{ $data->sort2 }}"/></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="field_name"><label>前台显示否：</label></td>
                    <td class="right">
                        <label><input type="radio" name="isshow2" value="0" {{ $data->isshow2==0 ? 'checked' : '' }}> 不显示&nbsp;&nbsp;</label>
                        <label><input type="radio" name="isshow2" value="1" {{ $data->isshow2==1 ? 'checked' : '' }}> 显示&nbsp;&nbsp;</label>
                    </td>
                    <td></td>
                </tr>

                <tr><td colspan="3" style="text-align:center;">
                        <button class="companybtn" onclick="history.go(-1)">返 &nbsp;&nbsp;&nbsp;回</button>
                        <button type="submit" class="companybtn">保存修改</button>
                    </td></tr>
            </table>
        </form>
    </div>
@stop

