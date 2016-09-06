<?php
namespace Storage\Controller;
use Storage\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class StockController extends ComController {
    public function index(){
		$sess['uid'] = session('id');
		$Product = M('Product');
		$count = $Product -> count();
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$product = $Product -> field('pid,product,psum,ssum') 
							-> limit( $Page->firstRow . ',' . $Page->listRows)
							-> where($sess)
							-> select();
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('product',$product);
		$this->display();
	}
	public function order(){
		$sess['uid'] = session('id');
		$Product = M('Product');
		$map = I('get.pid');
		$product = $Product -> field('pid,product') -> where($sess) -> select();
		$this -> assign('map',$map);
		$this -> assign('product',$product);
		$this->display();
	}
	public function update(){
		$Order = M('Order');
		$Product = M('Product');
		$data['ophone'] = I('post.phone');
		if(!isPhone($data['ophone'])){
			$this->error('手机号码错误');
		}
		$data['uid'] = session('id');
		$data['pid'] = I('post.pid');
		$data['sum'] = I('post.sum');
		$data['buyer'] = I('post.buyer');
		$data['address'] = I('post.address');
		$data['__hash__'] = I('post.__hash__');
		$oid = I('post.id');
		if($oid){
			$check = $Order -> autoCheckToken($data);
			if($check){
				$Order->where('oid='.$oid)->save($data); 
				addlog('修改id='.$oid."单号信息成功",session('sort'));
				$this->success('修改成功','index');
			}else{
				addlog('修改id='.$oid."单号信息失败",session('sort'));
				$this->error('修改失败，表单令牌验证失败','index');		
			}
		}else{
			$check = $Order -> autoCheckToken($_POST);
			if($check){
				$count = $Product-> field('psum') -> where('pid='.$data['pid']) -> find();
				if($count['psum']-$data['sum']>=0){
					
					$result = $Order->add($data);
					if($result){
						addlog('发单成功',session('sort'));
						$this->success('发单成功','index');
					}else{
						addlog('添加订单失败',session('sort'));
					$this->error('添加订单失败，发单失败');	
					}
				}
				if($count['psum']-$data['sum'] < 0){
					addlog('缺货,发单失败',session('sort'));
					$this->error('缺货,请勿超过库存'.$count['psum']);				
				}
			}else{
				addlog('发单失败，表单令牌验证失败',session('sort'));
				$this->error('发单失败，请刷新重试');	
			}
			
		}
	}
}