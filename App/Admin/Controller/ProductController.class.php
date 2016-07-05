<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class ProductController extends Controller {
    public function index(){
		$Sort = M('Sort');
		$Company = M('Company');
		$Product = M('Product');
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$product = $Product-> join('hc_company ON hc_company.cid = hc_product.cid','LEFT') 
							-> join('hc_sort ON hc_sort.sid = hc_product.sid','LEFT') 
							->order('time desc') 
							->limit($Page->firstRow . ',' . $Page->listRows)-> select();
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('product',$product);
		$this->display();
	}
	
	public function edit(){
		$Product = M('Product');
		$Company = M('Company');
		$Sort = M('Sort');
		$data['pid'] = I('get.pid');
		$product = $Product-> where($data) -> join('hc_company ON hc_company.cid = hc_product.cid','LEFT') 
										   -> join('hc_sort ON hc_sort.sid = hc_product.sid','LEFT') ->find();
										
		$company = $Company -> select();
		$sort = $Sort -> select();
		$this -> assign('company',$company);
		$this -> assign('sort',$sort);
		$this -> assign('product',$product);
		$this -> display();		
	}
	
	public function add(){
		$Company = M('Company');
		$Sort = M('Sort');
		$company = $Company -> select();
		$sort = $Sort -> select();
		$this -> assign('company',$company);
		$this -> assign('sort',$sort);
		$this -> display();		
	}
	
	public function update(){
		$Product = M('Product');
		$pid = I('post.pid');		
		//添加
		$data['cid'] = I('post.cid');
		$data['sid'] = I('post.sid');
		$data['name'] = I('post.name');
		$data['brief'] = I('post.brief');
		$data['price'] = I('post.price');
		$data['aprice'] = I('post.aprice');
		$data['psum'] = I('post.psum') ? I('post.psum') : 10000;	
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
			
			//空的话为原来的值
			$oldproduct = $Product -> where('pid='.$pid) ->find();
			$data['cid'] = empty($data['cid']) ? $oldproduct['cid'] : $data['cid'];
			$data['sid'] = empty($data['cid']) ? $oldproduct['sid'] : $data['sid'];
			$data['name'] = empty($data['name']) ? $oldproduct['name'] : $data['name'];
			$data['brief'] = empty($data['brief']) ? $oldproduct['brief'] : $data['brief'];
			$data['price'] = empty($data['price']) ? $oldproduct['price'] : $data['price'];
			$data['aprice'] = empty($data['aprice']) ? $oldproduct['aprice'] : $data['aprice'];
			$data['psum'] = empty($data['psum']) ? $oldproduct['psum'] : $data['psum'];
			$data['photo'] = empty($data['photo']) ? $oldproduct['photo'] : $data['photo'];
			//删除旧照片
			$path = $Product -> where('pid ='.$pid) -> field('photo') -> find();	//找到照片
			$file = 'Product/upload/image/'.$path['photo']; //储存之前的图片路径			
			$result = $Product -> where('pid='.$pid)-> save($data);
			if($result){
				if(isset($data['photo'])){
					unlink($file);//成功后删除之前的图片
				}
				addlog('修改'.$data['name'].'产品');
				$this->success('修改'.$data['name'].'成功', 'index');
			} else {
				$this->error('修改'.$data['name'].'失败');
			}	
		}
		else{		
			$result = $Product->add($data);		
			if($result){
				addlog('增加'.$data['name'].'产品');
				$this->success('新增'.$data['name'].'成功', 'add');
			} else {
				$this->error('新增'.$data['name'].'失败');
			}
		}	
	}
	public function del(){
		$Product = M('Product');
		$pid = I('param.pid');	
		if( is_array($pid) ){
			$pid = implode(',',$pid);
			$map['pid']  = array('in',$pid);
			$product = $Product -> field('name') -> where($map) -> select();
			$product = implode(',',$product);
			$result = $Product -> where($map) -> delete();
		}
		else{
			$product = $Product -> field('name') -> where('pid='.$pid) -> find();
			$result = $Product -> where('pid='.$pid) -> delete();
		}
		if($result){
			addlog('删除产品成功：'.$product['name']);
			$this->success('成功删除产品：'.$product['name'], 'index');
		} else {
			addlog('删除产品失败：'.$product['name']);
			$this->error('删除产品失败：');
		}		
	}
}