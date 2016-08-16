<?php

define('URL_CALLBACK', "http://store.cxg-e.com/Index/callback?type=");
return array(
	//'配置项'=>'配置值'
	//腾讯QQ登录配置
    'THINK_SDK_QQ' => array(
        'APP_KEY' => '101205983', //应用注册成功后分配的 APP ID
        'APP_SECRET' => '9380197af5efd5c47bc561323047ccec', //应用注册成功后分配的KEY
        'CALLBACK' => URL_CALLBACK . 'qq',
    ),
    //新浪微博配置
    'THINK_SDK_SINA' => array(
        'APP_KEY' => '2676466010', //应用注册成功后分配的 APP ID
        'APP_SECRET' => 'd03c56f28a98724ada115299160fc7f3', //应用注册成功后分配的KEY
        'CALLBACK' => URL_CALLBACK . 'sina',
    ),
);