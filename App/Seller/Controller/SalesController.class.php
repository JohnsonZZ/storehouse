<?php
namespace Seller\Controller;
use Seller\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class SalesController extends ComController {
    public function index(){
		$Sales = M('Sales');	
		$Product = M('Product');
		$Company = M('Company');	
		$Category = M('Category');
		$map['id'] = session('id');
		$count = $Sales -> where($map) -> count();  //查出总数
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$sales = $Sales -> where($map)  -> limit($Page->firstRow . ',' . $Page->listRows)-> select();
		foreach($sales as $key =>$value)
		{
			$p = $Product -> field('photo,product,cid,tid') -> where('pid='.$value['pid']) -> find();
			$com = $Company -> field('company') -> where('cid='.$p['cid']) -> find();
			$c = $Category -> field('sort') -> where('sid='.$p['tid']) -> find();
			$sales[$key]['product'] = $p['product'];
			//$sales[$key]['photo'] = $a['photo'];
			$sales[$key]['sort'] = $c['sort'];
			$sales[$key]['company'] = $com['company'];
		}
		// dump($sales);die();
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('sales',$sales);
		$this->display();
	}
	
}