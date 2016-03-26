{{-- 前台页面菜单导航栏 --}}


<!-- navigate菜单导航栏 -->
<div class="nav" style="">
    <hr>
    <div class="nav_body">
        <div><img src="/assets-home/images/logo.png" class="logo"></div>
        <div class="nav_qiehuan" style="display:{{$curr=='home'?'none':'block'}};">
            <img src="/assets/images/daohang.png" class="imgMiniSize"> 导航
        </div>
        <div class="nav_qh">
            <div class="nav_hide" style="display:{{$curr=='home'?'none':'block'}};">
                <a href="" class="curr">首&nbsp;页</a>
                <a href="" class="nav_a">产品样片</a>
                <a href="creation" class="nav_a">创作窗口</a>
                <a href="" class="nav_a">供应单位</a>
                <a href="" class="nav_a">需求信息</a>
                <a href="" class="nav_a">娱乐频道</a>
                <a href="" class="nav_a">租赁频道</a>
                <a href="" class="nav_a">设计频道</a>
                <a href="" class="nav_a">关于我们</a>
            </div>
        </div>
        <form action="" class="search">
            <input type="text" class="global_search" name="global_search" placeholder="&nbsp;&nbsp;&nbsp;想要啥效果，赶紧找哦">
            <input type="submit" class="global_search_text" value="搜 索">
        </form>
        <div class="key_word">搜索关键词：</div>
        <div class="nav_right">
            <a href=""><img src="/assets/images/key.png" class="imgMiniSize">登陆/注册</a>&nbsp;
            <a href=""><img src="/assets/images/msg.png" class="imgMiniSize">消息</a>&nbsp;
            <a href=""><img src="/assets/images/record.png" class="imgMiniSize">记录</a>
        </div>
        <div class="navigate">
            <div class="navigate_a" style="display:{{$curr=='home'?'block':'none'}};">
                <a href="" class="curr">首&nbsp;页</a>
                <a href="" class="nav_a">产品样片</a>
                <a href="creation" class="nav_a">创作窗口</a>
                <a href="" class="nav_a">供应单位</a>
                <a href="" class="nav_a">需求信息</a>
                <a href="" class="nav_a">娱乐频道</a>
                <a href="" class="nav_a">租赁频道</a>
                <a href="" class="nav_a">设计频道</a>
                <a href="" class="nav_a">关于我们</a>
            </div>
        </div>
    </div>
</div>
<!-- navigate菜单导航栏 -->


<script>
    $(document).ready(function(){
        var nav_qiehuan = $(".nav_qiehuan");
        var nav_qh = $(".nav_qh");
        var nav_hide = $(".nav_hide");
        nav_qiehuan.mouseover(function(){
            nav_hide.show();
            nav_qiehuan.css('border-bottom','0');
        });
        nav_qh.mouseleave(function(){
            nav_hide.hide();
            nav_qiehuan.css('border-bottom','1px solid lightgray');
        });
    });
</script>