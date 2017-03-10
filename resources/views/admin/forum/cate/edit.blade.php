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
                <form class="am-form" data-am-validator method="POST" action="{{DOMAIN}}admin/cate/{{$data['id']}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="POST">
                    <fieldset>
                        <div class="am-form-group">
                            <label>类别名称 / Name：</label>
                            <input type="text" placeholder="至少2个字符" minlength="2" maxlength="20" name="name" required value="{{$data['name']}}"/>
                        </div>

                        <div class="am-form-group">
                            <label>父级类别 / Parent：</label>
                            <select name="pid" required onchange="getTopic(this.value)">
                                <option value="0" {{$data['pid']==0?'selected':''}}>0级</option>
                                @if(count($cates))
                                    @foreach($cates as $cate)
                                    <option value="{{$cate['id']}}" {{$data['pid']==$cate['id']?'selected':''}}>--{{$cate['name']}}</option>
                                        @if(count($cate['child']))
                                            @foreach($cate['child'] as $cate2)
                                                <option value="{{$cate2['id']}}" {{$data['pid']==$cate2['id']?'selected':''}}>----{{$cate2['name']}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="am-form-group" id="topic">
                            <label>所属专栏 / Topic：</label>
                            <select name="topic_id" required>
                                @if(count($topics))
                                    @foreach($topics as $topic)
                                        <option value="{{$topic['id']}}" {{$data['pid']==$topic['id']?'selected':''}}>{{$topic['name']}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="am-form-group">
                            <label>内容 / Introduce：</label>
                            <textarea cols="50" rows="5" placeholder="" name="intro">{{$data['intro']}}</textarea>
                        </div>

                        <button type="submit" class="am-btn am-btn-primary" onclick="history.go(-1)">返回</button>
                        <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <script>
        function getTopic(pid){
            if (pid!=0) {
                $("#topic").hide();
            } else {
                $("#topic").show();
            }
        }
    </script>
@stop

