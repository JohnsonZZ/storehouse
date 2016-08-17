<?php
namespace Storage\Controller;
use Storage\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class ProductController extends ComController {
    public function index(){
		$Product = M('Product');
		$count = $Product-> count();
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$product = $Product -> field('product,photo,company,sort,psum,time') 
							-> join('hc_company ON hc_company.cid = hc_product.cid','LEFT') 
							-> join('hc_category ON hc_category.sid = hc_product.tid','LEFT') 
						    ->order('time desc') 
							->limit($Page->firstRow . ',' . $Page->listRows)-> select();
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('product',$product);
		$this->display();
	}
	
}