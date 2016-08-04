<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
use Vendor\Tree;
header("Content-type:text/html;charset=utf-8");
class CompanyController extends ComController {
    public function index(){
		$Company = M('Company');
		$Category = M('Category');
		$list = $Company->select();
		foreach($list as $key => $val){
			$sort = $Category -> where('sid='.$val['sid']) -> select();
			foreach($sort as $child){
				if($list[$key]['sort'] == ''){									
					$list[$key]['sort'] =$child['sort'];						
				}else{					
					$list[$key]['sort'] .=','.$child['sort'];
				}
			}
		}
		$this->assign('list',$list);
		$this->display();
	}
	public function add(){
		$category = M('category')->field('sid,prid,sort')->select();
		$tree = new Tree($category);
		$str = "<option value=\$sid \$selected>\$spacer\$sort</option>"; //生成的形式
		$category = $tree->get_tree(0,$str,0);
		$this->assign('category',$category);//导航
		$this->display();
	}
	public function edit(){
		$Company = M('Company');
		$Category = M('Category');
		$data['cid'] = I('get.cid');
		$company = $Company -> where($data) -> find();
	
		$sid = isset($_GET['sid'])?intval($_GET['sid']):false;
		$currentcategory = $Category -> where('sid='.$sid)->find();
		$this->assign('currentcategory',$currentcategory);
		
		$category = M('category')->field('sid,prid,sort')-> order('o asc') -> select();
		$tree = new Tree($category);
		$str = "<option value=\$sid \$selected>\$spacer\$sort</option>"; //生成的形式
		$category = $tree->get_tree(0,$str, 1);

		$this->assign('category',$category);		
		$this->assign('company',$company);
		$this->display();
	}
	public function update(){
		$Company = M('Company');
		//修改数据   result1:更新   result2:增删
		$map['company'] = I('post.company');		
		$map['sid'] = I('post.sid');	
		$cid = I('post.cid');		
		if($cid){
			$result = $Company -> data($map) -> where('cid='. $cid) -> save();
			if($result){
				addlog('修改'.$map['company'].'成功',3);
				$this->success('修改'.$map['company'].'成功', 'index');
			} else {
				addlog('修改'.$map['company'].'失败',3);
				$this->error('修改'.$map['company'].'失败');
			}
			
		}else{
			$result = $Company -> data($map) -> add();
			if($result){
				addlog('添加'.$map['company'].'成功',3);
				$this->success('添加'.$map['company'].'成功', 'index');
			} else {
				addlog('添加'.$map['company'].'失败',3);
				$this->error('添加'.$map['company'].'失败');
			}
		}
		
		/*
		
		
		
		
		
		//添加公司和分类
		else{
			$result1 = $Company -> data('company='.$data['company']) -> add();
			$map['cid'] = $Company -> max('cid');
			$map['sort'] = $data['sort'];
			$result2 = $Sort -> data($map) -> add();
			if($result1){
				if($result2){
					addlog('成功添加'.$data['company'].'公司和其分类',3);
					$this->success('成功添加'.$data['company'].'公司和其分类', 'index');
					}
				else {
					addlog('成功添加'.$data['company'].'公司,但分类添加失败',3);
					$this->success('成功添加'.$data['company'].'公司,但分类添加失败');
				}
			} 
			else{
				addlog('添加'.$data['company'].'公司失败',3);
				$this->error('添加'.$data['company'].'公司失败');
			}
		}	/*/	
	}
	public function del(){
		$Company = M('Company');
		$cid = I('param.cid');	

		if( is_array($cid) ){
			$cid = implode(',',$cid);
			$map['cid']  = array('in',$cid);
			$company = $Company -> field('company') -> where($map) -> select();
			$company_array = array_column($company, 'company');
			$company['company'] = implode(',',$company_array);
			$result = $Company -> where($map) -> delete();
	
		}
		else{
			$company = $Company -> field('company') -> where('cid='.$cid) -> find();
			
			$result = $Company -> where('cid='.$cid) -> delete();
				
		}
		if($result){	
			addlog('成功删除公司：'.$company['company'],3);
			$this->success('成功删除公司：'.$company['company'], 'index');

		} else {
			addlog("删除公司失败：".$company['company'],3);
			$this->error('删除公司失败：'.$company['company']);
		}		
	}
}
?>