@extends('home.main')
@section('content')
    @include('home.common.crumb')

    <div class="idea_show">
        <span class="idea_left">
            <div class="idea_con">
                <p class="title">{{ $data->name }}</p>
                <table>
                    <tr>
                        <td>供求类型：</td>
                        <td style="width:550px;">{{ $data->genreName() }}</td>
                    </tr>
                    <tr>
                        <td>设计类型：</td>
                        <td>{{ $data->getCate() }}</td>
                    </tr>
                    <tr>
                        <td>价格：</td>
                        <td>{{ $data->money() }}</td>
                    </tr>
                    <tr>
                        <td>设计简介：</td>
                        <td>
                            <textarea readonly class="show_intro" style="width:550px;height:50px;">{{ $data->intro }}</textarea>
                        </td></tr>
                    <tr>
                        <td>设计详情：</td>
                        <td>{!! $data->detail !!}</td>
                    </tr>
                    <tr>
                        <td>点击量：</td>
                        <td>{{ $data->click }}</td>
                    </tr>
                    <tr>
                        <td>创建时间：</td>
                        <td>{{ $data->createTime() }}</td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr>
                        {{--<td>&nbsp;</td>--}}
                        <td colspan="2" style="text-align:center;">
                            <button class="homebtn" onclick="window.location.href='{{DOMAIN}}design';">返 &nbsp;回</button>
                        </td>
                    </tr>
                </table>
            </div>
        </span>
        <input type="hidden" name="id" value="{{ $data->id }}">
        {{--发布方信息--}}
        @include('home.common.info')
    </div>
@stop