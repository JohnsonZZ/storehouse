<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class MyController extends ComController {
    
	public function profile(){
		$this->display();
	}
	
	public function pwd(){
		$this->display();
	}
	
	public function edit(){
		$Admin = M("Admin");
		$data['id'] = session('id');
		$result = $Admin->where($data)->find();
		$pwd = I('post.ypwd');
		
		if($result['pwd'] === sha1($pwd.$result['salt'])){
			$data['pwd'] = I('post.pwd');
			if(!isPassword($data['pwd'])){
				$this->error('请填写正确密码');
			}else{
				$data['salt']=base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_RANDOM));
				$data['pwd']=sha1($data['pwd'].$data['salt']);
				$Admin->where('id='.$data['id'])->save($data); 
				session(null);
				cookie(null);
				$this->success('请重新登陆','pwd');
			}
		}else{
			$this->error("原密码错误");
		}		
	}
}