<?php
namespace Storage\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class LoginController extends Controller {
    public function index(){
		$this->display();
		}	
	public function login(){
		$Kuyuan = M('Kuyuan');
		$phone = I('post.phone');
		$pwd = I('post.pwd');
		$remember = I('post.remember');
		$result = $Kuyuan->where("kphone = '$phone'")->find();
		if($result){
			if($result['pwd'] == sha1($pwd.$result['salt'])){
				if($remember){
					cookie('phone',$phone,604800);
					cookie('username',$result['kname'],604800);
					cookie('pwd',$result['pwd'],604800);
					cookie('id',$result['kid'],604800);
				}
				session('phone',$phone);
				session('username',$result['kname']);
				session('pwd',$result['pwd']);
				session('id',$result['kid']);
				addlog('登录成功',2);
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