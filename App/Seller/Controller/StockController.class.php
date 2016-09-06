<?php
namespace Seller\Controller;
use Seller\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class StockController extends ComController {
    public function index(){
		
		// $count = $Sales -> where($map) -> count();  //查出总数
		// $Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		// $sales = $Sales -> where($map)  -> limit($Page->firstRow . ',' . $Page->listRows)-> select();
		
		// $show = $Page->show(); // 分页显示输出
		// $this->assign('page', $show); // 赋值分页输出
		// $this->assign('sales',$sales);
		$this->display();
	}
	
}