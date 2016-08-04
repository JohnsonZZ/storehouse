<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
use Vendor\Tree;
header("Content-type:text/html;charset=utf-8");
class SortController extends ComController {

	public function index(){
	
		$Category = D('category');
		$category = $Category->field('sid,prid,sort,o')->order('o asc')->select();
		$category = $Category->getMenu($category);
		$this -> assign('category',$category);
		$this -> display();
	}
	
	public function del(){
		
		$sid = isset($_GET['sid'])?intval($_GET['sid']):false;
		if($sid){
			$data['sid'] = $sid;
			$category = M('category');
			if($category->where('prid='.$sid)->count()){
				$this->error('存在子类，严禁删除','index');
			}else{
				$category->where('sid='.$sid)->delete();
				addlog('删除分类，ID：'.$sid);
			}
			$this->success('删除分类，ID：'.$sid.'，名称：'.$sort . '成功','index');
		}else{
			$this->error('删除分类，ID：'.$sid.'，名称：'.$sort . '失败','index');
		}

	}
	
	public function edit(){
		
		$sid = isset($_GET['sid'])?intval($_GET['sid']):false;
		$currentcategory = M('category')->where('sid='.$sid)->find();
		$this->assign('currentcategory',$currentcategory);

		$category = M('category')->field('sid,prid,sort')->order('o asc')->select();
		$tree = new Tree($category);
		$str = "<option value=\$sid \$selected>\$spacer\$sort</option>"; //生成的形式
		$category = $tree->get_tree(0,$str, $currentcategory['prid']);
		$this->assign('category',$category);
		$this -> display();
	}
	
	public function add(){
		
		$prid = isset($_GET['prid'])?intval($_GET['prid']):0;
		$category = M('category')->field('sid,prid,sort')->order('o asc')->select();
		$tree = new Tree($category);
		$str = "<option value=\$sid \$selected>\$spacer\$sort</option>"; //生成的形式
		$category = $tree->get_tree(0,$str, $prid);
		
		$this->assign('category',$category);
		$this -> display();
	}
	
	public function update($act=null){
		if($act=='order'){           
			$sid = I('post.sid',0,'intval');
			if(!$sid){
				die('0');
			}
			$o = I('post.o',0,'intval');
			M('category')->data(array('o'=>$o))->where("sid='{$sid}'")->save();
			addlog('分类修改排序，ID：'.$sid,3);
			die('1');
		}	
		$sid = isset($_POST['sid'])?intval($_POST['sid']):false;
		$data['prid'] = isset($_POST['prid'])?intval($_POST['prid']):0;
		$data['sort'] = isset($_POST['sort'])?trim($_POST['sort']):false;
		$data['o'] = isset($_POST['o'])?intval($_POST['o']):0;
		
		if(!$data['sort']){
			$this->error('没有选择分类','index');
		}
		if($sid){
			if(M('category')->data($data)->where('sid='.$sid)->save()){
				addlog('分类修改，ID：'.$sid.'，名称：'.$sort,3);
				$this->success('修改分类，ID：'.$sid.'，名称：'.$sort . '成功','index');
			}
			else{
				$this->error('修改分类，ID：'.$sid.'，名称：'.$sort . '失败','index');
			}
		}else{
			$sid = M('category')->data($data)->add();
			if($sid){
				addlog('新增分类，ID：'.$sid.'，名称：'.$data['sort'],3);
				$this->success('添加分类，ID：'.$sid.'，名称：'.$sort . '成功','index');
			}
			else{$this->error('添加分类，ID：'.$sid.'，名称：'.$sort . '失败','index');}
		}
		die('0');
	}
	
	
}