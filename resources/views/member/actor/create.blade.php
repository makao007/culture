@extends('member.main')
@section('content')
    @include('member.common.crumb')

    <form data-am-validator method="POST" action="{{DOMAIN}}member/actor" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table_create">
            <tr>
                <td class="field_name"><label>演员名称：</label></td>
                <td><input type="text" class="field_value" placeholder="艺名，至少2个字符" minlength="2" required name="name"/></td>
            </tr>

            <tr>
                <td class="field_name"><label>真实姓名：</label></td>
                <td><input type="text" class="field_value" placeholder="真实姓名，至少2个字符" minlength="2" required name="realname"/></td>
            </tr>

            <tr>
                <td class="field_name"><label>性别：</label></td>
                <td>
                    <label><input type="radio" class="radio" name="sex" value="1" checked> 男&nbsp;&nbsp;</label>
                    <label><input type="radio" class="radio" name="sex" value="2"> 女&nbsp;&nbsp;</label>
                </td>
            </tr>

            <tr>
                <td class="field_name"><label>家庭地址：</label></td>
                <td><input type="text" class="field_value" placeholder="至少2个字符" minlength="2" required name="origin"/></td>
            </tr>

            <tr>
                <td class="field_name"><label>学历：</label></td>
                <td>
                    <select name="edu" required>
                        @foreach($model['edus'] as $k=>$edu)
                            <option value="{{ $k }}">{{ $edu }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td class="field_name"><label>毕业学校：</label></td>
                <td><input type="text" class="field_value" placeholder="至少2个字符" minlength="2" required name="school"/></td>
            </tr>

            <tr>
                <td class="field_name"><label>兴趣爱好：</label></td>
                <td>
                    @foreach($model['hobbys'] as $k=>$vhobby)
                        <label><input type="checkbox" class="radio" name="hobby[]" value="{{$k}}">
                            {{$vhobby}}&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    @endforeach
                </td>
            </tr>


            <tr>
                <td class="field_name"><label>身高：</label></td>
                <td><input type="text" class="field_value" placeholder="身高，单位cm" pattern="^\d+$" maxlength="3" required name="height"/> cm</td>
            </tr>
            <tr><td></td></tr>

            <tr><td colspan="2" style="text-align:center;">
                    <button class="companybtn" onclick="history.go(-1)">返 &nbsp;&nbsp;&nbsp;回</button>
                    <button type="submit" class="companybtn">保存添加</button>
                </td></tr>
        </table>
    </form>
@stop

