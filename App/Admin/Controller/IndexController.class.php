<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class IndexController extends ComController {
    public function index(){
		$Log = M('Log');	
		$count = $Log->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count,15); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$log = M('Log')->order('time desc') ->limit($Page->firstRow . ',' . $Page->listRows)-> select();
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('log',$log);
		$this->display();
	}
	public function table(){
		$id = I('post.id');
		$map['id'] = array('in',$id);
		$Log = M('Log');	
		$log = $Log->where($map)->select();
		$this->assign('log',$log);
		$this->display();
	}
	public function excel(){
		vendor("PHPExcel.PHPExcel"); 
		vendor("PHPExcel.PHPExcel.IOFactory");
		$id = I('post.id');
		if(is_array($id)){
			$id = implode(',',$id);
			$map['d']  = array('in',$id);
		}else{
			$map['id'] = $id;
		}
		$Log = M('Log');	
		$log = $Log->where($map)->select();
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
					->setCellValue('A1', '用户')
					->setCellValue('B1', 'ip')
					->setCellValue('C1', '日志内容')	
					->setCellValue('D1', '时间');
							 
		foreach($log as $value){
			$i++;
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue("A$i", $value['username'])
						->setCellValue("B$i", $value['ip'])
						->setCellValue("C$i", $value['log'])
						->setCellValue("D$i", $value['time']);
		}
		
		$objPHPExcel->getActiveSheet()->setTitle('Simple');
		$objPHPExcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.ms-excel');  
        header('Content-Disposition: attachment;filename="用户日志.xlsx"');  //日期为文件名后缀  
        header('Cache-Control: max-age=0');  
  
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  //excel5为xls格式，excel2007为xlsx格式  
        $objWriter->save('php://output');  
	}
}