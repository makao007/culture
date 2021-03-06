<!DOCTYPE html>
<html>
<head>
    <title>微文化-企业管理页面</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="/assets/images/icon.png">
    <link rel="stylesheet" type="text/css" href="/assets-home/css/home.css">
    <link rel="stylesheet" type="text/css" href="/assets-home/css/company.css">
    <link rel="stylesheet" type="text/css" href="/assets-home/css/companyadmin.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/video.css">
    <script src="/assets/js/jquery-1.10.2.min.js"></script>
</head>
<body>
    @include('layout.header')
    @include('company.admin.common.top')
    <div class="content_kongbai" style="height:105px;">&nbsp;</div>
    <div class="com_admin_con">
        @include('company.admin.common.left')

        <div class="com_admin_right">
            {{--@include('company.admin.common.crumb')--}}
            @yield('content')
        </div>

        <div class="content_kongbai" style="height:50px;">&nbsp;</div>
    </div>
    @include('layout.footer')
</body>
</html>