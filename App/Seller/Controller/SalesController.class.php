<?php
namespace Seller\Controller;
use Seller\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class SalesController extends ComController {
    public function index(){
		$Sales = M('Sales');	
		$Product = M('Product');
		$Sort = M('Sort');		
		$Company = M('Company');		
		$map['id'] = session('id');
		$count = $Sales -> where($map) -> count();  //查出总数
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$sales = $Sales -> where($map)  -> limit($Page->firstRow . ',' . $Page->listRows)-> select();
		foreach($sales as $key =>$value)
		{
			$a = $Product -> field('photo,product,cid,sid') -> where('pid='.$value['pid']) -> find();
			$c = $Company -> field('company') -> where('cid='.$a['cid']) -> find();
			$b = $Sort -> field('sort') -> where('sid='.$a['sid']) -> find();
			$sales[$key]['product'] = $a['product'];
			$sales[$key]['photo'] = $a['photo'];
			$sales[$key]['sort'] = $b['sort'];
			$sales[$key]['company'] = $c['company'];
		}
		// dump($sales);die();
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('sales',$sales);
		$this->display();
	}
	
}