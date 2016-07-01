<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class OrderController extends ComController {
    public function index(){
		$Model = new \Think\Model();
		$sql = "select hc_order.*,hc_user.name from hc_order, hc_user where hc_order.uid = hc_user.id";
		$order = $Model->query($sql);
		$this->assign('order',$order);
		$this->display();
	}
	public function order(){
		$this->display();
	}
	public function update(){
		$Order = M('Order');
		$data['ophone'] = I('post.phone');
		if(!isPhone($data['ophone'])){
			$this->error('手机号码错误');
		}
		$data['uid'] = session('id');
		$data['pid'] = I('post.pid');
		$data['buyer'] = I('post.buyer');
		$data['address'] = I('post.address');
		$data['address'] = implode("-",$data['address']);
		$id = I('post.id');
		if($id){
			$Order->where('id='.$id)->save($data); 
			addlog('修改id='.$id."单号信息");
			$this->success('修改成功','index');
		}else{
			$Order->add($data);
			addlog('发单成功');
			$this->success('发单成功','index');
		}
	}
	public function edit(){
		$id = I('get.id');
		$order = M('Order')->field('id,pid,buyer,address,phone')->where('id='.$id)->find();
		$order['address'] = explode("-",$order['address']);
		$this->assign('order',$order);
		$this->display();
	}
	public function del(){
		$Order = M('Order');
		$lids = I('param.id');
		if(is_array($lids)){
			$lids = implode(',',$lids);
			$map['id']  = array('in',$lids);
			$result = $Order->where($map)->delete();
			if($result){
				addlog('删除订单'.$lids);
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}else{
			$map['id'] = $lids;
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
		$id = I('post.sid');
		$id = implode(',',$id);
		$Model = new \Think\Model();
		$sql = "select hc_order.*,hc_user.name from hc_order, hc_user where hc_order.uid = hc_user.id AND hc_order.id in ($id)";
		$order = $Model->query($sql);
		$this->assign('order',$order);
		$this->display();
	}
	public function excel(){
		vendor("PHPExcel.PHPExcel"); 
		vendor("PHPExcel.PHPExcel.IOFactory");
		$id = I('post.sid');
		$id = implode(',',$id);
		$Model = new \Think\Model();
		$sql = "select hc_order.*,hc_user.name from hc_order, hc_user where hc_order.uid = hc_user.id AND hc_order.id in ($id)";
		$order = $Model->query($sql);
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
					->setCellValue('C1', '收件人')	
					->setCellValue('D1', '收货地址')
					->setCellValue('E1', '联系电话');
							 
		foreach($order as $value){
			$i++;
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue("A$i", $value['pid'])
						->setCellValue("B$i", $value['name'])
						->setCellValue("C$i", $value['buyer'])
						->setCellValue("D$i", $value['address'])
						->setCellValue("E$i", $value['ophone']);
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