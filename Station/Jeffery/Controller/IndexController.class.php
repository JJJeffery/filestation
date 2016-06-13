<?php
namespace Jeffery\Controller;
use Think\Controller;
class IndexController extends CommonController{
	
	function index(){
		$this->display();
	}
	function top(){
		$time=time();
		$this->assign('time',$time);
		$this->display();
	}
	function menu(){
		$this->display();
	}
	function main(){
		$this->display();
	}
	function quit(){
		setcookie('userid','',0,'/');
		setcookie('nickname','',0,'/');
		$this->display();
	}
}