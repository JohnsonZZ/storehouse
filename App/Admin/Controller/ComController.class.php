<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class ComController extends Controller {
    public function _initialize(){
		if( (session('username') && session('pwd') )|| (cookie('username')&&cookie('pwd')) ){
			
		}else{
			$this->redirect('Login/index');
		}
    }
}