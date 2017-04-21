@extends('home.main')
@section('content')
    @include('home.common.crumb')

    <div class="idea_show">
        <span class="idea_left">
            <div class="idea_con">
                <p class="title">{{ $data->name }}</p>
                <table>
                    <tr>
                        <td width="100">影片名称：</td>
                        <td>{{ $data->name }}</td>
                    </tr>

                    <tr>
                        <td>类型：</td>
                        <td>{{ $data->getCateName() }}</td>
                    </tr>

                    <tr>
                        <td>简介：</td>
                        <td>{{ $data->intro }}</td>
                    </tr>

                    <tr>
                        <td>大图：</td>
                        <td>{{ $data->getPicUrl() }}</td>
                    </tr>

                    <tr>
                        <td>详情：</td>
                        <td>{!! $data->detail !!}</td>
                    </tr>

                    <tr>
                        <td>参与演员：</td>
                        <td>
                            @if(count($data->getActors()))
                                @foreach($data->getActors() as $actor)
                                    <div style="margin:2px 10px;float:left;">{{ $actor->name }}</div>
                                @endforeach
                            @endif
                        </td>
                    </tr>

                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            {{--<button class="homebtn" onclick="history.go(-1)">返 &nbsp;&nbsp;&nbsp;回</button>--}}
                            <button class="homebtn" onclick="window.location.href='{{DOMAIN}}entertain/2/0';">返 &nbsp;回</button>
                        </td>
                    </tr>
                </table>
            </div>
        </span>
        <input type="hidden" name="id" value="{{ $data->id }}">
        {{--发布方信息--}}
        @include('home.common.userinfo')
    </div>
@stop