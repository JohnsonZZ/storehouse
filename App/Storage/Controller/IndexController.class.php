<?php
namespace Storage\Controller;
use Storage\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class IndexController extends ComController {
    public function index(){

		$Log = M('Log');	
		$map['sort'] = 2;	
		$map['phone'] = session('phone');	
		$count = $Log-> where($map) -> count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count,15); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$log = M('Log')-> where($map) -> order('time desc') ->limit($Page->firstRow . ',' . $Page->listRows)-> select();
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('log',$log);
		$this->display();
	}
	public function addExpress(){
		$data['express'] = I('post.express');
		$data['kid'] = session('id');
		$data['oid'] = I('post.id');
		
		$Order = M('Order');
		$Order->where('oid='.$data['oid'])->save($data); 
		
		$this->ajaxReturn($data['oid']);
	}
	public function del(){
		$Order = M('Order');
		$lids = I('param.id');
		if(is_array($lids)){
			$lids = implode(',',$lids);
			$map['oid']  = array('in',$lids);
			$result = $Order->where($map)->delete();
			if($result){
				addlog('删除订单'.$lids);
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}else{
			$map['oid'] = $lids;
			$result = $Order->where($map)->delete();
			if($result){
				addlog('删除订单'.$lids);
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}
	}
	public function table(){
		$oid = I('post.id');
		if(is_array($oid)){
			$oid = implode(',',$oid);
			$map['hc_order.oid']  = array('in',$oid);
		}else{
			$map['hc_order.oid'] = $oid;
		}
		$Order = M('Order');
		$order= $Order
					->field('hc_order.oid,pid,buyer,ophone,address,express,time,hc_user.name,hc_user.uphone,hc_kuyuan.kname')
					->join('LEFT JOIN hc_user ON hc_order.uid = hc_user.id')
					->join('LEFT JOIN hc_kuyuan ON hc_kuyuan.kid = hc_order.kid')
					->where($map)
					->select();
		$this->assign('order',$order);
		$this->display();
	}
	public function dayin(){
		$this->display();
	}
	public function excel(){
		vendor("PHPExcel.PHPExcel"); 
		vendor("PHPExcel.PHPExcel.IOFactory");
		$oid = I('post.id');
		if(is_array($oid)){
			$oid = implode(',',$oid);
			$map['hc_order.oid']  = array('in',$oid);
		}else{
			$map['hc_order.oid'] = $oid;
		}
		$Order = M('Order');
		$order= $Order
					->field('hc_order.oid,pid,buyer,ophone,address,express,time,hc_user.name,hc_user.uphone,hc_kuyuan.kname')
					->join('LEFT JOIN hc_user ON hc_order.uid = hc_user.id')
					->join('LEFT JOIN hc_kuyuan ON hc_kuyuan.kid = hc_order.kid')
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
					->setCellValue('A1', '产品')
					->setCellValue('B1', '接单人')
					->setCellValue('C1', '联系电话')	
					->setCellValue('D1', '收件人')
					->setCellValue('E1', '收货地址')
					->setCellValue('F1', '联系电话')
					->setCellValue('G1', '发货人')
					->setCellValue('H1', '运单号')
					->setCellValue('I1', '订单时间');
							 
		foreach($order as $value){
			$i++;
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue("A$i", $value['pid'])
						->setCellValue("B$i", $value['name'])
						->setCellValue("C$i", $value['uphone'])
						->setCellValue("D$i", $value['buyer'])
						->setCellValue("E$i", $value['address'])
						->setCellValue("F$i", $value['ophone'])
						->setCellValue("G$i", $value['kname'])
						->setCellValue("H$i", $value['express'])
						->setCellValue("I$i", $value['time']);
		}
		
		$objPHPExcel->getActiveSheet()->setTitle('Simple');
		$objPHPExcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.ms-excel');  
        header('Content-Disposition: attachment;filename="货单列表.xlsx"');  //日期为文件名后缀  
        header('Cache-Control: max-age=0');  
  
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  //excel5为xls格式，excel2007为xlsx格式  
        $objWriter->save('php://output');  
	}
}