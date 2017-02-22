@extends('admin.main')
@section('content')
    <div class="admin-content">
        @include('admin.common.crumb')
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a href="{{DOMAIN}}admin/provideo/create">
                            <button type="button" class="am-btn am-btn-default">
                                <img src="{{PUB}}assets/images/add.png" class="icon"> 添加
                            </button>
                        </a>
                        @if(env('APP_ENV')=='local' && env('APP_DEBUG')=='true' && Session::get('admin.username')=='jiuge')
                        <a href="{{DOMAIN}}admin/provideo/clear">
                            <button type="button" class="am-btn am-btn-default">
                                <b style="color:orangered;">清空表</b>
                            </button>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="am-form-group">
                <select name="genre" style="margin-right:20px;padding:5px 10px;border:1px solid lightgrey;float:right;">
                    <option value="2" {{$genre==2?'selected':''}}>效果定制</option>
                    <option value="1" {{$genre==1?'selected':''}}>动画定制</option>
                </select>
                <script>
                    $("select[name='genre']").change(function(){
                        var genre = $(this).val();
                        if (genre==2) {
                            window.location.href = '{{DOMAIN}}admin/provideo';
                        } else {
                            window.location.href = '{{DOMAIN}}admin/provideo/s/'+genre;
                        }
                    });
                </script>
            </div>
        </div>
        <hr>

        <div class="am-g">
            <div class="am-u-sm-12">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-check"><input type="checkbox"/></th>
                        <th class="table-id">ID</th>
                        <th class="table-title">名称</th>
                        <th class="table-type">类型</th>
                        <th class="table-type">类别</th>
                        <th class="table-type">用户名称</th>
                        <th class="table-date am-hide-sm-only">添加时间</th>
                        <th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                @if(count($datas))
                    @foreach($datas as $data)
                    <tr>
                        <td class="am-hide-sm-only"><input type="checkbox" /></td>
                        <td class="am-hide-sm-only">{{ $data->id }}</td>
                        <td class="am-hide-sm-only"><a href="{{DOMAIN}}admin/proVideo/{{$data->id}}">{{ $data->name }}</a></td>
                        <td class="am-hide-sm-only">{{ $data->getGenreName() }}</td>
                        <td class="am-hide-sm-only">{{ $data->getCate() }}</td>
                        <td class="am-hide-sm-only">{{ $data->getUName() }}</td>
                        <td class="am-hide-sm-only">{{ $data->createTime() }}</td>
                        <td class="am-hide-sm-only">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="{{DOMAIN}}admin/proVideo/{{$data->id}}"><button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><img src="{{PUB}}assets/images/show.png" class="icon"> 查看</button></a>
                                    <a href="{{DOMAIN}}admin/provideo/{{$data->id}}/edit"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><img src="{{PUB}}assets/images/edit.png" class="icon"> 编辑</button></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else @include('admin.common.#norecord')
                @endif
                    </tbody>
                </table>
                @include('admin.common.#page')
            </div>
        </div>
    </div>
@stop