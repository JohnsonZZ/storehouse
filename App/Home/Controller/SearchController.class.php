<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
    public function index(){
        $datatable = I('get.datatable');
		if($datatable=="company"){
			$message = "<p>暂不支持公司搜索</p>";
			$this->assign("message",$message);
			$this->display();
			die();
		}
		$keyword = I('get.search-keyword');
		$count = M($datatable)->where('product like "%'.$keyword.'%"')->count();
		if($count == "0"){
			$message = "<p>有0件相关产品</p>";
			$this->assign("message",$message);
		}
		$Page = new \Think\Page($count, 21); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$goods = M($datatable)
					->field('pid,product,photo,company')
					->join('LEFT JOIN hc_company ON hc_product.cid = hc_company.cid')
					->where('product like "%'.$keyword.'%"')
					->limit($Page->firstRow . ',' . $Page->listRows)
					->select();
		$this->assign('page', $show); // 赋值分页输出
		$this->assign("goods",$goods);
        $this->display();
	}
}