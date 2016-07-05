<?php
namespace Seller\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class LoginController extends Controller {
    public function index(){
		$this->display();
		}	
	public function login(){
		$User = M('User');
		$uphone = I('post.uphone');
		$pwd = I('post.pwd');
		$remember = I('post.remember');
		$result = $User->where("uphone = '$uphone'")->find();
		if($result){
			if($result['pwd'] == sha1($pwd.$result['salt'])){
				if($remember){
					cookie('uphone',$uphone,604800);
					cookie('username',$result['name'],604800);
					cookie('pwd',$result['pwd'],604800);
					cookie('id',$result['id'],604800);
				}
				session('uphone',$uphone);
				session('username',$result['name']);
				session('pwd',$result['pwd']);
				session('id',$result['id']);
				addlog('登录成功');
				$this->redirect('Order/index');
			} else {
				$this->error('密码错误');
			}
		} else {
			$this->error('账号不存在');
		}
	}
	public function quit(){
		session(null);
		cookie(null,'hc_');
		$this->redirect('index');
	}

}