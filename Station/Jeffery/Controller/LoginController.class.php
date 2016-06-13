<?php
namespace Jeffery\Controller;
use Think\Controller;
class LoginController extends Controller{
	function login(){
		$this->display();
	}
	function check(){
        // 验证码检测
		$Verify = new \Think\Verify();
        $re=$Verify->check($_POST['verify']);
        if($re){
        	$username=md5(md5($_POST['username']));
			$password=md5(md5($_POST['password']));
			// echo $username.'---'.$password;exit;
			$mOb=M('admin');
			$re=$mOb->where("username='$username' and password='$password'")->select();
			if($re){
				setcookie('userid',$re[0]['id'],time()+3600,'/');
				setcookie('nickname',$re[0]['nickname'],time()+3600,'/');
				$this->success('登陆成功',U('Index/index'),1);
			}else{
				$this->error('用户名或密码错误！',U('Login/login'));
			}
        }else{
        	$this->error('验证码错误！',U('Login/login'));
        }		
    }

	function verify(){
		$config = array(
            'fontSize' => 13, // 验证码字体大小
            'length' => 4, // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
            'useImgBg' => true,  // 开启验证码背景图片
            'imageW' => 90,  // 验证码宽度
            'imageH' => 30,  // 验证码高度
            'codeSet' => '0123456789',
        );
		$Verify = new \Think\Verify($config);
        $Verify->entry();
	}

	function quit(){
		$this->display();
	}

}