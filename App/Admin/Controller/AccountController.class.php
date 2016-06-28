<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class AccountController extends ComController {
    public function index(){
		$User = M("User");
		$user = $User->order('id desc')->select(); 
		$this->assign('user',$user);
		$this->display();
	}
	public function account(){
		$this->display();
	}
	public function edit(){
		$User = M("User");
		$id = I('get.id');
		$user = $User->where('id='.$id)->find(); 
		$this->assign('user',$user);
		$this->display();
	}
	public function add(){
		$User = D("User"); // 实例化User对象
		if (!$User->create()){
			 // 如果创建失败 表示验证没有通过 输出错误提示信息
			$this->error($User->getError());
		}else{
			$data['sort'] = I('post.sort');
			$data['phone'] = I('post.phone');
			if(!isPhone($data['phone'])){
				$this->error('手机号码错误');
			}
			$data['name'] = I('post.name');
			$data['pwd'] = I('post.pwd');
			if(!isPassword($data['pwd'])){
				$this->error('请填写正确密码');
			}
			$data['salt']=base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_RANDOM));
			$data['pwd']=sha1($data['pwd'].$data['salt']);
			$User->add($data);
			addlog('发放账号phone='.$data['phone']);
			$this->success('注册成功','index');
		}
	}
	public function update(){
		$User = D("User"); // 实例化User对象
		if (!$User->create()){
			 // 如果创建失败 表示验证没有通过 输出错误提示信息
			$this->error($User->getError());
		}else{
			$id = I('post.id');
			$data['sort'] = I('post.sort');
			$data['phone'] = I('post.phone');
			$data['name'] = I('post.name');
			$data['pwd'] = I('post.pwd');
			$data['salt']=base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_RANDOM));
			$data['pwd']=sha1($data['pwd'].$data['salt']);
			$User->where('id='.$id)->save($data); 
			addlog('修改id='.$id."账户信息");
			$this->success('修改成功','index');
		}
	}
	public function del(){
		$User = M('User');
		$lids = I('param.id');
		if(is_array($lids)){
			$lids = implode(',',$lids);
			$map['id']  = array('in',$lids);
			$result = $User->where($map)->delete();
			if($result){
				addlog('删除账户');
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}else{
			$map['id'] = $lids;
			$result = $User->where($map)->delete();
			if($result){
				addlog('删除账户');
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}
	}
}