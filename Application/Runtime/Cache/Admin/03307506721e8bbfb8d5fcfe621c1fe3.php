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

  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">常用</strong> / <small>分类管理</small></div>
      </div>
      <hr>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default" onClick="location.href='/Admin/Cate/../cate/add'"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
              <span style="color:red"> <?php echo ($msg); ?></span>
            </div>
          </div>
        </div>

        <div class="am-u-sm-12 am-u-md-3">
        <form method="get" action="">
          <div class="am-input-group am-input-group-sm">


          </div>
          </form>
        </div>

      </div>
      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped  table-main">
              <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">类名</th><th class="table-date am-hide-sm-only"></th><th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><input type="checkbox" /></td>
                <td><?php echo ($vo["id"]); ?></td>
                <td><a href="#"><?php echo ($vo["name"]); ?></a></td>
                <td class="am-hide-sm-only"><?php if(!empty($vo["created"])): echo (date('Y-m-d H:i',$vo["created"])); endif; ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary" onClick="location.href='/Admin/Cate/../cate/edit?id=<?php echo ($vo["id"]); ?>'"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      <button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="if (confirm('确定?')) location.href='/Admin/Cate/../cate/del?id=<?php echo ($vo["id"]); ?>'"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>                </td>
              </tr>
                <?php if(is_array($vo["subCate"])): $i = 0; $__LIST__ = $vo["subCate"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subvo): $mod = ($i % 2 );++$i;?><tr>
                    <td><input type="checkbox" /></td>
                    <td><?php echo ($subvo["id"]); ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><?php echo ($subvo["name"]); ?></a></td>
                    <td class="am-hide-sm-only"><?php if(!empty($vo["created"])): endif; ?></td>
                    <td>
                      <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                          <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary" onClick="location.href='/Admin/Cate/../cate/edit?id=<?php echo ($subvo["id"]); ?>'"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                          <button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="if (confirm('删除失败，该分类下还有商品')) location.href='/Admin/Cate/../cate/del?id=<?php echo ($subvo["id"]); ?>'"><span class="am-icon-trash-o"></span> 删除</button>
                        </div>
                      </div>                </td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
              </tbody>
            </table>
            <div class="am-cf">
              共 <?php echo ($count); ?>条记录 <?php echo ($msg); ?>
              <div class="am-fr">

                <ul class="am-pagination">
                  <div class="digg" ><?php echo ($pageBar); ?></div>
                </ul>
              </div>
            </div>
            <hr />
            <p></p>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script language="javascript">
    $(document).ready(function(){
      var d = dialog({
        title: '提示',
        content: '该类别下还有商品，请先删除商品才能移除类别！',
        cancel: false,
        quickClose: true
      });

      if(show ==1) d.showModal();
    });
  </script>

  <style>
  DIV.digg { 
PADDING-RIGHT: 3px; PADDING-LEFT: 3px; PADDING-BOTTOM: 3px;
 MARGIN: 3px; PADDING-TOP: 3px; TEXT-ALIGN: center 
} 
DIV.digg A { 
BORDER-RIGHT: #aaaadd 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #aaaadd 1px solid;
 PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; MARGIN: 2px; 
BORDER-LEFT: #aaaadd 1px solid; COLOR: #000099; PADDING-TOP: 2px;
 BORDER-BOTTOM: #aaaadd 1px solid; TEXT-DECORATION: none 
} 
DIV.digg A:hover { 
BORDER-RIGHT: #000099 1px solid; BORDER-TOP: #000099 1px solid;
 BORDER-LEFT: #000099 1px solid; COLOR: #000; BORDER-BOTTOM: #000099 1px solid 
} 
DIV.digg A:active { 
BORDER-RIGHT: #000099 1px solid; BORDER-TOP: #000099 1px solid;
 BORDER-LEFT: #000099 1px solid; COLOR: #000; BORDER-BOTTOM: #000099 1px solid 
} 
DIV.digg SPAN.current { 
BORDER-RIGHT: #000099 1px solid; PADDING-RIGHT: 5px;
 BORDER-TOP: #000099 1px solid; PADDING-LEFT: 5px; FONT-WEIGHT: bold;
 PADDING-BOTTOM: 2px; MARGIN: 2px; BORDER-LEFT: #000099 1px solid;
 COLOR: #fff; PADDING-TOP: 2px; BORDER-BOTTOM: #000099 1px solid; BACKGROUND-COLOR: #000099 
} 
DIV.digg SPAN.disabled { 
BORDER-RIGHT: #eee 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #eee 1px solid;
 PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; MARGIN: 2px;
 BORDER-LEFT: #eee 1px solid; COLOR: #ddd; PADDING-TOP: 2px;
 BORDER-BOTTOM: #eee 1px solid 
} 
  </style>
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