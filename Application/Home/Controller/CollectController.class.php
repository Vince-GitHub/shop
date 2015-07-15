<?php
namespace Home\Controller;
use Think\Controller;
class CollectController extends Controller {
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
	
	//删除收藏
	 public function del(){
        $id = I("collect_id");

        $collect = M('collects');
        $res = $collect ->delete($id);
        if($res){
            $this -> success("删除收藏成功！");
        }else{
            $this -> error("删除收藏失败");
        }  
	}
	
	//添加收藏
	
	 public function add(){
	    $data['cart_userid'] = $_SESSION['user']['users_id'];
		if($data['cart_userid']){
		$gid = I("id");
		$collect = M("collects");
		
		$uid = $_SESSION['user']['users_id'];
		$_POST['collect_userid'] = $uid;
		$_POST['collect_goodsid'] = $gid;
		$_POST['collect_time'] = time();
		
		
		if($collect -> create()){		  
			   
			   $res = $collect -> add();
			   
			   if($res){
				   $this -> success("您已经成功收藏该商品", "");
			   }
			 }else{			 
				 $this -> error("收藏商品失败");
			 }

	}else{
		$url = U("Login/index");
		$this -> error("您还未登陆，请登陆后再执行收藏操作",$url);
		}
	
    }
}