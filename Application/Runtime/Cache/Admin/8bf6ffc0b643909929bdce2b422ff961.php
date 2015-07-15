<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>

<?php if($_SESSION['admin'] == null): echo W("Menu/menu");?>

<?php else: ?>


<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>控制台 - 唯风尚：国际品牌官方后台管理系统</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="/hszz/TP/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/hszz/TP/Public/assets/css/font-awesome.min.css" />


		<link rel="stylesheet" href="/hszz/TP/Public/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/hszz/TP/Public/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/hszz/TP/Public/assets/css/ace-skins.min.css" />

		<script src="/hszz/TP/Public/assets/js/ace-extra.min.js"></script>
        <script src="/hszz/TP/Public/Admin/js/jquery.js"></script>

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
								<img class="nav-user-photo" src="/hszz/TP/Public/uploads<?php echo ($_SESSION['admin']['admins_icon']); ?>" alt="Jason's Photo" />
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
									<a href="/hszz/TP/admin.php/Login/out">
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
							<a href="/hszz/TP/admin.php/index/index">
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
									<a href="/hszz/TP/admin.php/user/index">
										<i class="icon-double-angle-right"></i>
										用户列表
									</a>
								</li>

								<li>
									<a href="/hszz/TP/admin.php/user/add">
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
									<a href="/hszz/TP/admin.php/grade/index">
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
									<a href="/hszz/TP/admin.php/admin/index">
										<i class="icon-double-angle-right"></i>
										浏览管理员
									</a>
								</li>

								<li>
									<a href="/hszz/TP/admin.php/admin/add">
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
									<a href="/hszz/TP/admin.php/type/index">
										<i class="icon-double-angle-right"></i>
										商品类别浏览
									</a>
								</li>

								<li>
									<a href="/hszz/TP/admin.php/type/add">
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
									<a href="/hszz/TP/admin.php/goods/index">
										<i class="icon-double-angle-right"></i>
										商品信息浏览
									</a>
								</li>

								<li>
									<a href="/hszz/TP/admin.php/goods/add">
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
									<a href="/hszz/TP/admin.php/gdetail/index">
										<i class="icon-double-angle-right"></i>
										商品详情浏览
									</a>
								</li>

								<li>
									<a href="/hszz/TP/admin.php/gdetail/add">
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
									<a href="/hszz/TP/admin.php/order">
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
									<a href="/hszz/TP/admin.php/comment">
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
									<a href="/hszz/TP/admin.php/flink">
										<i class="icon-double-angle-right"></i>
										浏览链接
									</a>
								</li>
								<li>
									<a href="/hszz/TP/admin.php/flink/add">
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
									<a href="/hszz/TP/admin.php/profiles/index">
										<i class="icon-double-angle-right"></i>
										查看用户地址
									</a>
								</li>

								<li>
									<a href="/hszz/TP/admin.php/profiles/add">
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
									<a href="/hszz/TP/admin.php/notice/index">
										<i class="icon-double-angle-right"></i>
										查看历史公告
									</a>
								</li>

								<li>
									<a href="/hszz/TP/admin.php/notice/add">
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
									<a href="/hszz/TP/admin.php/share/index">
										<i class="icon-double-angle-right"></i>
										用户分享 管理
									</a>
								</li>

								<li>
									<a href="/hszz/TP/admin.php/collects/index">
										<i class="icon-double-angle-right"></i>
										商品收藏 管理
									</a>
								</li>
								
								<li>
									<a href="/hszz/TP/admin.php/history/index">
										<i class="icon-double-angle-right"></i>
										品牌历史 管理
									</a>
								</li>
								
								<li>
									<a href="/hszz/TP/admin.php/Keywords/index">
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
								<a href="#">首页</a>
							</li>

							<li>
								<a href="#">系统公告</a>
							</li>
							<li class="active">历史公告</li>
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
								系统公告
								<small>
									<i class="icon-double-angle-right"></i>
									历史公告
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="tabbable">
											<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
												<li class="li-new-mail pull-right">
													<a data-toggle="tab" href="#write" data-target="write" class="btn-new-mail">
														<span class="btn bt1n-small btn-purple no-border">
															<i class=" icon-envelope bigger-130"></i>
															<span class="bigger-110">Write Mail</span>
														</span>
													</a>
												</li><!-- ./li-new-mail -->

												<li class="active">
													<a data-toggle="tab" href="#inbox" data-target="inbox">
														<i class="blue icon-inbox bigger-130"></i>
														<span class="bigger-110">系统历史公告</span>
													</a>
												</li>
											</ul>

											<div class="tab-content no-border no-padding">
												<div class="tab-pane in active">
													<div class="message-container">
														<div id="id-message-list-navbar" class="message-navbar align-center clearfix">
															<div class="message-bar">
																<div class="message-infobar" id="id-message-infobar">
																	<span class="blue bigger-150">公告列表</span>
																</div>

																<div class="message-toolbar hide">
																	<div class="inline position-relative align-left">
																		<a href="#" class="btn-message btn btn-xs dropdown-toggle" data-toggle="dropdown">
																			<span class="bigger-110">Action</span>

																			<i class="icon-caret-down icon-on-right"></i>
																		</a>

																		<ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
																			<li>
																				<a href="#">
																					<i class="icon-mail-reply blue"></i>
																					&nbsp; Reply
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-mail-forward green"></i>
																					&nbsp; Forward
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-folder-open orange"></i>
																					&nbsp; Archive
																				</a>
																			</li>

																			<li class="divider"></li>

																			<li>
																				<a href="#">
																					<i class="icon-eye-open blue"></i>
																					&nbsp; Mark as read
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-eye-close green"></i>
																					&nbsp; Mark unread
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-flag-alt red"></i>
																					&nbsp; Flag
																				</a>
																			</li>

																			<li class="divider"></li>

																			<li>
																				<a href="#">
																					<i class="icon-trash red bigger-110"></i>
																					&nbsp; Delete
																				</a>
																			</li>
																		</ul>
																	</div>

																	<div class="inline position-relative align-left">
																		<a href="#" class="btn-message btn btn-xs dropdown-toggle" data-toggle="dropdown">
																			<i class="icon-folder-close-alt bigger-110"></i>
																			<span class="bigger-110">Move to</span>

																			<i class="icon-caret-down icon-on-right"></i>
																		</a>

																		<ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
																			<li>
																				<a href="#">
																					<i class="icon-stop pink2"></i>
																					&nbsp; Tag#1
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-stop blue"></i>
																					&nbsp; Family
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-stop green"></i>
																					&nbsp; Friends
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-stop grey"></i>
																					&nbsp; Work
																				</a>
																			</li>
																		</ul>
																	</div>

																	<a href="#" class="btn btn-xs btn-message">
																		<i class="icon-trash bigger-125"></i>
																		<span class="bigger-110">Delete</span>
																	</a>
																</div>
															</div>

															<div>
																<div class="messagebar-item-left">
																	<label class="inline middle">
																		<input type="checkbox" id="id-toggle-all" class="ace" />
																		<span class="lbl"></span>
																	</label>

																	&nbsp;
																	<div class="inline position-relative">
																		<a href="#" data-toggle="dropdown" class="dropdown-toggle">
																			<i class="icon-caret-down bigger-125 middle"></i>
																		</a>

																		<ul class="dropdown-menu dropdown-lighter dropdown-100">
																			<li>
																				<a id="id-select-message-all" href="#">All</a>
																			</li>

																			<li>
																				<a id="id-select-message-none" href="#">None</a>
																			</li>

																			<li class="divider"></li>

																			<li>
																				<a id="id-select-message-unread" href="#">Unread</a>
																			</li>

																			<li>
																				<a id="id-select-message-read" href="#">Read</a>
																			</li>
																		</ul>
																	</div>
																</div>

																<div class="messagebar-item-right">
																	<div class="inline position-relative">
																		<a href="#" data-toggle="dropdown" class="dropdown-toggle">
																			Sort &nbsp;
																			<i class="icon-caret-down bigger-125"></i>
																		</a>

																		<ul class="dropdown-menu dropdown-lighter pull-right dropdown-100">
																			<li>
																				<a href="#">
																					<i class="icon-ok green"></i>
																					Date
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-ok invisible"></i>
																					From
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-ok invisible"></i>
																					Subject
																				</a>
																			</li>
																		</ul>
																	</div>
																</div>

																<div class="nav-search minimized">
																	<form class="form-search">
																		<span class="input-icon">
																			<input type="text" autocomplete="off" class="input-small nav-search-input" placeholder="Search inbox ..." />
																			<i class="icon-search nav-search-icon"></i>
																		</span>
																	</form>
																</div>
															</div>
														</div>

														<div id="id-message-item-navbar" class="hide message-navbar align-center clearfix">
															<div class="message-bar">
																<div class="message-toolbar">
																	<div class="inline position-relative align-left">
																		<a href="#" class="btn-message btn btn-xs dropdown-toggle" data-toggle="dropdown">
																			<span class="bigger-110">Action</span>

																			<i class="icon-caret-down icon-on-right"></i>
																		</a>

																		<ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
																			<li>
																				<a href="#">
																					<i class="icon-mail-reply blue"></i>
																					&nbsp; Reply
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-mail-forward green"></i>
																					&nbsp; Forward
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-folder-open orange"></i>
																					&nbsp; Archive
																				</a>
																			</li>

																			<li class="divider"></li>

																			<li>
																				<a href="#">
																					<i class="icon-eye-open blue"></i>
																					&nbsp; Mark as read
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-eye-close green"></i>
																					&nbsp; Mark unread
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-flag-alt red"></i>
																					&nbsp; Flag
																				</a>
																			</li>

																			<li class="divider"></li>

																			<li>
																				<a href="#">
																					<i class="icon-trash red bigger-110"></i>
																					&nbsp; Delete
																				</a>
																			</li>
																		</ul>
																	</div>

																	<div class="inline position-relative align-left">
																		<a href="#" class="btn-message btn btn-xs dropdown-toggle" data-toggle="dropdown">
																			<i class="icon-folder-close-alt bigger-110"></i>
																			<span class="bigger-110">Move to</span>

																			<i class="icon-caret-down icon-on-right"></i>
																		</a>

																		<ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
																			<li>
																				<a href="#">
																					<i class="icon-stop pink2"></i>
																					&nbsp; Tag#1
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-stop blue"></i>
																					&nbsp; Family
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-stop green"></i>
																					&nbsp; Friends
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="icon-stop grey"></i>
																					&nbsp; Work
																				</a>
																			</li>
																		</ul>
																	</div>

																	<a href="#" class="btn btn-xs btn-message">
																		<i class="icon-trash bigger-125"></i>
																		<span class="bigger-110">Delete</span>
																	</a>
																</div>
															</div>

															<div>
																<div class="messagebar-item-left">
																	<a href="#" class="btn-back-message-list">
																		<i class="icon-arrow-left blue bigger-110 middle"></i>
																		<b class="bigger-110 middle">Back</b>
																	</a>
																</div>

																<div class="messagebar-item-right">
																	<i class="icon-time bigger-110 orange middle"></i>
																	<span class="time grey">Today, 7:15 pm</span>
																</div>
															</div>
														</div>

														<div id="id-message-new-navbar" class="hide message-navbar align-center clearfix">
															<div class="message-bar">
																<div class="message-toolbar">
																	<a href="#" class="btn btn-xs btn-message">
																		<i class="icon-save bigger-125"></i>
																		<span class="bigger-110">Save Draft</span>
																	</a>

																	<a href="#" class="btn btn-xs btn-message">
																		<i class="icon-remove bigger-125"></i>
																		<span class="bigger-110">Discard</span>
																	</a>
																</div>
															</div>

															<div class="message-item-bar">
																<div class="messagebar-item-left">
																	<a href="#" class="btn-back-message-list no-hover-underline">
																		<i class="icon-arrow-left blue bigger-110 middle"></i>
																		<b class="middle bigger-110">Back</b>
																	</a>
																</div>

																<div class="messagebar-item-right">
																	<span class="inline btn-send-message">
																		<button type="button" class="btn btn-sm btn-primary no-border">
																			<span class="bigger-110">Send</span>

																			<i class="icon-arrow-right icon-on-right"></i>
																		</button>
																	</span>
																</div>
															</div>
														</div>

														<div class="message-list-container">
															<div class="message-list" id="message-list">
																<div class="message-item message-unread">
																	<label class="inline">
																		<input type="checkbox" class="ace" />
																		<span class="lbl"></span>
																	</label>

																	<i class="message-star icon-star orange2"></i>
																	<span class="sender" title="Alex John Red Smith">标 题：</span>
																	<span class="time">时 间：</span>
																	<span class="time">&nbsp&nbsp&nbsp&nbsp </span>
																	<span class="time">操 作：</span>
																	<span class="summary">
																		<span class="text">详 情：</span>
																	</span>
																</div>
																
																<?php if(is_array($notices)): foreach($notices as $key=>$notice): ?><div class="message-item">
																	<label class="inline">
																		<input type="checkbox" class="ace" />
																		<span class="lbl"></span>
																	</label>

																	<i class="message-star icon-star-empty light-grey"></i>
																	<span class="sender" title="Shrek"><?php echo ($notice['notice_title']); ?></span>
																	<span class="time"><?php echo (date("Y-m-d",$notice[notice_time])); ?></span>
																	<span class="time">&nbsp&nbsp&nbsp&nbsp </span>
																	<span class="time">
																		
																		<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
																			<!--修改-->
																			<a class="green" href="/hszz/TP/admin.php/Notice/mod/notice_id/<?php echo ($notice['notice_id']); ?>">
																				<i class="icon-pencil bigger-130" title="编辑"></i>
																			</a>丨
																			<!--删除-->
																			<a class="red" href="/hszz/TP/admin.php/Notice/del/notice_id/<?php echo ($notice['notice_id']); ?>">
																				<i class="icon-trash bigger-130" title="删除"></i>
																			</a>
																		</div>
																	
																	</span>
																	

																	<span class="attachment">
																		<i class="icon-paper-clip"></i>
																	</span>

																	<span class="summary">
																		<span class="message-flags">
																			<i class="icon-flag icon-flip-horizontal light-grey"></i>
																		</span>
																		<span class="text">
																			 : <?php echo ($notice['notice_descr']); ?>
																		</span>
																	</span>
																</div><?php endforeach; endif; ?>
															</div>
														</div><!-- /.message-list-container -->

														<div class="message-footer clearfix">
															<div class="pull-right">
																<div class="inline middle"> page 1 of 16 </div>

																&nbsp; &nbsp;
																<ul class="pagination middle">
																	<li class="disabled">
																		<span>
																			<i class="icon-step-backward middle"></i>
																		</span>
																	</li>

																	<li class="disabled">
																		<span>
																			<i class="icon-caret-left bigger-140 middle"></i>
																		</span>
																	</li>

																	<li>
																		<span>
																			<input value="1" maxlength="3" type="text" />
																		</span>
																	</li>

																	<li>
																		<a href="#">
																			<i class="icon-caret-right bigger-140 middle"></i>
																		</a>
																	</li>

																	<li>
																		<a href="#">
																			<i class="icon-step-forward middle"></i>
																		</a>
																	</li>
																</ul>
															</div>
														</div>

														<div class="hide message-footer message-footer-style2 clearfix">
															<div class="pull-left"> simpler footer </div>

															<div class="pull-right">
																<ul class="pagination middle">
																	<li class="disabled">
																		<span>
																			<i class="icon-angle-left bigger-150"></i>
																		</span>
																	</li>

																	<li>
																		<a href="#">
																			<i class="icon-angle-right bigger-150"></i>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</div><!-- /.message-container -->
												</div><!-- /.tab-pane -->
											</div><!-- /.tab-content -->
										</div><!-- /.tabbable -->
									</div><!-- /.col -->
								</div><!-- /.row -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
</body>
</html>

				
				
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

		<!--<script src="/hszz/TP/Public/assets/js/jquery-2.0.3.min.js"></script>-->
		<script src="/hszz/TP/Public/assets/js/jquery-2.0.3.min.js"></script>
		

		<!-- <![endif]-->

		<!--[if IE]>
<script src="/hszz/TP/Public/assets/js/jquery-1.10.2.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/hszz/TP/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

        <!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/hszz/TP/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/hszz/TP/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="/hszz/TP/Public/assets/js/bootstrap.min.js"></script>
		<script src="/hszz/TP/Public/assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="/hszz/TP/Public/assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="/hszz/TP/Public/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/hszz/TP/Public/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/hszz/TP/Public/assets/js/jquery.slimscroll.min.js"></script>
		<script src="/hszz/TP/Public/assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="/hszz/TP/Public/assets/js/jquery.sparkline.min.js"></script>
		<script src="/hszz/TP/Public/assets/js/flot/jquery.flot.min.js"></script>
		<script src="/hszz/TP/Public/assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="/hszz/TP/Public/assets/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->

		<script src="/hszz/TP/Public/assets/js/ace-elements.min.js"></script>
		<script src="/hszz/TP/Public/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		
	</body>
</html><?php endif; ?>