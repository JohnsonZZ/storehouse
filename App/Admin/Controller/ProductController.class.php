<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class ProductController extends Controller {
    public function index(){
		$Product = M('Product');
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$product = $Product->order('time desc') ->limit($Page->firstRow . ',' . $Page->listRows)-> select();
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('product',$product);
		$this->display();
	}
	
	public function edit(){
		$Product = M('Product');
		$data['id'] = I('get.id');
		$product = $Goods -> where($data) -> find();
		$this -> assign('product',$product);
		$this -> display();
		
	}
	
	public function update(){
		$Product = M('Product');
		$id = I('post.id');
		$data['content'] = $_POST['content'];
		if(!empty($_FILES)){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->subName   =     array('date', 'Ymd');
			$upload->maxSize   =     1048576 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath  =     'Public/upload/image/'; // 设置附件上传根目录
			$upload->replace   =	 true;
			$upload->savePath  =     ''; // 设置附件上传（子）目录
			// 上传文件 
			$info   =   $upload -> upload();
			if($info) {
				$data['href'] = $info['href']['savepath'] . $info['href']['savename'];
			}
			if(!$id)
			{
				$this->error('图片上传失败');
			}
		}
		if($id){
			$path = $Product -> where('id ='.$id) -> field('href') -> find();	//更图片
			$file = 'Product/upload/image/'.$path['href']; //储存之前的图片路径			
			$result = $Product -> where('id='.$id)-> save($data);
			if($result){
				if(isset($data['href'])){
					unlink($file);//成功后删除之前的图片
				}
				addlog('修改产品');
				$this->success('修改成功', 'index');
			} else {
				$this->error('修改失败');
			}	
		}
		else{
		
			$result = $Product->add($data);
		
			if($result){
				addlog('增加产品');
				$this->success('新增成功', 'add');
			} else {
				$this->error('新增失败');
			}
		}
		
		
		
		
	}
}