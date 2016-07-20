<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class ResetController extends Controller {
    public function index(){
		$this->display();
	}	
	public function sendEmail(){
		$uphone = I('post.phone');
		$result = M('User')->where("uphone = '$uphone'")->find();
		$key = md5($result['uemail'].time());
		S("key",$key,100);
		$http_url = "<br/>请点击链接重置您的密码。<br/> 
			<a href='http://127.0.0.1/storehouse/Reset/changePwd.html?key=".$key."&id=".$result['id']."' target= 
		'_blank'>http://127.0.0.1/storehouse/Reset/changePwd.html?key=".$key."&id=".$result['id']."</a><br/> 
			如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。"; 
		sendMail($result['uemail'],'重置密码链接',$http_url);
		$uemail = hideStar($result['uemail']);
		$this->ajaxReturn($uemail);
	}
	public function verify(){
		$config = array(
						'fontSize'=>100,
						'length' => 4, 
						); 
		$verify = new \Think\Verify($config);
		$verify->entry();
	}
	public function checkPhone(){
		$uphone = I('post.phone');
			if(!isPhone($uphone)){//判断是否是手机号码
				$this->ajaxReturn(false);
		}
		$User = M('User');
		$result = $User->where("uphone = '$uphone'")->find();
		if($result){
			$this->ajaxReturn(true);
		}else{
			$this->ajaxReturn(false);
		}
	}
	public function checkVerify(){
		$verify = I('post.verify');
		$flag = checkVerify($verify);
		$this->ajaxReturn($flag);
	}
	public function changePwd(){
		$key = I('get.key');
		if(S('key')==$key){
			$id = I('get.id');
			$this->assign("id",$id);
			$this->display();
		}else{
			$this->error("链接已失效");
		}
	}
}