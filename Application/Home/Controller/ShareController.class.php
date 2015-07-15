<?php

namespace Home\Controller;
use Think\Controller;

class ShareController extends Controller{
    public function index(){
        //查看分享表，share数据库
		$share = M('share');
		$shares = $share -> select();
		$this -> assign("share",$shares);
		
		//查看用户表users
		$user = M("users");
		$users = $user -> select();
		$this -> assign('users',$users);
		
		//查看商品表goods,显示图片
		$good = M("goods");
		$goods = $good -> select();
		$this -> assign('goods',$goods);
		
		$this -> display();
	}
	
	
	//添加数据
    public function add(){
		$gid = I("gid");
	
		$good = M("goods");
		$goods = $good ->find($gid);
		$this -> assign('goods',$goods);
    
		$this -> display();
	}
	public function insert(){
	

	
	$uid = $_SESSION['user']['users_id'];
	
	$_POST['share_userid'] = $uid;
	$_POST['share_time'] = time();
	
	//查看商品表goods
	

	$share = M("share");
	if($share -> create()){			  
		   $res = $share -> add();
		   if($res){
			   $this -> success("添加商品分享成功", "detail");
		   }
		 }else{			 
			 $this -> error("添加商品分享失败");
		 }
	}
	
	public function detail(){

		
		//自己的分享详情
		$share = M("share");
		$uid = $_SESSION['user']['users_id'];
		$where = "share_userid LIKE {$uid}";
		$shares = $share -> where($where) ->select();
		$this -> assign("shares",$shares);
		
		//查看商品表goods
		$good = M("goods");
		$goods = $good -> select();
		$this -> assign('goods',$goods);
		
		$this -> display();
	}
	
		//删除收藏
	public function del(){
        $id = I("id");

        $share = M('share');
        $res = $share ->delete($id);
        if($res){
            $this -> success("删除分享成功！");
        }else{
            $this -> error("删除分享失败");
        }  
	}

}
