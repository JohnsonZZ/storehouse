<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$Product = M('Product');
		$goods = M('Product')
					->field('pid,product,photo,hc_company.company')
					->join('LEFT JOIN hc_company ON hc_product.cid = hc_company.cid')
					->limit(4)
					->select();
		$rand = M('Product')
					->field('pid,product,photo,company')
					->join('LEFT JOIN hc_company ON hc_product.cid = hc_company.cid')
					->order('rand()')
					->limit(4)
					->select();
		$this->assign("goods",$goods);
		dump($goods);exit;
		$this->assign("rand",$rand);
        $this->display();
	}
}