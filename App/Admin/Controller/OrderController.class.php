<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class OrderController extends ComController {
    public function index(){
		$Model = new \Think\Model();
		$sql = "select hc_order.*,hc_user.name from hc_order, hc_user where hc_order.uid = hc_user.id";
		$order = $Model->query($sql);
		$this->assign('order',$order);
		$this->display();
	}
	public function order(){
		$this->display();
	}
	public function add(){
		$Order = M('Order');
		$data['phone'] = I('post.phone');
		if(!isPhone($data['phone'])){
			$this->error('手机号码错误');
		}
		$data['uid'] = session('id');
		$data['pid'] = I('post.pid');
		$data['buyer'] = I('post.buyer');
		$data['address'] = I('post.address');
		$data['address'] = implode("-",$data['address']);
		$Order->add($data);
		addlog('发单成功');
		$this->success('发单成功','index');
	}
}