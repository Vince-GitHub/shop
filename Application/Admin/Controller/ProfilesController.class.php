<?php
namespace Admin\Controller;
use Think\Controller;

class ProfilesController extends Controller{
	//查看数据
	public function index(){
		$profile = M("profiles");
		$profiles = $profile -> order("profile_id")->select();
        $this -> assign('profiles', $profiles);
		$this -> display();
    }
	
	//添加数据
    public function add(){
	
		$this -> display();
    }
	
	public function insert(){
	$profile = M("profiles");
	if($profile -> create()){			  
		   $res = $profile -> add();
		   if($res){
			   $this -> success("添加新地址成功", "index");
		   }
		 }else{			 
			 $this -> error("添加新地址失败");
		 }
	}
	
	//删除数据
    public function del(){
        $id = I("profile_id");

        $profile = M('profiles');
        $res = $profile ->delete($id);
        if($res){
            $this -> success("删除地址成功！");
        }else{
            $this -> error("删除地址失败");
        }
        
    }
	
	//修改用户
    public function mod(){
        $id = I("profile_id");
        
		$profile = M("profiles");
        $data = $profile -> find($id);
        $this -> assign("profile", $data);
        
		$this -> display();
        
    }
	
	    public function update(){
        $profile = M("profiles");
        
        if($profile -> create()){
            if($profile -> save()){
                $this -> success("修改成功",'index');
            }else{                
                $this -> error("修改失败");
            } 
        }else{
            $this -> error("修改失败");
        }
    }
	
}
