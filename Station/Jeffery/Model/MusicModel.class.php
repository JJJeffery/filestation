<?php
namespace Jeffery\Model;
use Think\Model; 
class MusicModel extends Model{
	// 上传音乐
	function addMusics($arr){
		if($this->create()){
			return $this->add();
		}else{
			return false;
		}
	}

	// 根据ID获取数据
	function getInfoById($id){
		return $this->where("id=$id")->select();
	}

	// 获取数据
	function getInfoByList($field='*',$where,$order,$limit){
		return $this->field($field)->where($where)->order($order)->limit($limit)->select();
	}

	// 获取总记录数
    function getListCount($where){
    	$arr=$this->field('count(*) as num')->where($where)->select();
    	return $arr[0]['num'];
    }

	// 根据ID删除信息
    function deleteInfoById($id){
    	return $this->where("id=$id")->delete();
    } 

}