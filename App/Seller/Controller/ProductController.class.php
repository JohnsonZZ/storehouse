<?php
namespace Seller\Controller;
use Seller\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class ProductController extends ComController {
    public function index(){
		$Sort = M('Sort');
		$Company = M('Company');
		$Product = M('Product');
		$count = $Product -> count();
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$product = $Product-> field('pid,hc_product.cid,hc_product.sid,company,sort,product,aprice,psum') -> join('hc_company ON hc_company.cid = hc_product.cid','LEFT') 
							-> join('hc_sort ON hc_sort.sid = hc_product.sid','LEFT') 
							->limit($Page->firstRow . ',' . $Page->listRows)-> select();
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('product',$product);
		$this->display();
	}
	
}