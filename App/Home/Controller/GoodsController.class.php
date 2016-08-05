<?php
namespace Home\Controller;
use Think\Controller;
use Vendor\Tree;
class GoodsController extends Controller {
    public function index(){
		$sid[] = I('get.sid');	
		$Category = M('Category');
		$category = $Category->field('sid')->where('prid='.$sid[0])->select();
		if($category){
			foreach($category as $firstCate){
				$sid[] = $firstCate['sid'];
				$firstId = $Category->field('sid')->where('prid='.$sid[1])->select();
					if($firstId){
						foreach($firstId as $secondCate){
							$sid[] = $secondCate['sid'];
						}
					}
			}
		}
		$map['tid'] = implode(',',$sid);
		$count = M('Product')->where($map)->count();
		$Page = new \Think\Page($count, 21); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$goods = M('Product')
					->field('pid,product,photo,company')
					->join('LEFT JOIN hc_company ON hc_product.cid = hc_company.cid')
					->where($map)
					->limit($Page->firstRow . ',' . $Page->listRows)
					->select();
		$this->assign('page', $show); // 赋值分页输出
		$this->assign("goods",$goods);
        $this->display();
	}
	public function preview(){
		$pid = I('get.pid');
		$Product = M('Product');
		$goods = M('Product')
					->field('pid,product,photo,brief,content,company')
					->join('LEFT JOIN hc_company ON hc_product.cid = hc_company.cid')
					->where('pid='.$pid)
					->find();
		$this->assign("goods",$goods);
        $this->display();
	}
}