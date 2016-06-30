<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class KuyuanController extends ComController {
	public function index(){
		$Kuyuan = M("Kuyuan");
		$kuyuan = $Kuyuan->order('id desc')->select(); 
		$this->assign('kuyuan',$kuyuan);
		$this->display();
	}
	public function kuyuan(){
		$this->display();
	}
	public function edit(){
		$Kuyuan = D("Kuyuan");
		$id = I('get.id');
		$kuyuan = $Kuyuan->where('id='.$id)->find(); 
		$kuyuan['address'] = explode("-",$kuyuan['address']);
		$this->assign('kuyuan',$kuyuan);
		$this->display();
	}
	public function add(){
		$Kuyuan = D("Kuyuan"); // 实例化库员对象
		if (!$Kuyuan->create()){
			 // 如果创建失败 表示验证没有通过 输出错误提示信息
			$this->error($Kuyuan->getError());
		}else{
			$data['kphone'] = I('post.phone');
			if(!isPhone($data['kphone'])){
				$this->error('手机号码错误');
			}
			$data['name'] = I('post.name');
			$data['pwd'] = I('post.pwd');
			if(!isPassword($data['pwd'])){
				$this->error('请填写正确密码');
			}
			$data['salt']=base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_RANDOM));
			$data['pwd']=sha1($data['pwd'].$data['salt']);
			$data['address'] = I('post.address');
			$data['address'] = implode("-",$data['address']);//组合地址
			$Kuyuan->add($data);
			addlog('发放库员账号kphone='.$data['kphone']);
			$this->success('注册成功','index');
		}
		
	}
	public function update(){
		$Kuyuan = D("Kuyuan"); // 实例化Kuyuan对象
		if (!$Kuyuan->create()){
			 // 如果创建失败 表示验证没有通过 输出错误提示信息
			$this->error($Kuyuan->getError());
		}else{
			$id = I('post.id');
			
			$data['kphone'] = I('post.phone');
			if(!isPhone($data['kphone'])){//判断是否为手机号码
				$this->error('手机号码错误');
			}
			
			$data['name'] = I('post.name');
			$data['pwd'] = I('post.pwd');
			if(empty($data['pwd'])){//判断是否修改密码
				unset($data['pwd'] );
			}else{
				if(!isPassword($data['pwd'])){
					$this->error('请填写正确密码');
				}
				$data['salt']=base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_RANDOM));
				$data['pwd']=sha1($data['pwd'].$data['salt']);
			}
			
			$data['address'] = I('post.address');
			$data['address'] = implode("-",$data['address']);
			$Kuyuan->where('id='.$id)->save($data); 
			addlog('修改id='.$id."库员信息");
			$this->success('修改成功','index');
		}
	}
	public function del(){
		$Kuyuan = D("Kuyuan");
		$lids = I('param.id');
		if(is_array($lids)){
			$lids = implode(',',$lids);
			$map['id']  = array('in',$lids);
			$result = $Kuyuan->where($map)->delete();
			if($result){
				addlog('删除库员id='.$lids);
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}else{
			$map['id'] = $lids;
			$result = $Kuyuan->where($map)->delete();
			if($result){
				addlog('删除库员id='.$lids);
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}
	}
}