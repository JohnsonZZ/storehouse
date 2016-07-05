<?php
namespace Seller\Controller;
use Seller\Controller\ComController;
header("Content-type:text/html;charset=utf-8");
class MessageController extends ComController {
    public function index(){
		$this->display();
	}
	public function message(){
		$this->display();
	}
	public function send(){
		$this->display();
	}
}