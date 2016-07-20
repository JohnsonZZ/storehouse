<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class LoginController extends Controller {
    public function index(){
		$this->display();
		}	
	public function login(){
		$Admin = M('Admin');
		$username = I('post.username');
		$pwd = I('post.pwd');
		$remember = I('post.remember');
		$result = $Admin->where("username = '$username'")->find();
		if($result){
			if($result['pwd'] == sha1($pwd.$result['salt'])){
				if($remember){
					cookie('username',$username,604800);
					cookie('pwd',$result['pwd'],604800);
					cookie('id',$result['id'],604800);
				}
				session('username',$username);
				session('pwd',$result['pwd']);
				session('id',$result['id']);
				addlog('登录成功',3);
				$this->redirect('Index/index');
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