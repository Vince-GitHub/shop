<?php
namespace Admin\Controller;
use Think\Controller;

class ShareController extends Controller{
	//查看数据
    public function index(){
		$share = M("share");
		$share = $share -> order("share_id")->select();
		$this -> assign('share', $share);
       
		$user = M("users");
		$users = $user -> select();
		$this -> assign('users', $users);
		$this -> display();
    
	}
	
	//删除数据
    public function del(){
        $id = I("share_id");

        $share = M('share');
        $res = $share ->delete($id);
        if($res){
            $this -> success("删除分享成功！");
        }else{
            $this -> error("删除分享失败");
        }  
    }

}
