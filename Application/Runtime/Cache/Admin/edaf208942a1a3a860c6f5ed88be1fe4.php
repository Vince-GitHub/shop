<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>

<?php if($_SESSION['admin'] == null): echo W("Menu/menu");?>

<?php else: ?>


<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>控制台 - 唯风尚：国际品牌官方后台管理系统</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="/shop/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/shop/Public/assets/css/font-awesome.min.css" />


		<link rel="stylesheet" href="/shop/Public/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/shop/Public/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/shop/Public/assets/css/ace-skins.min.css" />

		<script src="/shop/Public/assets/js/ace-extra.min.js"></script>
        <script src="/shop/Public/Admin/js/jquery.js"></script>

	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							唯风尚：国际品牌官方授权购物平台
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<?php echo W('Counts/counts');?>

						<li class="light-blue">
							
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/shop/Public/uploads<?php echo ($_SESSION['admin']['admins_icon']); ?>" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>

									<?php echo ($_SESSION['admin']['admins_name']); ?>
								
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										设置
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										个人资料
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="/shop/admin.php/Login/out">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						
						<li class="active">
							<a href="/shop/admin.php/index/index">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 商城 前台首页 </span>
							</a>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-text-width"></i>
								<span class="menu-text">商城 用户管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/user/index">
										<i class="icon-double-angle-right"></i>
										用户列表
									</a>
								</li>

								<li>
									<a href="/shop/admin.php/user/add">
										<i class="icon-double-angle-right"></i>
                                        添加用户
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> 用户 积分管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/grade/index">
										<i class="icon-double-angle-right"></i>
										用户积分浏览
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-list-alt"></i>
								<span class="menu-text">商城 超级管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/admin/index">
										<i class="icon-double-angle-right"></i>
										浏览管理员
									</a>
								</li>

								<li>
									<a href="/shop/admin.php/admin/add">
										<i class="icon-double-angle-right"></i>
                                      添加管理员
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> 商品 类别管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/type/index">
										<i class="icon-double-angle-right"></i>
										商品类别浏览
									</a>
								</li>

								<li>
									<a href="/shop/admin.php/type/add">
										<i class="icon-double-angle-right"></i>
										添加类别
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-picture"></i>
								<span class="menu-text"> 商品 信息管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/goods/index">
										<i class="icon-double-angle-right"></i>
										商品信息浏览
									</a>
								</li>

								<li>
									<a href="/shop/admin.php/goods/add">
										<i class="icon-double-angle-right"></i>
										添加商品
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-list-alt"></i>
								<span class="menu-text"> 商品 详情管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/gdetail/index">
										<i class="icon-double-angle-right"></i>
										商品详情浏览
									</a>
								</li>

								<li>
									<a href="/shop/admin.php/gdetail/add">
										<i class="icon-double-angle-right"></i>
										添加商品详情
									</a>
								</li>
							</ul>
						</li>						
						
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-calendar"></i>
								<span class="menu-text">商品 订单管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/order">
										<i class="icon-double-angle-right"></i>
										浏览订单
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-list-alt"></i>
								<span class="menu-text">用户 评论管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/comment">
										<i class="icon-double-angle-right"></i>
										浏览评论
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text">网站 友情链接 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/flink">
										<i class="icon-double-angle-right"></i>
										浏览链接
									</a>
								</li>
								<li>
									<a href="/shop/admin.php/flink/add">
										<i class="icon-double-angle-right"></i>
										添加链接
									</a>
								</li>
							</ul>
						</li>

						

						


						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 用户 收货地址 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/profiles/index">
										<i class="icon-double-angle-right"></i>
										查看用户地址
									</a>
								</li>

								<li>
									<a href="/shop/admin.php/profiles/add">
										<i class="icon-double-angle-right"></i>
										添加用户地址
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-tag"></i>
								<span class="menu-text"> 系统 公告管理</span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/notice/index">
										<i class="icon-double-angle-right"></i>
										查看历史公告
									</a>
								</li>

								<li>
									<a href="/shop/admin.php/notice/add">
										<i class="icon-double-angle-right"></i>
										添加即时公告
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-file-alt"></i>

								<span class="menu-text">
									其他 页面管理
									<span class="badge badge-primary ">5</span>
								</span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/shop/admin.php/share/index">
										<i class="icon-double-angle-right"></i>
										用户分享 管理
									</a>
								</li>

								<li>
									<a href="/shop/admin.php/collects/index">
										<i class="icon-double-angle-right"></i>
										商品收藏 管理
									</a>
								</li>
								
								<li>
									<a href="/shop/admin.php/history/index">
										<i class="icon-double-angle-right"></i>
										品牌历史 管理
									</a>
								</li>
								
								<li>
									<a href="/shop/admin.php/Keywords/index">
										<i class="icon-double-angle-right"></i>
										关键字 管理
									</a>
								</li>								
								
								
								<li>
									<a href="error-404.html">
										<i class="icon-double-angle-right"></i>
										404错误页面
									</a>
								</li>

								<li>
									<a href="error-500.html">
										<i class="icon-double-angle-right"></i>
										500错误页面
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>
                    
				
				

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Admin</a>
							</li>

							<li>
								<a href="#">Tables</a>
							</li>
							<li class="active">评论详情</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								评论
								<small>
									<i class="icon-double-angle-right"></i>
									标题：<?php echo ($details['commentDetail_title']); ?>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bdetailed table-hover">
												<thead>
													<tr>
														<th>评论内容</th>
														<td><?php echo ($details['commentDetail_content']); ?></td>
													</tr>
												</thead>
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				
				
				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; 选择皮肤</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl">切换到左边</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								切换窄屏
								<b></b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<!--<script src="/shop/Public/assets/js/jquery-2.0.3.min.js"></script>-->
		<script src="/shop/Public/assets/js/jquery-2.0.3.min.js"></script>
		

		<!-- <![endif]-->

		<!--[if IE]>
<script src="/shop/Public/assets/js/jquery-1.10.2.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/shop/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

        <!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/shop/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/shop/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="/shop/Public/assets/js/bootstrap.min.js"></script>
		<script src="/shop/Public/assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="/shop/Public/assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="/shop/Public/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/shop/Public/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/shop/Public/assets/js/jquery.slimscroll.min.js"></script>
		<script src="/shop/Public/assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="/shop/Public/assets/js/jquery.sparkline.min.js"></script>
		<script src="/shop/Public/assets/js/flot/jquery.flot.min.js"></script>
		<script src="/shop/Public/assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="/shop/Public/assets/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->

		<script src="/shop/Public/assets/js/ace-elements.min.js"></script>
		<script src="/shop/Public/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		
	</body>
</html><?php endif; ?>