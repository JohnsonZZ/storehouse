<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class StoreController extends ComController {
    public function index(){
		$Order = M('Order');
		$order= $Order
					->field('hc_order.id,pid,buyer,ophone,address,express,time,hc_user.name,hc_user.uphone,hc_kuyuan.kname')
					->join('LEFT JOIN hc_user ON hc_order.uid = hc_user.id')
					->join('LEFT JOIN hc_kuyuan ON hc_kuyuan.kid = hc_order.kid')
					->select();
		// $Model = new \Think\Model();
		// $sql = "select hc_order.*,hc_user.name,hc_kuyuan.kname from hc_order, hc_user where hc_order.uid = hc_user.id AND hc_kuyuan.kid = hc_order.kid";
		// $order = $Model->query($sql);
		$this->assign('order',$order);
		$this->display();
	}
	public function table(){
		
		$this->display();
	}
	public function addExpress(){
		$data['express'] = I('post.express');
		$data['kid'] = session('id');
		$data['id'] = I('post.id');
		
		$Order = M('Order');
		$Order->where('id='.$data['id'])->save($data); 
		
		$this->ajaxReturn($data['id']);
	}
	public function del(){
		$Order = M('Order');
		$lids = I('param.id');
		if(is_array($lids)){
			$lids = implode(',',$lids);
			$map['id']  = array('in',$lids);
			$result = $Order->where($map)->delete();
			if($result){
				addlog('删除订单'.$lids);
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}else{
			$map['id'] = $lids;
			$result = $Order->where($map)->delete();
			if($result){
				addlog('删除订单'.$lids);
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}
	}
}