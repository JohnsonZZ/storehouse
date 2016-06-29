<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class StoreController extends ComController {
    public function index(){
		$Model = new \Think\Model();
		$sql = "select hc_order.*,hc_user.name from hc_order, hc_user where hc_order.uid = hc_user.id";
		$order = $Model->query($sql);
		$this->assign('order',$order);
		$this->display();
	}
	public function table(){
		
		$this->display();
	}
}