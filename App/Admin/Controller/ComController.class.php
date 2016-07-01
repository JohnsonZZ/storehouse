<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class ComController extends Controller {
    public function _initialize(){
		if(session('username') && session('pwd')){
			
		}elseif(cookie('username') && cookie('pwd')){
			if(session('id')){
				
			}else{
				session('id',cookie('id')) ;
				session('username',cookie('username')) ;
				session('pwd',cookie('pwd')) ;
			}
		}else{
			$this->redirect('Login/index');
		}
    }
}