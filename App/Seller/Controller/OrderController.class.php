<?php
namespace Seller\Controller;
use Seller\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class OrderController extends ComController {
    public function index(){
		$sess['id'] = session('id');
		$Order = M('Order');
		$order = $Order ->field('hc_order.*,product,name,sum,hc_order.time') 
						->join('hc_user ON hc_order.uid = hc_user.id','LEFT') 
						->join('hc_product ON hc_order.pid = hc_product.pid','LEFT') 
						->order('time desc')
						->where($sess)
						->select();		
		
		$this->assign('order',$order);
		$this->display();
	}
	public function order(){
		$Product = M('Product');
		$map = I('get.pid');
		$product = $Product -> field('pid,product') -> where('pstatus = 1') -> select();	
		$this -> assign('map',$map);
		$this -> assign('product',$product);
		$this -> display();
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
					$this->error('发单失败');				
				}
			}else{
				addlog('发单失败，表单令牌验证失败',session('sort'));
				$this->error('发单失败，表单令牌验证失败');	
			}
			
		}	
	}
	public function edit(){
		$oid = I('get.id');
		$Product = M('Product');
		$product = $Product -> field('pid,product') -> select();
		$order = M('Order')->field('oid,pid,buyer,address,ophone,sum')->where('oid='.$oid)->find();
		$order['address'] = explode("-",$order['address']);
		$this->assign('order',$order);
		$this->assign('product',$product);
		$this->display();
	}
	public function del(){
		$Order = M('Order');
		$lids = I('param.id');
		if(is_array($lids)){
			$lids = implode(',',$lids);
			$map['oid']  = array('in',$lids);
			$result = $Order->where($map)->delete();
			if($result){
				addlog('删除订单'.$lids,session('sort'));
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}else{
			$map['oid'] = $lids;
			$result = $Order->where($map)->delete();
			if($result){
				addlog('删除订单'.$lids,session('sort'));
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}
	}
	public function table(){
		$oid = I('post.sid');
		$oid = implode(',',$oid);
		$map['oid'] = array('in',$oid);
		$Order = M('Order');
		$order = $Order ->field('hc_order.*,product,name,sum,hc_order.time') 
						->join('hc_user ON hc_order.uid = hc_user.id','LEFT') 
						->join('hc_product ON hc_order.pid = hc_product.pid','LEFT') 
						->order('time desc')
						->where($map)
						->select();		
		$this->assign('order',$order);
		$this->display();
	}
	public function excel(){
		vendor("PHPExcel.PHPExcel"); 
		vendor("PHPExcel.PHPExcel.IOFactory");
		$oid = I('post.sid');
		$oid = implode(',',$oid);
		$map['oid'] = array('in',$oid);
		$Order = M('Order');
		$order = $Order ->field('hc_order.*,product,name,sum,hc_order.time') 
						->join('hc_user ON hc_order.uid = hc_user.id','LEFT') 
						->join('hc_product ON hc_order.pid = hc_product.pid','LEFT') 
						->order('time desc')
						->where($map)
						->select();		
		$i=1;
		$objPHPExcel = new \PHPExcel();  		
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("PHPExcel Test Document")
							 ->setSubject("PHPExcel Test Document")
							 ->setDescription("Test document for PHPExcel, generated using PHP classes.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");
		$objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', '订单号')
					->setCellValue('B1', '产品')
					->setCellValue('C1', '接单人')
					->setCellValue('D1', '收件人')	
					->setCellValue('E1', '收货地址')
					->setCellValue('F1', '联系电话');
							 
		foreach($order as $value){
			$i++;
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue("A$i", $value['oid'])
						->setCellValue("B$i", $value['product'])
						->setCellValue("C$i", $value['name'])
						->setCellValue("D$i", $value['buyer'])
						->setCellValue("E$i", $value['address'])
						->setCellValue("F$i", $value['ophone']);
		}
		
		$objPHPExcel->getActiveSheet()->setTitle('Simple');
		$objPHPExcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.ms-excel');  
        header('Content-Disposition: attachment;filename="订单列表.xlsx"');  //日期为文件名后缀  
        header('Cache-Control: max-age=0');  
  
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  //excel5为xls格式，excel2007为xlsx格式  
        $objWriter->save('php://output');  
	}
}