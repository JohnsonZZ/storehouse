<?php
namespace Storage\Controller;
use Storage\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class StockController extends ComController {
    public function index(){
		$User = M('User');
		$user = $User -> field('id,uphone')-> select();
		$this -> assign('user',$user);
		$this->display();
	}
	public function addName(){
		$User = M('User');
		$data['id'] = I('post.id');
		$user = $User -> field('name')-> where($data) -> find();
		$this->ajaxReturn($user['name']);
	}
	
	public function update(){
		$Product = M('Product');
		$pid = I('post.pid');		
		//添加
		$data['uid'] = I('post.uid');
		$data['product'] = I('post.product');
		$data['brief'] = I('post.brief');
		$data['pstatus'] = 0;
		$data['price'] = floatval(I('post.price'))?floatval(I('post.price')) : 0;
		$data['aprice'] = floatval(I('post.aprice'));
		$data['psum'] = I('post.sum') ? floatval(I('post.sum')): 10000;	
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
				$data['photo'] = $info['photo']['savepath'] . $info['photo']['savename'];
			}
			else if($pid){ 
				$data['photo'] = '' ;
			}
			else	{$this->error('图片上传失败');}			
		}
		if($pid){	
			$oldproduct = $Product -> where('pid='.$pid) ->find();		
			$data['photo'] = empty($data['photo']) ? $oldproduct['photo'] : $data['photo'];
			//删除旧照片
			$path = $Product -> where('pid ='.$pid) -> field('photo') -> find();	//找到照片
			$file = 'Product/upload/image/'.$path['photo']; //储存之前的图片路径			
			$result = $Product -> where('pid='.$pid)-> save($data);
			if($result){
				if(isset($data['photo'])){
					unlink($file);//成功后删除之前的图片
				}
				addlog('修改'.$data['product'].'产品成功',3);
				$this->success('修改'.$data['product'].'成功', 'index');
			} else {
				addlog('修改'.$data['product'].'产品失败',3);
				$this->error('修改'.$data['product'].'失败');
			}	
		}
		else{		
			$result = $Product->add($data);		
			if($result){
				addlog('增加'.$data['product'].'产品',3);
				$this->success('新增'.$data['product'].'成功', 'index');
			} else {
				addlog('增加'.$data['product'].'产品失败',3);
				$this->error('新增'.$data['product'].'失败');
			}
		}	
	}
}