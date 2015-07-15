<?php
namespace Admin\Controller;
use Think\Controller;

class collectsController extends Controller{
	//查看数据
	public function index(){
		//查看收藏表collects
		$collect = M("collects");
		$collects = $collect -> order("collect_id")->select();
        $this -> assign('collects', $collects);
		
		//查看商品表goods
		$good = M("goods");
		$goods = $good -> select();
		$this -> assign('goods',$goods);
		
		//查看用户表users
		$user = M("users");
		$users = $user -> select();
		$this -> assign('users',$users);
		
		$this -> display();
    }
}
