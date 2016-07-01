<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class CompanyController extends ComController {
    public function index(){
		
		//$li= "select * from hc_sort RIGHT JOIN hc_company ON hc_company.cid = hc_sort.cid;";  //查询公司和分类
		//$company = $Company ->query($li);
		//$company = $Company ->field('hc_company.cid,hc_company.company,hc_sort.sort')->join('hc_sort ON hc_company.cid = hc_sort.cid  ','LEFT') -> select();
		$Company = M('Company');
		$Sort = M('Sort');
		$list = $Company->select();
		foreach($list as $key => $val){
			$sort = $Sort->where('cid='.$val['cid'])->select();
			foreach($sort as $child){
				$list[$key]['sort'] .=$child['sort'];
			}
		}
		dump($list);die();
		$this->assign('company',$company);
		$this->display();
	}
	public function add(){
		$this->display();
	}
	public function edit(){
		$Company = M('Company');
		$data['id'] = I('get.id');
		$company = $Company -> where($data) -> find();
		$this->assign('company',$company);
		$this->display();
	}
	public function update(){
		$Company = M('Company');
		$Sort = M('Sort');
		$id = I('post.id');
		$data['company'] = I('post.company');
		$sort = I('post.sort') ? explode('-',I('post.sort')) : '';
		if($id){
			if($sort){
				$value['cid'] = $id;
				foreach($sort_array as $val){
					$value['sort'] = $val;	
					$Sort -> create($value,2);
					$result2 = $Sort ->save(); //修改分类表		
				}
			}
			$result1 = $Company ->where('id ='.$id) ->save($data); //修改公司表
			if($result1 && $result2){
				$this->success('修改公司成功', 'index');
			} else {
				$this->error('修改公司失败');
			}		
		}
		else{
			$Company -> create($data);				
			$result1 = $Company -> add(); //新增公司表
			if($sort_array){
					$companyid['cid'] = $id;
					$Sort -> create($companyid);						
				foreach($sort_array as $val){
					$value['sort'] = $val;
					$Sort -> create($value);	
				}
			}
			$result2 = $Sort ->where('cid ='.$id) ->add(); //新增分类表			
			if($result1 && $result2){
				$this->success('新增公司成功', 'index');
			} else {
				$this->error('新增公司失败');
			}				
		}
			
	}
	public function del(){
		$Company = M('Company');
		$id = I('get.id');
		
		if($id){
			$result = $Company -> where('id='.$id) -> delete();	
			if($result){
				$this->success('删除公司成功', 'index');
			} else {
				$this->error('删除公司失败');
			}		
		}
		
		
		
		
	}
}
?>