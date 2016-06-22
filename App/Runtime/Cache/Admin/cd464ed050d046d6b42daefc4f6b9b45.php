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
				用户日志
				<button id="print" class="btn btn-info">
					打印<i class="ace-icon fa fa-print  align-top bigger-125 icon-on-right"></i>
				</button>
			</h1>
		</div><!-- /.page-header -->
		<table id="simple-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>用户</th>
						<th>IP</th>
						<th class="logcontent">日志内容</th>
						<th>时间</th>
					</tr>
				</thead>

				<tbody>
					<?php if(is_array($log)): foreach($log as $key=>$val): ?><tr>
							<td><?php echo ($val['username']); ?></td>
							<td><?php echo ($val['ip']); ?></td>
							<td><?php echo ($val['log']); ?></td>
							<td><?php echo ($val['time']); ?></td>
						</tr><?php endforeach; endif; ?>
				</tbody>	
		</table>
		<script src="/storehouse/Public/js/jquery/jquery.js"></script>
		<script>
			$("#print").click(function(){
				$(this).hide();
				window.print();
				$(this).show();
			})
		</script>
	</body>
</html>