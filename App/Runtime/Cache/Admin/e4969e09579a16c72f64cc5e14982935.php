<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>华创 | 控制台</title>

	<meta name="description" content="华创" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="/storehouse/Bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="/storehouse/Bootstrap/css/font-awesome.css" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="/storehouse/Bootstrap/css/ace-fonts.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="/storehouse/Bootstrap/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
	
	<!--自己添加的css-->
	<link rel="stylesheet" href="/storehouse/Public/css/main.css" />

	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">工具栏</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							华创 | 控制台
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Software Update</span>
													<span class="pull-right">65%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Hardware Upgrade</span>
													<span class="pull-right">35%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:35%" class="progress-bar progress-bar-danger"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Unit Testing</span>
													<span class="pull-right">15%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:15%" class="progress-bar progress-bar-warning"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Bug Fixes</span>
													<span class="pull-right">90%</span>
												</div>

												<div class="progress progress-mini progress-striped active">
													<div style="width:90%" class="progress-bar progress-bar-success"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<img src="/storehouse/Public/images/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="/storehouse/Public/images/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="/storehouse/Public/images/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="/storehouse/Public/images/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														is natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="/storehouse/Public/images/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="<?php echo U('Message/index');?>">
										查看更多消息
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/storehouse/Public/images/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎您</small>
									<?php echo ($_SESSION['username']); ?>
									
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										设置
									</a>
								</li>

								<li>
									<a href="">
										<i class="ace-icon fa fa-user"></i>
										简介
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo U('Login/quit');?>">
										<i class="ace-icon fa fa-power-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar    responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="<?php echo U('Index/index');?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> 控制台 </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li id="allGoods">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> 公司产品 </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li id="listGoods">
								<a href="<?php echo U('Goods/index');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									产品列表
								</a>

								<b class="arrow"></b>
							</li>

							<li id="addGoods">
								<a href="<?php echo U('Goods/add');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									添加产品
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li id="allAccount">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> 账户管理 </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li id="listAccount">
								<a href="<?php echo U('Account/index');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									查看账户
								</a>

								<b class="arrow"></b>
							</li>
							<li id="addAccount">
								<a href="<?php echo U('Account/account');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									添加账户
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					
					<li id="allOrder">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> 订单管理 </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li id="listOrder">
								<a href="<?php echo U('Order/index');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									查看订单
								</a>

								<b class="arrow"></b>
							</li>
							<li id="addOrder">
								<a href="<?php echo U('Order/order');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									发送订单
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li id="allStore">
						<a href="<?php echo U('Store/index');?>">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								仓储管理
							</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li id="allGallery">
						<a href="<?php echo U('Gallery/index');?>">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text"> 图片整理 </span>
						</a>

						
					</li>

					<li id="allAdmin">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> 管理员 </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li id="listAdmin">
								<a href="<?php echo U('Admin/index');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									管理员列表
								</a>

								<b class="arrow"></b>
							</li>

							<li id="addAdmin">
								<a href="<?php echo U('Admin/add');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									添加管理员
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li id="allMessage">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">
								消息管理

								<!-- /section:basics/sidebar.layout.badge -->
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li id="listMessage">
								<a href="<?php echo U('Message/index');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									消息列表
								</a>

								<b class="arrow"></b>
							</li>
							<li id="addMessage">
								<a href="<?php echo U('Message/send');?>">
									<i class="menu-icon fa fa-caret-right"></i>
									发送消息
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					
				</script>
			</div>
			
	
			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">首页</a>
							</li>
							<li class="active">消息管理</li>
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								查看消息
								<small>
									紧急情况致电：18027824032
								</small>
							</h1>
							
						</div><!-- /.page-header -->
						<div class="col-xs-12">
							<!-- #section:pages/inbox -->
							<div class="tabbable">
								<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
									<!-- #section:pages/inbox.compose-btn -->
									<li class="li-new-mail pull-right">
										<a href="<?php echo U('Message/message');?>" class="btn-new-mail">
											<span class="btn btn-purple no-border">
												<i class="ace-icon fa fa-envelope bigger-130"></i>
												<span class="bigger-110">发送消息</span>
											</span>
										</a>
									</li><!-- /.li-new-mail -->

									<!-- /section:pages/inbox.compose-btn -->
									<li class="active">
										<a data-toggle="tab" href="#inbox" data-target="inbox">
											<i class="blue ace-icon fa fa-inbox bigger-130"></i>
											<span class="bigger-110">收件箱</span>
										</a>
									</li>
									
								</ul>

							</div>

							<div id="id-message-item-navbar" class="message-navbar clearfix">
								<div class="message-bar">
									<div class="message-toolbar">
										<div class="inline position-relative align-left">
											<button type="button" class="btn-white btn-primary btn btn-xs dropdown-toggle" data-toggle="dropdown">
												<span class="bigger-110">操作</span>

												<i class="ace-icon fa fa-caret-down icon-on-right"></i>
											</button>

											<ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
												<li>
													<a href="#">
														<i class="ace-icon fa fa-mail-reply blue"></i>&nbsp; Reply
													</a>
												</li>

												<li>
													<a href="#">
														<i class="ace-icon fa fa-mail-forward green"></i>&nbsp; Forward
													</a>
												</li>
											
												<li class="divider"></li>

												<li>
													<a href="#">
														<i class="ace-icon fa fa-trash-o red bigger-110"></i>&nbsp; 删除
													</a>
												</li>
											</ul>
										</div>

										<button type="button" class="btn btn-xs btn-white btn-primary">
											<i class="ace-icon fa fa-trash-o bigger-125 orange"></i>
											<span class="bigger-110">删除</span>
										</button>
									</div>
								</div>

								<div>
									<div class="messagebar-item-left">
										<a href="<?php echo U('Message/index');?>" class="btn-back-message-list">
											<i class="ace-icon fa fa-arrow-left blue bigger-110 middle"></i>
											<b class="bigger-110 middle">返回</b>
										</a>
									</div>

									<div class="messagebar-item-right">
										<i class="ace-icon fa fa-clock-o bigger-110 orange"></i>
										<span class="grey">Today, 7:15 pm</span>
									</div>
								</div>
							</div>

							<div id="id-message-new-navbar" class="hide message-navbar clearfix">
								<div class="message-bar">
									<div class="message-toolbar">
										<button type="button" class="btn btn-xs btn-white btn-primary">
											<i class="ace-icon fa fa-floppy-o bigger-125"></i>
											<span class="bigger-110">Save Draft</span>
										</button>

										<button type="button" class="btn btn-xs btn-white btn-primary">
											<i class="ace-icon fa fa-times bigger-125 orange2"></i>
											<span class="bigger-110">Discard</span>
										</button>
									</div>
								</div>

								<div>
									<div class="messagebar-item-left">
										<a href="#" class="btn-back-message-list">
											<i class="ace-icon fa fa-arrow-left bigger-110 middle blue"></i>
											<b class="middle bigger-110">Back</b>
										</a>
									</div>

									<div class="messagebar-item-right">
										<span class="inline btn-send-message">
											<button type="button" class="btn btn-sm btn-primary no-border btn-white btn-round">
												<span class="bigger-110">Send</span>

												<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
											</button>
										</span>
									</div>
								</div>
							</div>

							<!-- /section:pages/inbox.navbar -->
							<div class="message-list-container">
								<!-- #section:pages/inbox.message-list -->
								<div class="message-list hide" id="message-list">
									<!-- #section:pages/inbox.message-list.item -->
									<div class="message-item message-unread">
										<label class="inline">
											<input type="checkbox" class="ace">
											<span class="lbl"></span>
										</label>

										<i class="message-star ace-icon fa fa-star orange2"></i>
										<span class="sender" title="Alex John Red Smith">Alex John Red Smith </span>
										<span class="time">1:33 pm</span>

										<span class="summary">
											<span class="text">
												Click to open this message
											</span>
										</span>
									</div>

									<!-- /section:pages/inbox.message-list.item -->

									<!-- #section:pages/inbox.message-list.item -->
									<div class="message-item message-unread">
										<label class="inline">
											<input type="checkbox" class="ace">
											<span class="lbl"></span>
										</label>

										<i class="message-star ace-icon fa fa-star-o light-grey"></i>

										<span class="sender" title="John Doe">
											John Doe
											<span class="light-grey">(4)</span>
										</span>
										<span class="time">7:15 pm</span>

										<span class="attachment">
											<i class="ace-icon fa fa-paperclip"></i>
										</span>

										<span class="summary">
											<span class="badge badge-pink mail-tag"></span>
											<span class="text">
												Clik to open this message right here
											</span>
										</span>
									</div>

									<!-- /section:pages/inbox.message-list.item -->

									<!-- #section:pages/inbox.message-list.item -->
									<div class="message-item">
										<label class="inline">
											<input type="checkbox" class="ace">
											<span class="lbl"></span>
										</label>

										<i class="message-star ace-icon fa fa-star-o light-grey"></i>
										<span class="sender" title="Philip Markov">Philip Markov </span>
										<span class="time">10:15 am</span>

										<span class="attachment">
											<i class="ace-icon fa fa-paperclip"></i>
										</span>

										<span class="summary">
											<span class="message-flags">
												<i class="ace-icon fa fa-reply light-grey"></i>
											</span>
											<span class="text">
												Photo booth beard raw denim letterpress vegan
											</span>
										</span>
									</div>

									<!-- /section:pages/inbox.message-list.item -->

									<!-- #section:pages/inbox.message-list.item -->
									<div class="message-item">
										<label class="inline">
											<input type="checkbox" class="ace">
											<span class="lbl"></span>
										</label>

										<i class="message-star ace-icon fa fa-star orange2"></i>
										<span class="sender" title="Sabrina">Sabrina </span>
										<span class="time">Yesterday</span>

										<span class="summary">
											<span class="text">
												Nullam quis risus eget urna mollis ornare
											</span>
										</span>
									</div>

									<!-- /section:pages/inbox.message-list.item -->

									<!-- #section:pages/inbox.message-list.item -->
									<div class="message-item">
										<label class="inline">
											<input type="checkbox" class="ace">
											<span class="lbl"></span>
										</label>

										<i class="message-star ace-icon fa fa-star-o light-grey"></i>
										<span class="sender" title="Philip Markov">Philip Markov </span>
										<span class="time">Yesterday</span>

										<span class="attachment">
											<i class="ace-icon fa fa-paperclip"></i>
										</span>

										<span class="summary">
											<span class="badge badge-success mail-tag"></span>
											<span class="text">
												Vestibulum id ligula porta felis euismod
											</span>
										</span>
									</div>

									<!-- /section:pages/inbox.message-list.item -->

									<!-- #section:pages/inbox.message-list.item -->
									<div class="message-item">
										<label class="inline">
											<input type="checkbox" class="ace">
											<span class="lbl"></span>
										</label>

										<i class="message-star ace-icon fa fa-star-o light-grey"></i>
										<span class="sender" title="Doctor Gomenz">Doctor Gomenz </span>
										<span class="time">April 5</span>

										<span class="summary">
											<span class="text">
												Vim te vivendo convenire, summo fuisset
											</span>
										</span>
									</div>

									<!-- /section:pages/inbox.message-list.item -->

									<!-- #section:pages/inbox.message-list.item -->
									<div class="message-item">
										<label class="inline">
											<input type="checkbox" class="ace">
											<span class="lbl"></span>
										</label>

										<i class="message-star ace-icon fa fa-star-o light-grey"></i>
										<span class="sender" title="Robin Hood">Robin Hood </span>
										<span class="time">April 4</span>

										<span class="summary">
											<span class="message-flags">
												<i class="ace-icon fa fa-reply light-grey"></i>
											</span>
											<span class="text">
												No eos veniam equidem mentitum, his porro
											</span>
										</span>
									</div>

									<!-- /section:pages/inbox.message-list.item -->

									<!-- #section:pages/inbox.message-list.item -->
									<div class="message-item">
										<label class="inline">
											<input type="checkbox" class="ace">
											<span class="lbl"></span>
										</label>

										<i class="message-star ace-icon fa fa-star-o light-grey"></i>
										<span class="sender" title="Google Inc">Google Inc </span>
										<span class="time">April 3</span>

										<span class="summary">
											<span class="badge badge-grey mail-tag"></span>
											<span class="text">
												Convallis facilisis euismod urna sodales
											</span>
										</span>
									</div>

									<!-- /section:pages/inbox.message-list.item -->

									<!-- #section:pages/inbox.message-list.item -->
									<div class="message-item">
										<label class="inline">
											<input type="checkbox" class="ace">
											<span class="lbl"></span>
										</label>

										<i class="message-star ace-icon fa fa-star-o light-grey"></i>
										<span class="sender" title="Shrek">Shrek </span>
										<span class="time">March 28</span>

										<span class="attachment">
											<i class="ace-icon fa fa-paperclip"></i>
										</span>

										<span class="summary">
											<span class="message-flags">
												<i class="ace-icon fa fa-flag fa-flip-horizontal light-grey"></i>
											</span>
											<span class="text">
												Photo booth beard raw denim letterpress vegan messenger
											</span>
										</span>
									</div>

									<!-- /section:pages/inbox.message-list.item -->

									<!-- #section:pages/inbox.message-list.item -->
									<div class="message-item">
										<label class="inline">
											<input type="checkbox" class="ace">
											<span class="lbl"></span>
										</label>

										<i class="message-star ace-icon fa fa-star-o light-grey"></i>
										<span class="sender" title="Yahoo!">Yahoo! </span>
										<span class="time">March 27</span>

										<span class="summary">
											<span class="message-flags">
												<i class="ace-icon fa fa-mail-forward light-grey"></i>
											</span>
											<span class="text">
												Tofu biodiesel williamsburg marfa, four loko mcsweeney
											</span>
										</span>
									</div>

									<!-- /section:pages/inbox.message-list.item -->
								</div>
								<div class="message-content" id="id-message-content">
									<!-- #section:pages/inbox.message-header -->
									<div class="message-header clearfix">
										<div class="pull-left">
											<span class="blue bigger-125"> Clik to open this message </span>

											<div class="space-4"></div>

											<i class="ace-icon fa fa-star orange2"></i>

											&nbsp;
											
											&nbsp;
											<a href="#" class="sender">John Doe</a>

											&nbsp;
											<i class="ace-icon fa fa-clock-o bigger-110 orange middle"></i>
											<span class="time grey">Today, 7:15 pm</span>
										</div>

										<div class="pull-right action-buttons">
											<a href="#">
												<i class="ace-icon fa fa-reply green icon-only bigger-130"></i>
											</a>

											<a href="#">
												<i class="ace-icon fa fa-mail-forward blue icon-only bigger-130"></i>
											</a>

											<a href="#">
												<i class="ace-icon fa fa-trash-o red icon-only bigger-130"></i>
											</a>
										</div>
									</div>

									<!-- /section:pages/inbox.message-header -->
									<div class="hr hr-double"></div>

									<!-- #section:pages/inbox.message-body -->
									<div class="message-body ace-scroll" style="position: relative;">
										<div class="scroll-content">
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
											</p>

											<p>
												Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											</p>

											<p>
												Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
											</p>

											<p>
												Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
											</p>

											<p>
												Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
											</p>

											<p>
												Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											</p>
											<p>
												Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											</p>
											<p>
												Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											</p>
										</div>
									</div>

									<!-- /section:pages/inbox.message-body -->
									<div class="hr hr-double"></div>

								</div>

								<!-- /section:pages/inbox.message-list -->
							</div>

								<!-- #section:pages/inbox.message-footer -->
							<div class="message-footer clearfix hide">
								<div class="pull-left"> 151 messages total </div>

								<div class="pull-right">
									<div class="inline middle"> page 1 of 16 </div>

									&nbsp; &nbsp;
									<ul class="pagination middle">
										<li class="disabled">
											<span>
												<i class="ace-icon fa fa-step-backward middle"></i>
											</span>
										</li>

										<li class="disabled">
											<span>
												<i class="ace-icon fa fa-caret-left bigger-140 middle"></i>
											</span>
										</li>

										<li>
											<span>
												<input value="1" maxlength="3" type="text">
											</span>
										</li>

										<li>
											<a href="#">
												<i class="ace-icon fa fa-caret-right bigger-140 middle"></i>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="ace-icon fa fa-step-forward middle"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>

							<div class="message-footer message-footer-style2 clearfix">
								<div class="pull-left"> simpler footer </div>

								<div class="pull-right">
									<div class="inline middle"> message 1 of 151 </div>

									&nbsp; &nbsp;
									<ul class="pagination middle">
										<li class="disabled">
											<span>
												<i class="ace-icon fa fa-angle-left bigger-150"></i>
											</span>
										</li>

										<li>
											<a href="#">
												<i class="ace-icon fa fa-angle-right bigger-150"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>

														<!-- /section:pages/inbox.message-footer -->
						</div>
					</div><!-- /.tabbable -->

										<!-- /section:pages/inbox -->
				</div>
			</div><!-- /.page-content -->
		</div>
		

		<!-- basic scripts -->
		<div class="footer">
	<div class="footer-inner">
		<!-- #section:basics/footer -->
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder">仓储</span>
				物流系统 &copy; 版权所有 肇庆华创信息科技有限公司 2016
			</span>

			&nbsp; &nbsp;
			
		</div>

		<!-- /section:basics/footer -->
	</div>
</div>
				<script src="/storehouse/Public/js/jquery/jquery.js"></script>   
		
		<!-- layer 2.2 -->
		<script src="/storehouse/Plugins/layer/layer.js"></script>
		<script src="/storehouse/Bootstrap/js/bootstrap.js"></script>   

		<!-- ace scripts -->
		<script src="/storehouse/Public/js/ace/ace.js"></script>
		<script src="/storehouse/Public/js/ace/ace.sidebar.js"></script>
		<script src="/storehouse/Public/js/ace/ace.sidebar-scroll-1.js"></script>

		<script type="text/javascript">
			$('#allMessage').addClass("active").siblings().removeClass("active");
			$('#listMessage').addClass("active");
			$("#print").click(function(){
				layer.open({
				    type: 2,
				    title: '打印页',
				    shadeClose: true,
				    shade: 0.8,
				    area: ['1358px', '900px'],
				    content: "<?php echo U(table);?>"
			}); 
			})
			
		</script>
		


	</body>
</html>