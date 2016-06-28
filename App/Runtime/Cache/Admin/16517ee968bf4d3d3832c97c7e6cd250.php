<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>华创 | 打印页</title>

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
	<body style="background-color:#FFF">
		<div class="page-header">
			<h1>
				快递单打印
				<button id="print" class="btn btn-info">
					打印<i class="ace-icon fa fa-print  align-top bigger-125 icon-on-right"></i>
				</button>
			</h1>
		</div><!-- /.page-header -->
		<img src="/storehouse/Public/images/order.jpg" alt="快递单">
		<script src="/storehouse/Public/js/jquery/jquery.js"></script>
		<script>
			$("#print").click(function(){
				$(".page-header").hide();
				$(this).hide();
				window.print();
				$(".page-header").show();
				$(this).show();
			})
		</script>
	</body>
</html>