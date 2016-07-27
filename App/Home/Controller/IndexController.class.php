<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$Product = M('Product');
		$goods = M('Product')
					->field('pid,product,photo,company')
					->join('LEFT JOIN hc_company ON hc_product.pid = hc_company.cid')
					->select();
		$this->assign("goods",$goods);
        $this->display();
	}
}