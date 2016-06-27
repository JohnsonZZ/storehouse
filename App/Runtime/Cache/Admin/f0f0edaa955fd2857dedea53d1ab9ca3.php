<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>登录 | 华创控制台</title>

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
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content mt200">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">华创</span>
									<span class="white" id="id-text2">控制台</span>
								</h1>
							</div>
							<div class="space-6"></div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												登录
												
											</h4>
											
											<div class="space-6"></div>
											<form method="post" action="<?php echo U('Login/login');?>"  class="form-login">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="username" placeholder="账号" autofocus="autofocus"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="pwd" placeholder="密码" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
													<div class="space"></div>
													<div class="clearfix">
															<label class="inline">
																<input type="checkbox" class="ace"  name="remember" />
																<span class="lbl"> 记住我</span>
															</label>
														<button type="submit" id="loginButton" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">登录</span>
														</button>
													</div>
													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->						
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
		<!-- basic scripts -->
		<!-- inline scripts related to this page -->

	</body>
</html>