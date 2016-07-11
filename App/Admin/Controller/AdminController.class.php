<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class AdminController extends Controller {
    public function index(){
		$Admin = M('Admin');
		$count = $Admin -> count();
		$Page = new \Think\Page($count,8); // 实例化分页类 传入总记录数和每页显示的记录数(8)
		$admin = $Admin->limit($Page->firstRow . ',' . $Page->listRows)->select();
		$Page->setConfig('prev', '<');
		$Page->setConfig('next', '>');
		$Page->setConfig('header','');
		$page = $Page->show(); // 分页显示输出
		$this->assign('page', $page); // 赋值分页输出
		$this->assign('admin',$admin);
		$this->display();
		}
    public function add(){
		$this->display();
		}
	public function update(){
		$id = I('get.id');
		$Admin = M('Admin');
		$data['username'] = I('post.username');
		$data['pwd'] = I('post.pwd');
		$data['compwd'] = I('post.compwd');
		$map['username'] = $data['username'];
		$count = $Admin -> where($map) -> find();  //找账号
		if($data['pwd'] !== $data['compwd']){
			 $this -> error('两次密码不一致', 'add',2);
		}
		if($count['username'] == $data['username'] ) {
			$this -> error('账号已经存在', 'add',2);
		}
		$data['salt'] = base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_RANDOM));
		$data['pwd'] = sha1($data['pwd'].$data['salt']);
		$Admin -> create($data);
		$result = $Admin ->add();
			addlog('注册超级管理员'.$data['username'],3);
		    $this -> success('注册成功', 'Index/index',2);
	
	}
}