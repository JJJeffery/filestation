<?php
namespace Jeffery\Controller;
use Think\Controller;
class MusicController extends CommonController{
	protected $muOb;
	function _initialize(){
		parent::_initialize();
        $muOb=D('music');
        $this->muOb=$muOb;
	}	
	function add(){
		$this->display();
	}
	function addsave(){
		$dir = "./Uploads/Musics";
		if(!file_exists($dir)){
            mkdir($dir,0777);
        }
		// 音乐上传
	    $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 10485760;// 设置附件上传大小 10M
        $upload->exts = array('mp3','wav','wma','ogg','ape','acc','cda','midi','flac','aac');// 设置附件上传类型
        $upload->rootPath = './Uploads/Musics/'; // 设置附件上传根目录
        $upload->saveName = md5(uniqid(md5(microtime(true)),true)); // 保存的文件名
        $upload->autoSub = false;  // 自动使用子目录保存

        // 上传文件
        $info = $upload->upload();   
        if($info){
        	$musicname=$info['upload']['name'];
            $musicmsg='音乐上传成功';
        	// 数据信息入表
            $_POST['musicname']=$musicname;
            $_POST['musicsavename']=$info['upload']['savename'];
            $_POST['size']=fileSizeConv($info['upload']['size']);
            $_POST['href']='http://'.$_SERVER['HTTP_HOST'].'/filestation/Uploads/Musics/'.$info['upload']['savename'];
            // var_dump($_POST);die;
            $re=$this->muOb->addMusics($_POST);
        	if($re){
        	    $this->success($musicmsg,U('Music/manage'));
            }
        }else{
        	$musicmsg=$upload->getError();
        	$msg='音乐上传失败'.'<br/>';
	   	    $this->error($msg.$musicmsg,U('Music/add'));
        }
	}

	function manage(){
		// 实现分页
		// 获取总记录数
		$count=$this->muOb->getListCount();
		$pageSize=13;
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
		$musicInfo=$this->muOb->getInfoByList('*',"","id desc","$start,$pageSize");
		// var_dump($musicInfo);die;
		// 发送数据到模板
		$this->assign('pageShow',$pageShow);
		$this->assign('musicInfo',$musicInfo);
		$this->display();

	}

	function delete(){
		$id=(int)$_GET['id'];
		// 根据ID获取信息
		$info=$this->muOb->getInfoById($id);
		// var_dump($info);die;
		$musicsavename=$info[0]['musicsavename'];
		// 删除数据
		$re=$this->muOb->deleteInfoById($id);
		if($re){
			// 删除图片
			unlink('./Uploads/Musics/'.$musicsavename);
			$this->success('删除成功',U('Music/manage'));
		}else{
			$this->error('删除失败',U('Music/manage'));
		}
	}

}