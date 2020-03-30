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
          <li><a href="/Admin/Cate/../user/logout"><span class="am-icon-power-off"></span> 退出</a></li>
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
        <li><a href="/Admin/Cate/.."><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 常用模块 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="/Admin/Cate/../user/all" class="am-cf"><span class="am-icon-check"></span> 用户管理</a></li>
            <li><a href="/Admin/Cate/../cate/all"><span class="am-icon-puzzle-piece"></span> 分类管理</a></li>
            <li><a href="/Admin/Cate/../item/all"><span class="am-icon-th"></span> 商品管理
            <li><a href="/Admin/Cate/../comment/all"><span class="am-icon-calendar"></span> 评论管理</a></li>
            
          </ul>
        </li>
        <li><a  onclick="if (confirm('注销成功！')) location.href='/Admin/Cate/../user/logout'"
                ><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>


       
    </div>
  </div>

  
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><eq name="Think.get.id" value="">添加<else/>/编辑</eq>商品类别</strong>  <small></small></div>
      </div>

      <hr/>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        </div>

        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
          <form class="am-form am-form-horizontal" action="" method="post">
            <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">选择一级类别</label>
              <div class="am-u-sm-9">
                <select name="tid">
                  <option value="0">选择分类</option>
                  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"]) == $cate["tid"]): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
              </div>
            </div>

            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">类别名</label>
              <div class="am-u-sm-9">
                <input type="hidden" name="id" value="<?php echo ($cate["id"]); ?>" >
                <input type="text" name="name" placeholder="" value="<?php echo ($cate["name"]); ?>" >
                <small></small>
              </div>
            </div>



            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <input type="hidden" name="uid" value="<?php echo ($vo["uid"]); ?>"/>
                <button type="submit" class="am-btn am-btn-primary">保存</button>
				<button type="button" class="am-btn am-btn-default  am-radius" onClick="history.go(-1)">返回</button>
                <span style="color:red"> <?php echo ($msg); ?></span>
              </div>
            </div>
          </form>
        </div>
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