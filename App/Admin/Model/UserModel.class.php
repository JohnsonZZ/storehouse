<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {
	protected $_validate = array(
		array('phone','','号码已注册！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		array('rpwd','pwd','两次密码不一样！',0,'confirm'), // 验证确认密码是否和密码一致
	);
}
