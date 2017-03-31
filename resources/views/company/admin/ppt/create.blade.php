@extends('company.admin.main')
@section('content')
    @include('company.admin.common.crumb')

    <div class="com_admin_list">
        <form data-am-validator method="POST" action="{{DOMAIN_C_BACK}}ppt" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table class="table_create">
                <tr>
                    <td class="field_name"><label>PPT名称：</label></td>
                    <td class="right"><input type="text" class="field_value" placeholder="至少2个字符" minlength="2" required name="name"/></td>
                </tr>

                <tr>
                    <td class="field_name"><label>广告位：</label></td>
                    <td class="right">
                        <select name="adplace" required>
                            @if(count($adplaces))
                                @foreach($adplaces as $adplace)
                                    <option value="{{ $adplace->id }}">
                                        {{ $adplace->name.'('.$adplace->width.'*'.$adplace->height.')' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="field_name"><label>图片：</label></td>
                    <td class="right">
                        @include('company.admin.common.#piclist')
                    </td>
                </tr>

                <tr>
                    <td class="field_name"><label>PPT链接：</label></td>
                    <td class="right"><input type="text" class="field_value" placeholder="跳转的链接地址，例：https://ss1.baidu.com/..." required name="link"/></td>
                </tr>

                <tr>
                    <td class="field_name"><label>鼠标移动显示：</label></td>
                    <td class="right"><input type="text" class="field_value" name="title"/></td>
                </tr>

                <tr>
                    <td class="field_name"><label>排序：</label></td>
                    <td class="right"><input type="text" class="field_value" pattern="^\d+$" required name="sort2" value="10"/></td>
                </tr>

                <tr>
                    <td class="field_name"><label>公司前台显示否：</label></td>
                    <td class="right">
                        <label><input type="radio" name="isshow2" value="0"> 不显示&nbsp;&nbsp;</label>
                        <label><input type="radio" name="isshow2" value="1" checked> 显示&nbsp;&nbsp;</label>
                    </td>
                </tr>

                <tr><td colspan="2" style="text-align:center;">
                        <button class="companybtn" onclick="history.go(-1)">返&nbsp; 回</button>
                        <button type="submit" class="companybtn">保存添加</button>
                    </td></tr>
            </table>
        </form>
    </div>
@stop

