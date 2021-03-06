@extends('admin.main')
@section('content')
    <div class="admin-content">
        @include('admin.common.crumb')
        <div class="am-g">
            @include('admin.common.menu')
            <select name="type" style="padding:2px 10px;border:1px solid lightgrey;">
                <option value="0" {{$type==0?'selected':''}}>所有</option>
                @foreach($model['types'] as $k=>$vtype)
                    <option value="{{$k}}" {{$type==$k?'selected':''}}>
                        {{$vtype}}</option>
                @endforeach
            </select>
            <select name="isshow" style="padding:2px 10px;border:1px solid lightgrey;">
                <option value="0" {{ $isshow==0 ? 'selected' : '' }}>所有</option>
                <option value="1" {{ $isshow==1 ? 'selected' : '' }}>不显示</option>
                <option value="2" {{ $isshow==2 ? 'selected' : '' }}>显示</option>
            </select>
            <script>
                $("select[name='type']").change(function(){
                    var type = $("select[name='type']").val();
                    var isshow = $("select[name='isshow']").val();
                    if(type==0 && isshow==0){
                        window.location.href = '{{DOMAIN}}admin/menus';
                    } else {
                        window.location.href = '{{DOMAIN}}admin/menus/s/'+type+'/'+isshow;
                    }
                });
                $("select[name='isshow']").change(function(){
                    var type = $("select[name='type']").val();
                    var isshow = $("select[name='isshow']").val();
                    if(type==0 && isshow==0){
                        window.location.href = '{{DOMAIN}}admin/menus';
                    } else {
                        window.location.href = '{{DOMAIN}}admin/menus/s/'+type+'/'+isshow;
                    }
                });
            </script>
        </div>

        <div class="am-g" id="list">
            <div class="am-u-sm-12">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-check"><input type="checkbox"/></th>
                        <th class="table-id">ID</th>
                        <th class="table-title">菜单名称</th>
                        <th class="table-title">菜单类型</th>
                        <th class="table-type">控制器名称</th>
                        <th class="table-author am-hide-sm-only">父级</th>
                        <th class="table-author am-hide-sm-only" width="80">会员后台是否显示</th>
                        <th class="table-author am-hide-sm-only">排序</th>
                        <th class="table-date am-hide-sm-only">添加时间</th>
                        <th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                @if(count($datas))
                    @foreach($datas as $data)
                    <tr>
                        <td class="am-hide-sm-only"><input type="checkbox" /></td>
                        <td class="am-hide-sm-only">{{$data['id']}}</td>
                        <td class="am-hide-sm-only">
                            <a href="{{DOMAIN}}admin/menus/{{$data['id']}}">{{$data['name']}}</a>
                        </td>
                        <td class="am-hide-sm-only">{{$data['typeName']}}</td>
                        <td class="am-hide-sm-only">{{$data['controller']}}</td>
                        <td class="am-hide-sm-only">{{$data['parentName']}}</td>
                        <td class="am-hide-sm-only">{{$data['isshowName']}}</td>
                        <td class="am-hide-sm-only">{{$data['sort']}}</td>
                        <td class="am-hide-sm-only">{{$data['createTime']}}</td>
                        <td class="am-hide-sm-only">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="{{DOMAIN}}admin/menus/{{$data['id']}}"><button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><img src="{{PUB}}assets/images/show.png" class="icon"> 查看</button></a>
                                    <a href="{{DOMAIN}}admin/menus/{{$data['id']}}/edit"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><img src="{{PUB}}assets/images/edit.png" class="icon"> 编辑</button></a>
                                    @if($data['isshow']==2)
                                    <a href="{{DOMAIN}}admin/menus/isshow/{{$data['id']}}/1"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><img src="{{PUB}}assets/images/edit.png" class="icon"> 去隐藏</button></a>
                                    @elseif($data['isshow']==1)
                                    <a href="{{DOMAIN}}admin/menus/isshow/{{$data['id']}}/2"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><img src="{{PUB}}assets/images/edit.png" class="icon"> 去显示</button></a>
                                    @endif
                                    {{--<a href="{{DOMAIN}}admin/menus/{{$data->id}}/forceDelete"><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><img src="{{PUB}}assets/images/forceDelete_red.png" class="icon"> 销毁记录</button></a>--}}
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else <tr><td colspan="10" style="text-align:center;">没有记录</td></tr>
                @endif
                    </tbody>
                </table>
                @include('admin.common.page2')
            </div>
        </div>
    </div>
@stop