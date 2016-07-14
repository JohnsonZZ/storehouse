<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class GalleryController extends ComController {
	public function index(){
		$folder = scandir('Public/upload/image');	
		$lenFolder = count($folder);
		unset($folder[0]);
		unset($folder[1]);		
		$this->assign('folder',$folder);	 //文件夹
		$this->assign('lenFolder',$lenFolder);//文件夹长度
		$this -> display();
	}
	public function image()
	{
		$where = I('get.folder');
		$files = array();	
		$lenFiles = array();
		if(is_dir('Public/upload/image/'.$where)){	
			$files = scandir('Public/upload/image/' . $where);
			foreach($files as $key => $value){
				$files[$key] = iconv('GBK', 'UTF-8', $files[$key]);
			}
			$lenFiles = count($files);			
		}					
		$this->assign('where',$where);
		$this -> assign('lenFiles',$lenFiles); //文件的数量
		$this -> assign('files',$files);		//文件
		$this -> display('index');		
	}
	public function delFile(){
		$where = I('get.folder');
		$file = I('get.file');
		$path = 'Public/upload/image/'.$where. '/' . $file;
		$delete = unlink($path);
		if($delete){
			addlog('删除图片成功',3);
			 $this -> success('删除图片成功');			
		}
		else{
			addlog('删除图片失败',3);
			$this -> error('删除图片失败');}
	}	
	public function delFolder(){
	$folder = I('get.folder');
	$path = 'Public/upload/image/'.$folder;
	if(is_dir($path)){	
			$files = scandir($path);
			foreach($files as  $value){
				unlink($path . '/' . $value);		
			}			
		}	
	$delete = rmdir($path);
	if($delete){
		 addlog('删除文件夹失败',3);
		 $this -> success('删除文件夹成功');			
	}
	else{
		addlog('删除文件夹失败',3);
		$this -> error('删除文件夹失败');}
	}	
}
?>