@extends('admin.main')
@section('content')
    <div class="admin-content">
        @include('admin.common.crumb')
        <div class="am-g">
            @include('admin.common.menu')
            {{--@include('admin.type.search')--}}
        </div>
        <hr/>

        <div class="am-g">
            @include('admin.common.info')
            <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                <form class="am-form" data-am-validator method="POST" action="{{DOMAIN}}admin/product/{{$data['id']}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="post">
                    <fieldset>
                        <div class="am-form-group">
                            <label>产品名称 / Name：</label>
                            <input type="text" placeholder="至少2个字符" minlength="2" maxlength="20" required name="name" value="{{$data['name']}}"/>
                        </div>

                        <div class="am-form-group">
                            <label>产品简介 / Introduce：</label>
                            <textarea name="intro" cols="50" rows="5">{{$data['intro']}}</textarea>
                        </div>

                        <div class="am-form-group">
                            <label>用户名 / User Name：</label>
                            <input type="text" placeholder="至少2个字符" minlength="2" maxlength="20" required name="username" value="{{$data['uname']}}"/>
                        </div>

                        <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@stop

