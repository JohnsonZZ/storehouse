<?php
namespace Seller\Controller;
use Seller\Controller\ComController;
use Vendor\Tree;
header("Content-type:text/html;charset=utf-8");
class ProductController extends ComController {
    public function index(){
		$Product = M('Product');
		$Category = M('Category');
		$sid[] = I('get.category');
		if($sid[0]){
			$category = $Category->field('sid')->where('prid='.$sid[0])->select();
			if($category){
				foreach($category as $firstCate){
					$sid[] = $firstCate['sid'];
					$firstId = $Category->field('sid')->where('prid='.$firstCate['sid'])->select();
						if($firstId){
							foreach($firstId as $secondCate){
								$sid[] = $secondCate['sid'];
							}
						}
				}
			}
			$tid = implode(',',$sid);
			$map['tid'] = array('in',$tid);
			$count = $Product-> where($map) ->count();
			$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
			$product = $Product -> field('pid,hc_product.cid,hc_product.photo,hc_product.tid,company,sort,product,aprice,psum') 
							-> join('hc_company ON hc_company.cid = hc_product.cid','LEFT') 
							-> join('hc_category ON hc_category.sid = hc_product.tid','LEFT') 
							-> where($map)
							-> limit( $Page->firstRow . ',' . $Page->listRows)
							-> where('pstatus = 1')
							-> select();
		}else{
			$count = $Product -> count();
			$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
			$product = $Product -> field('pid,hc_product.cid,hc_product.photo,hc_product.tid,company,sort,product,aprice,psum') 
								-> join('hc_company ON hc_company.cid = hc_product.cid','LEFT') 
								-> join('hc_category ON hc_category.sid = hc_product.tid','LEFT') 
								-> limit( $Page->firstRow . ',' . $Page->listRows)
							    -> where('pstatus = 1')
								-> select();
		}
		$show = $Page->show(); // 分页显示输出
		
		$category = $Category->field('sid,prid,sort,o')->order('o asc')->select();
		$tree = new Tree($category);
		
		$str = "<option value=\$sid \$selected>\$spacer\$sort</option>"; //生成的形式
		
		$category = $tree->get_tree(0,$str, 0);
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('product',$product);
		$this -> assign('category',$category);//分类输出
		
		$this->display();
	}
	
}