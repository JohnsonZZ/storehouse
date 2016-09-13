<?php
namespace Storage\Controller;
use Storage\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class ProductController extends ComController {
    public function index(){
		$Product = M('Product');
		$count = $Product-> count();
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$product = $Product -> field('pid,product,photo,company,sort,psum,time') 
							-> join('hc_company ON hc_company.cid = hc_product.cid','LEFT') 
							-> join('hc_category ON hc_category.sid = hc_product.tid','LEFT') 
						    -> order('time desc') 
							-> where('pstatus =1')
							->limit($Page->firstRow . ',' . $Page->listRows)-> select();
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('product',$product);
		$this->display();
	}
	
	public function huamao(){
		$Product = M('Product');
		$count = $Product-> count();
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$product = $Product -> field('pid,product,photo,psum,time,name') 
							-> join('hc_user ON hc_user.id = hc_product.uid','LEFT') 
							-> where('uid>0')
						    -> order('time desc')  
							-> limit($Page->firstRow . ',' . $Page->listRows)
							-> select();
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('product',$product);
		$this->display();
	}
	public function edit(){
		$pid = I('get.pid');
		$Product = M('Product');
		$product = $Product-> where('pid='.$pid) -> join('hc_user ON hc_user.id = hc_product.uid','LEFT') 
										   -> find();
		$User = M('User');
		$user = $User -> field('id,uphone,name')-> where('id='.$product['uid']) -> find();
		$users = $User -> field('id,uphone')-> select();
		$this->assign('users',$users);
		$this->assign('user',$user);
		$this->assign('product',$product);
		$this->display();
	}
	public function del(){
		$Product = M('Product');
		$pid = I('param.pid');	
		if( is_array($pid) ){
			$pid = implode(',',$pid);
			$map['pid']  = array('in',$pid);
			$product = $Product -> field('product') -> where($map) -> select();
			$product = implode(',',$product);
			$result = $Product -> where($map) -> delete();
		}
		else{
			$product = $Product -> field('product') -> where('pid='.$pid) -> find();
			$result = $Product -> where('pid='.$pid) -> delete();
		}
		if($result){
			addlog('删除产品成功：'.$product['product'],3);
			$this->success('成功删除产品：'.$product['product'], 'huamao');
		} else {
			addlog('删除产品失败：'.$product['product'],3);
			$this->error('删除产品失败！');
		}		
	}	
	
}