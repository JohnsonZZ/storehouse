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
				if($list[$key]['sort'] == ''){									
					$list[$key]['sort'] =$child['sort'];						
				}else{					
					$list[$key]['sort'] .=','.$child['sort'];
				}
			}
		}
		dump($_SERVER['HTTP_HOST']);
		$this->assign('list',$list);
		$this->display();
	}
	public function add(){
		$this->display();
	}
	public function edit(){
		$Company = M('Company');
		$Sort = M('Sort');
		$data['cid'] = I('get.cid');
		$company = $Company -> where($data) -> find();
		
		$sort = $Sort -> where($data) -> select();
		foreach($sort as $key => $val){
			if($key == 0){
				$company['sort'] = $val['sort'];
				$company['sid'] = $val['sid'];
				
			}else{
				$company['sort'] .= ','.$val['sort'];
				$company['sid'] .= ','.$val['sid'];
			}			
		}
		$this->assign('company',$company);
		$this->display();
	}
	public function update(){
		$Company = M('Company');
		$Sort = M('Sort');
		//修改数据   result1:更新   result2:增删
		$data = I('post.');
		
		$list = array();
		if($data['cid']){		
			$sid = explode(',',$data['sid']) ;
			$sort =  explode(',',$data['sort']) ;
			$sidlen = count($sid);
			$sortlen = count($sort);
			if($sidlen == $sortlen){
				for($i=0 ; $i<= $sortlen-1 ; $i++){
					$map['sid'] =  $sid[$i];
					$list['sort'] =  $sort[$i];
					$result = $Sort -> where($map) -> save($list);		
					if($result){
						addlog('修改'.$data['company'].'公司成功');
						$this->success('修改'.$data['company'].'公司成功', 'index');
					} else {
						addlog('修改'.$data['company'].'公司失败');
						$this->error('修改'.$data['company'].'公司失败');
					}						
				}				
			}else if($sidlen > $sortlen){
					$j =  $sortlen;
					for( $i=0 ; $i<= $sortlen -1 ; $i++ ){
						$map['sid'] =  $sid[$i];
						$list['sort'] =  $sort[$i];
						//dump($map['sid'] );dump($list['sort']);
						$result1 = $Sort -> where($map) -> save($list);		
						//dump($result);
					}
					for( $j ; $j <= $sidlen - 1 ; $j ++ ){				
						$result2 = $Sort -> where('sid='.$sid[$j]) -> delete();					
					}
					if($result1 &&  $result2){		
						addlog('修改'.$data['company'].'公司成功');
						$this->success('修改'.$data['company'].'公司成功', 'index');					
					} else {
						addlog('修改'.$data['company'].'公司失败');
						$this->error('修改'.$data['company'].'公司失败');
					}	
			}else if($sidlen < $sortlen){	
					$j = $sidlen ;
					for( $i=0 ; $i<= $sidlen  -1 ; $i++ ){
						$map['sid'] =  $sid[$i];
						$list['sort'] =  $sort[$i];
						$result1 = $Sort -> where($map) -> data($list) -> save();						
					}
					for( $j ; $j <= $sortlen -1 ; $j ++ ){
						$m['cid'] = $data['cid'];
						$m['sort'] = $sort[$j]; 
						$result2 = $Sort -> data($m) -> add();		
					}
					if($result1 &&  $result2){
						addlog('修改'.$data['company'].'公司成功');
						$this->success('修改'.$data['company'].'公司成功', 'index');
					} else {
						addlog('修改'.$data['company'].'公司失败');
						$this->error('修改'.$data['company'].'公司失败');
					}	
			}			
				
		}	
		//添加公司和分类
		else{
			$result1 = $Company -> data('company='.$data['company']) -> add();
			$map['cid'] = $Company -> max('cid');
			$map['sort'] = $data['sort'];
			$result2 = $Sort -> data($map) -> add();
			if($result1){
				if($result2){
					addlog('成功添加'.$data['company'].'公司和其分类');
					$this->success('成功添加'.$data['company'].'公司和其分类', 'index');
					}
				else {
					addlog('成功添加'.$data['company'].'公司,但分类添加失败');
					$this->success('成功添加'.$data['company'].'公司,但分类添加失败');
				}
			} 
			else{
				addlog('添加'.$data['company'].'公司失败');
				$this->error('添加'.$data['company'].'公司失败');
			}
		}		
	}
	public function del(){
		$Company = M('Company');
		$Sort = M('Sort');
		$cid = I('param.cid');	
		if( is_array($cid) ){
			$cid = implode(',',$cid);
			$map['cid']  = array('in',$cid);
			$result1 = $Company -> where($map) -> delete();
			$result2 = $Sort -> where($map) -> delete();
			//$result = $Sort -> where($map) -> delete();					   //暂时没有删除公司分类			
		}
		else{
			$result1 = $Company -> where('cid='.$cid) -> delete();
			$result2 = $Sort -> where('cid='.$cid) -> delete();
			//$result = $Sort -> where('cid='.$cid) -> delete();				
		}
		if($result1){
			if($result2){
			$this->success('成功删除公司及其分类', 'index');
			}else{
				addlog("删除公司成功，分类删除失败");
				$this->success('成功删除公司，但分类删除失败', 'index');
				}
		} else {
			addlog("删除公司及其分类失败");
			$this->error('删除公司及其分类失败');
		}		
	}
}
?>