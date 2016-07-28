<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function index(){
		$Product = M('Product');
		$goods = M('Product')
					->field('pid,product,photo,company')
					->join('LEFT JOIN hc_company ON hc_product.pid = hc_company.cid')
					->select();
		$this->assign("goods",$goods);
        $this->display();
	}
	public function preview(){
		$pid = I('get.pid');
		$Product = M('Product');
		$goods = M('Product')
					->field('pid,product,photo,brief,content,company')
					->join('LEFT JOIN hc_company ON hc_product.pid = hc_company.cid')
					->where('pid='.$pid)
					->find();
		$this->assign("goods",$goods);
        $this->display();
	}
}