<?php
namespace Jeffery\Controller;
use Think\Controller;
class PictureController extends CommonController{
	protected $picOb;
	function _initialize(){
		parent::_initialize();
        $picOb=D('picture');
        $this->picOb=$picOb;
	}	
	function add(){
		$this->display();
	}
	function addsave(){
		$dir = "./Uploads/Pictures";
		if(!file_exists($dir)){
            mkdir($dir,0777);
        }
		// 图片上传
	    $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 10485760;// 设置附件上传大小 10M
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Uploads/Pictures/'; // 设置附件上传根目录
        $upload->saveName = md5(uniqid(md5(microtime(true)),true)); // 保存的文件名
        $upload->autoSub = false;  // 自动使用子目录保存

        // 上传文件
        $info = $upload->upload();     
        if($info){
        	$pic='Uploads/Pictures/'.$info['upload']['savename'];
	        $picinfo=getimagesize($pic);
        	$picname=$info['upload']['name'];
            $picmsg='图片上传成功';
        	// 数据信息入表
            $_POST['picname']=$picname;
            $_POST['picsavename']=$info['upload']['savename'];
            $_POST['size']=fileSizeConv($info['upload']['size']);
            $_POST['wid_hei']=$picinfo[0].'*'.$picinfo[1];
            $_POST['href']='http://'.$_SERVER['HTTP_HOST'].'/filestation/Uploads/Pictures/'.$info['upload']['savename'];
            $re=$this->picOb->addPics($_POST);
        	if($re){
        	    $this->success($picmsg,U('Picture/manage'));
            }
        }else{
        	$picmsg=$upload->getError();
        	$msg='图片上传失败'.'<br/>';
	   	    $this->error($msg.$picmsg,U('Picture/add'));
        }

	}

	function manage(){
		// 实现分页
		// 获取总记录数
		$count=$this->picOb->getListCount();
		$pageSize=5;
		// 实例化分页类
		$Page=new \Think\Page($count,$pageSize);
		// 分页样式定制
		$Page->setConfig('header', '共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		// 显示分页
		$pageShow=$Page->show();
		// 分页数据显示
		$start=$Page->firstRow;
		$picInfo=$this->picOb->getInfoByList('*',"","id desc","$start,$pageSize");
		// var_dump($picInfo);die;
		// 发送数据到模板
		$this->assign('pageShow',$pageShow);
		$this->assign('picInfo',$picInfo);
		$this->display();

	}

	function delete(){
		$id=(int)$_GET['id'];
		// 根据ID获取信息
		$info=$this->picOb->getInfoById($id);
		// var_dump($info);die;
		$picsavename=$info[0]['picsavename'];
		// 删除数据
		$re=$this->picOb->deleteInfoById($id);
		if($re){
			// 删除图片
			unlink('./Uploads/Pictures/'.$picsavename);
			$this->success('删除成功',U('Picture/manage'));
		}else{
			$this->error('删除失败',U('Picture/manage'));
		}
	}


}