<?php
namespace Jeffery\Controller;
use Think\Controller;
class CommonController extends Controller{
	function _initialize(){
		if(!isset($_COOKIE['userid'])){
			$this->error('请先登录！',U('Login/quit'),1);
			exit();
		}
	}
}