<?php
namespace Admin\Controller;
use Admin\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class OrderController extends ComController {
    public function index(){
		$this->display();
	}
}