<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller{
    public function index(){
		
		//查看index表
		$index = M("index");
		$indexs = $index ->order("index_id")-> select();
		$this -> assign('indexs', $indexs);
		
		//查看系统公告表
		$notice = M("notice");
		$notices = $notice -> select();
		$this -> assign('notices',$notices);

		$this -> display();
	}
	
}
