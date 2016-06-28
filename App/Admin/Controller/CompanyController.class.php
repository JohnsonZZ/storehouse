<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class CompanyController extends ComController {
    public function index(){
		$Company = M('Company');
		$company = $Company ->join('LEFT JOIN hc_sort ON  hc_company.id=hc_sort.cid ') -> select();
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
		$id = I('post.id');
		$data['company'] = I('post.company');
		if($id){
			$Company ->create($data);
			$result = $Company ->where('id ='.$id) ->save();
			if($result){
				$this->success('修改公司成功', 'index');
			} else {
				$this->error('修改公司失败');
			}		
		}
		else{
			$Company ->create($data);	
			$result = $Company ->add();	
			if($result){
				$this->success('新增公司成功', 'index');
			} else {
				$this->error('新增公司失败');
			}				
		}
			
	}
	public function del(){
		
		
		
		
	}
}
?>