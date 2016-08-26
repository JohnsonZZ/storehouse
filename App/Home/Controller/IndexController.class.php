<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$category = M('Category')->where('prid=0')->select();
		$goods = M('Product')
					->field('pid,product,photo,pstatus,hc_company.company')
					->join('LEFT JOIN hc_company ON hc_product.cid = hc_company.cid')
					->limit(4)
					->where('pstatus = 1')
					->order('pid desc')
					->select();
		$rand = M('Product')
					->field('pid,product,photo,pstatus,company')
					->join('LEFT JOIN hc_company ON hc_product.cid = hc_company.cid')
					->order('rand()')
					->limit(4)
					->where('pstatus = 1')
					->select();
		$this->assign("category",$category);
		$this->assign("goods",$goods);
		$this->assign("rand",$rand);
        $this->display();
	}
}