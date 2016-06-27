<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
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
								<a href="<?php echo U('Index/index');?>">首页</a>
							</li>
							<li class="active">图片</li>
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
							<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div>
									<ul class="ace-thumbnails clearfix">
										
											<!-- #section:pages/gallery.caption -->
										<?php $__FOR_START_13231__=2;$__FOR_END_13231__=$lenFolder;for($i=$__FOR_START_13231__;$i < $__FOR_END_13231__;$i+=1){ ?><li id="ul-margin" >
												<a href="<?php echo U('image');?>?folder=<?php echo ($folder[$i]); ?>" data-rel="colorbox" class="cboxElement">
													<img width="150" height="150" alt="150x150" src="/storehouse/Public/images/timg1.jpg">	
												</a>
												<div class="tags label-right">
												<span class="label-holder">
														<span class="label" ><?php echo ($folder[$i]); ?></span>
													</span>
												</div>
												<div class="tools tools-top">													
												
													<a href="javascript:void(0);" class="del-folder" val="<?php echo U('delFolder');?>?folder=<?php echo ($folder[$i]); ?>" >
														<i class="ace-icon fa fa-times red" title="删除"></i>
													</a>
												</div>
											</li><?php } ?>
										<?php $__FOR_START_956__=1;$__FOR_END_956__=$lenFiles;for($i=$__FOR_START_956__;$i < $__FOR_END_956__;$i+=1){ ?><li  id="ul-margin" >
												<?php if( $i == 1 ): ?><a href="<?php echo U('index');?>" data-rel="colorbox" class="cboxElement">
														<img width="150" height="150" alt="150x150" src="/storehouse/Public/images/timg1.jpg" />	
													</a>
													<div class="tags label-right">
													<span class="label-holder">
															<span class="label" ><?php echo ($files[$i]); ?></span>
													</span>
												</div>
												<?php else: ?>
												<a href="javascript:void(0);" data-rel="colorbox" class="cboxElement files">
													<img width="150" height="150" alt="150x150" src="/storehouse/Public/upload/image/<?php echo ($where); ?>/<?php echo ($files[$i]); ?>" />	
												</a>
												<div class="tags label-right">
												<span class="label-holder">
														<span class="label" ><?php echo ($files[$i]); ?></span>
												</span>
												</div>
												<div class="tools tools-top">
													
													<a href="">
														<i class="ace-icon fa fa-pencil" title="查看"></i>
													</a>

													<a href="javascript:void(0);" class="del-file" val="<?php echo U('delFile');?>?folder=<?php echo ($where); ?>&file=<?php echo ($files[$i]); ?>" >
														<i class="ace-icon fa fa-times red" title="删除"></i>
													</a>
												</div><?php endif; ?>
											</li><?php } ?>
										
									
									</ul>
									<ul class="pagination pull-right">
										  <?php echo ($page); ?>
										</ul>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div>
						<div class="page-header">
							
						</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
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
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<!-- basic scripts -->	
				<script src="/storehouse/Public/js/jquery/jquery.js"></script>   
		
		<!-- layer 2.2 -->
		<script src="/storehouse/Plugins/layer/layer.js"></script>
		<script src="/storehouse/Bootstrap/js/bootstrap.js"></script>   

		<!-- ace scripts -->
		<script src="/storehouse/Public/js/ace/ace.js"></script>
		<script src="/storehouse/Public/js/ace/ace.sidebar.js"></script>
		<script src="/storehouse/Public/js/ace/ace.sidebar-scroll-1.js"></script>

		<script src="/storehouse/Plugins/layer/layer.js"></script>
		<script>
		    $(".files").each(function(){
				$(this).click(function(){
					var src = $(this).children().attr("src");
					layer.open({
					  type: 1,
					  title: false,
					  closeBtn: 0,
					  maxWidth: 1000,
					  scrollbar: false,
					  skin: 'layui-layer-nobg', //没有背景色
					  shadeClose: true,
					  content: "<img style='max-width:1000px;' src="+src+">"
					});
					$(".layui-layer-content").css("overflow-x","hidden");
				})
			});
			$('#allGallery').addClass('active').siblings().removeClass("active");
			$('.del-folder').click(function(){		
				var val = $(this).attr('val');
				layer.open({
					icon:0,
					title: '删除文件夹',
					type: 0, 
					content: '是否删除选中的文件夹<br />(文件也随之删除)',
					btn: ['确认', '取消'],
					yes: function(){
						location.href = val;
						}
				});		
			});
			$('.del-file').click(function(){		
				var val = $(this).attr('val');
				layer.open({
					icon:0,
					title: '删除图片',
					type: 0, 
					content: '是否删除选中的图片',
					btn: ['确认', '取消'],
					yes: function(){
						location.href = val;
						}
				});		
			});
		</script>

	</body>
</html>