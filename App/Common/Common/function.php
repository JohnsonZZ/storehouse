<?php
/**
	* 函数：日志记录
	* @param  string $log   日志内容。
	* @param  string $account （可选）用户名。
	* @return 无返回值
	*/
function addlog($log,$account=false){
	$Model = M('log');
	if(!$account){
		$data['user'] = session('username');
		
	}else{
		$data['user'] = $account;
	}
	$data['ip'] = $_SERVER["REMOTE_ADDR"];
	$data['log'] = $log;
	$Model->data($data)->add();
}

/**
    * 手机号码判断
	* 号码规则：1. 手机号是11位的
				2. 1开头
				3. 第二个数字是34578, 2014.5.5日170号段的手机号开卖所以这里多了个7
				"/^1[34578]\d{9}$/"
    * @static
    * @access public
    * @param string $phone 手机号码
    * @return TRUE OR FALSE
    */

function isPhone($phone){
	$preg = "/^1[34578]\d{9}$/";
	if(preg_match($preg , $phone)){
		return true;
	}else{
		return false;
	}
}
/**
    * 密码判断
	* 密码规则：1.长度为6到10个字符
				2.不能纯数字
				3.不能全是空格
    * @static
    * @access public
    * @param string $pwd 密码
    * @return TRUE OR FALSE
    */
function isPassword($pwd){
	//长度为6到10个字符
	$pattern1 = '/^.{6,10}$/';
	if(!preg_match($pattern1,$pwd)){
		return false;
	}
	// 纯数字
	$pattern2 = '/^\d+$/';
	if(preg_match($pattern2,$pwd)){
		return false;
	}
	// 全部重复
    $repeat = true;
    // 连续字符
    $series = true;
	$len = strlen($pwd);
	$first = substr($pwd,0,1); 
	for($i = 1;$i < $len;$i++){
		$repeat = $repeat && substr($pwd,$i,1)==$first;
	}
	return !$repeat;
}

/**
     * 字符串截取，支持中文和其他编码
     * @static
     * @access public
     * @param string $str 需要转换的字符串
     * @param string $start 开始位置
     * @param string $length 截取长度
     * @param string $charset 编码格式
     * @param string $suffix 截断显示字符
     * @return string
     */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
    if(function_exists("mb_substr")){
            if ($suffix && strlen($str)>$length)
                return mb_substr($str, $start, $length, $charset)."...";
        else
                 return mb_substr($str, $start, $length, $charset);
    }
    elseif(function_exists('iconv_substr')) {
            if ($suffix && strlen($str)>$length)
                return iconv_substr($str,$start,$length,$charset)."...";
        else
                return iconv_substr($str,$start,$length,$charset);
    }
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix) return $slice."…";
    return $slice;
}