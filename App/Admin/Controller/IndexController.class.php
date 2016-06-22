<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class IndexController extends ComController {
    public function index(){
		$Log = M('Log');	
		$count = $Log->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count,15); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$log = M('Log')->order('time desc') ->limit($Page->firstRow . ',' . $Page->listRows)-> select();
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('log',$log);
		$this->display();
	}
	public function table(){
		$id = I('post.id');
		$map['id'] = array('in',$id);
		$Log = M('Log');	
		$log = $Log->where($map)->select();
		$this->assign('log',$log);
		$this->display();
	}
}