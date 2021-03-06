<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'storehouse', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => 'zhang123', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PARAMS' =>  array(), // 数据库连接参数
	'DB_PREFIX' => 'hc_', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
	'URL_MODEL' =>  2,
	'COOKIE_PREFIX'  =>  'hc_',      // Cookie前缀 避免冲突
	'ERROR_PAGE'     =>  '/Public/404.html',	// 错误定向页面

	'TOKEN_ON' => true,  // 是否开启令牌验证
	'TOKEN_NAME' => '__hash__',    // 令牌验证的表单隐藏字段名称
	'TOKEN_TYPE' => 'md5',  //令牌哈希验证规则 默认为MD5
	'TOKEN_RESET' => true,  //令牌验证出错后是否重置令牌 默认为true
);