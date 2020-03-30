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
          <li><a href="/Admin/Index/../user/logout"><span class="am-icon-power-off"></span> 退出</a></li>
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
        <li><a href="/Admin/Index/.."><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 常用模块 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="/Admin/Index/../user/all" class="am-cf"><span class="am-icon-check"></span> 用户管理</a></li>
            <li><a href="/Admin/Index/../cate/all"><span class="am-icon-puzzle-piece"></span> 分类管理</a></li>
            <li><a href="/Admin/Index/../item/all"><span class="am-icon-th"></span> 商品管理
            <li><a href="/Admin/Index/../comment/all"><span class="am-icon-calendar"></span> 评论管理</a></li>
            
          </ul>
        </li>
        <li><a  onclick="if (confirm('注销成功！')) location.href='/Admin/Index/../user/logout'"
                ><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>


       
    </div>
  </div>

  <div class="admin-content">

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>一些常用模块</small></div>
  </div>

  <ul class="am-avg-sm-1 am-avg-md-3 am-margin am-padding am-text-center admin-content-list ">
    <li><a href="#" class="am-text-success"><span class="am-icon-btn am-icon-file-text"></span><br/>
      商品数<br/><?php echo ($itemNums); ?></a></li>
    <li><a href="#" class="am-text-warning"><span class="am-icon-btn am-icon-briefcase"></span><br/>
      评论数<br/><?php echo ($commentNums); ?></a></li>
    <li><a href="#" class="am-text-danger"><span class="am-icon-btn am-icon-recycle"></span><br/>
      用户数<br/><?php echo ($userNums); ?></a></li>
    <!-- <li><a href="#" class="am-text-secondary"><span class="am-icon-btn am-icon-user-md"></span><br/><br/></a></li>-->
  </ul>

  <div class="am-g">
    <div class="am-u-sm-12">
      <table class="am-table am-table-bd am-table-striped admin-content-table">
        <thead>
        <tr>
          <th>ID</th>
          <th>商品标题</th>
          <th>评论数</th>
          <th>发布者</th>
          <th>发布时间</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo["id"]); ?></td><td><a href="/Admin/Index/../item/view?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></td> <td><span class="am-badge am-badge-success"><?php echo ($vo["comments"]); ?></span></td>
          <td><?php echo ($vo["username"]); ?></td>
          <td><?php if(!empty($vo["created"])): echo (date('Y-m-d H:i', $vo["created"])); endif; ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- content end -->


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