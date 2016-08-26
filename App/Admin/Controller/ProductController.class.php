<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
use Vendor\Tree;
header("Content-type:text/html;charset=utf-8");
class ProductController extends ComController {
    public function index(){
		$Product = M('Product');
		$Category = D('category');
		$sid[] = I('get.category');
		if($sid[0]){
			$category = $Category->field('sid')->where('prid='.$sid[0])->select();
			if($category){
				foreach($category as $firstCate){
					$sid[] = $firstCate['sid'];
					$firstId = $Category->field('sid')->where('prid='.$firstCate['sid'])->select();
						if($firstId){
							foreach($firstId as $secondCate){
								$sid[] = $secondCate['sid'];
							}
						}
				}
			}
			$tid = implode(',',$sid);
			$map['tid'] = array('in',$tid);
			$count = $Product-> where($map) ->count();
			$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
			$product = $Product -> join('hc_company ON hc_company.cid = hc_product.cid','LEFT') 
								-> join('hc_category ON hc_category.sid = hc_product.tid','LEFT') 
								-> order('time desc') 
								-> where($map)
								-> limit($Page->firstRow . ',' . $Page->listRows)-> select();
		}else{
			$count = $Product-> count();
			$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
			$product = $Product -> join('hc_company ON hc_company.cid = hc_product.cid','LEFT') 
								-> join('hc_category ON hc_category.sid = hc_product.tid','LEFT') 
								->order('time desc') 
								->limit($Page->firstRow . ',' . $Page->listRows)-> select();
		}	
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		
		$category = $Category->field('sid,prid,sort,o')->order('o asc')->select();
		$tree = new Tree($category);
		
		$str = "<option value=\$sid \$selected>\$spacer\$sort</option>"; //生成的形式
		$category = $tree->get_tree(0,$str, 0);
		
		$this -> assign('page', $show); // 赋值分页输出
		$this -> assign('product',$product);
		$this -> assign('category',$category);//分类输出
		
		$this -> display();
	}	
	public function edit(){
		$Product  = M('Product');
		$Company  = M('Company');
		$Category = M('Category');
		$data['pid'] = I('get.pid');
		$product = $Product-> where($data) -> join('hc_company ON hc_company.cid = hc_product.cid','LEFT') 
										   -> find();
		$sort = $Category  -> where('sid='. $product['sid']) -> find();
		$category = $Category ->field('sid,prid,sort')->order('o asc')->select();
		$company = $Company -> select();
		$tree = new Tree($category);
		$str = "<option value=\$sid \$selected>&nbsp;&nbsp;\$spacer\$sort</option>"; //生成的形式
		$parent =  "<option value=" . $product['sid'] . ">"  .  $sort['sort']  .  "</option>";  	
		$category = $tree->get_tree($product['sid'],$str, $product['tid']);			
		$category = $parent . $category;
		$this -> assign('category',$category);
		$this -> assign('company',$company);
		$this -> assign('product',$product);
		$this -> display();		
	}	
	public function add(){
		$Company = M('Company');
		//$Category = M('Category');
		$company = $Company ->select();	
		$this -> assign('company',$company);
		$this -> display();		
	}	
	public function update(){
		$Product = M('Product');
		$pid = I('post.pid');		
		//添加
		$data['cid'] = I('post.cid');
		$data['tid'] = I('post.sid');
		$data['product'] = I('post.product');
		$data['brief'] = I('post.brief');
		$data['price'] = floatval(I('post.price'));
		$data['aprice'] = floatval(I('post.aprice'));
		$data['psum'] = I('post.psum') ? floatval(I('post.psum')): 10000;	
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
			$data['kid'] = empty($data['kid']) ? $oldproduct['kid'] : $data['kid'];
			$data['product'] = empty($data['product']) ? $oldproduct['product'] : $data['product'];
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
				$this->success('新增'.$data['product'].'成功', 'add');
			} else {
				addlog('增加'.$data['product'].'产品失败',3);
				$this->error('新增'.$data['product'].'失败');
			}
		}	
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
			$this->success('成功删除产品：'.$product['product'], 'index');
		} else {
			addlog('删除产品失败：'.$product['product'],3);
			$this->error('删除产品失败！');
		}		
	}	
	public function status(){
		$Model = new \Think\Model(); 
		$pid = I('param.pid');	
		if( is_array($pid) ){
			$pid = implode(',',$pid);
			$map['pid']  = array('in',$pid);
			$result = $Model->execute("update hc_product set pstatus = !`pstatus` where pid in ($pid)");
										//UPDATE `hc_product` SET `pstatus`= !`pstatus` WHERE pid in (8,9)
		}else{
			$result = $Model->execute("update hc_product set pstatus = !`pstatus` where pid=$pid");
		}
		if($result){
			addlog('下架/上架产品成功：'.$pid,3);
			$this->success('成功下架/上架产品：'.$pid, 'index');
		} else {
			addlog('下架/上架失败：'.$pid,3);
			$this->error('下架/上架失败！');
		}	
	}
	public function upsort(){   //更新类
		$Category = M('Category');
		$map['cid'] = I('post.cid');
		$sid = M('Company') -> field('sid') -> where($map) -> find();
		$sort = $Category  -> where('sid='. $sid['sid']) -> find();
		$category = $Category ->field('sid,prid,sort')->order('o asc') ->select();
		$tree = new Tree($category);
		$str = "<option value=\$sid \$selected>&nbsp;&nbsp;\$spacer\$sort</option>"; //生成的形式
		$parent =  "<option value=" . $sid['sid'] . ">"  .  $sort['sort']  .  "</option>";  
		$category = $tree->get_tree($sid['sid'],$str,0);
		$category = $parent . $category;
		$this->ajaxReturn($category);		
	}
	
	
	
	
}