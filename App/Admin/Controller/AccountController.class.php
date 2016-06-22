<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class AccountController extends ComController {
    public function index(){
		$this->display();
	}
	public function account(){
		$this->display();
	}
}