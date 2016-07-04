<?php
namespace Storage\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class ComController extends Controller {
    public function _initialize(){
		if(session('phone') && session('pwd')){
			
		}elseif(cookie('phone') && cookie('pwd')){
			if(session('id')){
				
			}else{
				session('id',cookie('id')) ;
				session('phone',cookie('phone')) ;
				session('username',cookie('username')) ;
				session('pwd',cookie('pwd')) ;
			}
		}else{
			$this->redirect('Login/index');
		}
    }
}