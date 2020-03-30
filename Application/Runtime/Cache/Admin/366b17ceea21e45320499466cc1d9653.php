<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>校园二手交易 Admin index Examples</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="/Public/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/Public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="校园二手交易" />
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/Public/assets/css/admin.css">

  <script src="/Public/artDialog/lib/jquery-1.10.2.js"></script>
  <link rel="stylesheet" href="/Public/artDialog/css/ui-dialog.css">
  <link rel="stylesheet" href="/Public/artDialog/css/skin.css">
  <script src="/Public/artDialog/dist/dialog-min.js"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，校园二手交易 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>校园二手交易</strong> <small>后台管理系统（2016届校园二手交易系统毕业设计）</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">

      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> 欢迎您，用户<?php echo (session('username')); ?>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
          <li><a href="/Admin/Item/../user/logout"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>

    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="/Admin/Item/.."><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 常用模块 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="/Admin/Item/../user/all" class="am-cf"><span class="am-icon-check"></span> 用户管理</a></li>
            <li><a href="/Admin/Item/../cate/all"><span class="am-icon-puzzle-piece"></span> 分类管理</a></li>
            <li><a href="/Admin/Item/../item/all"><span class="am-icon-th"></span> 商品管理
            <li><a href="/Admin/Item/../comment/all"><span class="am-icon-calendar"></span> 评论管理</a></li>
            
          </ul>
        </li>
        <li><a  onclick="if (confirm('注销成功！')) location.href='/Admin/Item/../user/logout'"
                ><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>


       
    </div>
  </div>

  <style>
    .detail_l{width:600px; float:left; margin-left:10px; padding-top:20px; font-size:15px;}
    .detail_r{width:370px; float:left; margin-left:20px; padding-top:20px;background-color:#FFFFFF;}
    .pic_box{width:120px; float:left; margin-right:20px; margin-bottom:10px;background-color:#FFFFFF;}
    .pic_box img{width:100%;}
    .price{color:#F30; font-size:16px; font-weight:bold; margin-right:10px;}
    del{color:#999;}

    .comment_box{border-bottom:1px dashed #EAEAEA; font-size:13px; padding-bottom:5px; margin-top:10px;}
    .comment_box_l{width:35px; float:left; background:#eee; margin-right:10px;}
    .comment_box_l img{width:35px;}
    .comment_box_r{float:left;}
    .time{color:#999;}
    .username{color:#666; margin-right:10px;}
</style>
<div class="admin-content">
    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
            <?php if(is_array($pic_list)): $i = 0; $__LIST__ = $pic_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?><div class="pic_box">
                <img src="<?php echo ($pic["url"]); ?>" style="margin-bottom:5px"/>
                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="if (confirm('确定?')) location.href='/Admin/Item/../pic/del?id=<?php echo ($pic["id"]); ?>'"><span class="am-icon-trash-o"></span> 删除</button>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

            <h1><?php echo ($vo["title"]); ?></h1>
            <p><span style="color:#48b9ef; font-size:16px; font-weight:bold;"><?php echo ($vo["username"]); ?></span> 发表于<span style="color:#48b9ef; font-size:16px; font-weight:bold;"><?php echo (mb_substr($vo["created"],0,10,'utf-8')); ?></span></p>
            <p><span class="price">¥<?php echo ($vo["price"]); ?></span></p>
            <p><span style="color:#48b9ef; font-size:16px; font-weight:bold;">描述：</span><?php echo ($vo["content"]); ?></p>

            <h3>留言</h3>
            <hr/>
            <?php if(is_array($comment_list)): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="comment_box">
                <div class="comment_box_l"></div>
                <div class="comment_box_r"><span class="username"><?php echo ($vo["username"]); ?> <?php if(!empty($vo["toUsername"])): ?>回复@<?php echo ($vo["toUsername"]); endif; ?>:</span> <?php echo ($vo["content"]); ?><br/>
                    <span class="time"><?php if(!empty($vo["created"])): echo ($vo["created"]); endif; ?></span>
                </div>
                <div style="clear:both"></div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="/Public/js/admin.js"></script>


</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/Public/assets/js/amazeui.min.js"></script>
<script src="/Public/assets/js/app.js"></script>
</body>
</html>