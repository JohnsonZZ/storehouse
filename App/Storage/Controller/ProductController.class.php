<?php
namespace Storage\Controller;
use Storage\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class ProductController extends ComController {
    public function index(){
		$Sort = M('Sort');
		$Company = M('Company');
		$Product = M('Product');
		$count = $Product-> count();
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$product = $Product-> field('hc_product.product,hc_product.photo,hc_company.company,hc_sort.sort,hc_product.psum,hc_product.time') -> join('hc_company ON hc_company.cid = hc_product.cid','LEFT') 
								      -> join('hc_sort ON hc_sort.sid = hc_product.sid','LEFT') 
									  ->order('time desc') 
									  ->limit($Page->firstRow . ',' . $Page->listRows)-> select();
		$Page->setConfig('header','');
		//dump($product);die();
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('product',$product);
		$this->display();
	}
	
}