<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller{


    public function index(){
        $user = M("users");
		
		$count= $user ->count();
		$Page=new \Think\Page($count,5);
		$users = $user -> limit($Page->firstRow.','.$Page->listRows)->select();
		$show = $Page-> show();
		$this -> assign("page",$show);
        $this -> assign('users', $users);
		
        $this -> display();
    }
    
    public function add(){
		
        
        $this -> display();
    }
    
    public function insert(){
	     if (!empty($_FILES)) {
            //图片上传设置
            $config = array(   
                'maxSize'    =>    3145728, 
                'rootPath'	 =>    'Public/uploads',
                'savePath'   =>    '/images/',  
                'saveName'   =>    array('uniqid',''), 
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    false,   
                //'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
                foreach($images as $file){       
				$icon = $file['savepath'].$file['savename'];
				echo $icon;
                }
			}else{
                $this->error($upload->getError());//获取失败信息
            }
			}
     
			if(!empty($_POST['users_pass'])){
				
				if($_POST['users_pass'] == $_POST['repwd']){

            $_POST['users_pass'] = md5($_POST['repwd']);
			} else{
				$this->error("两次输入密码不同");
			}         
             $user = D("users");
			 
			 $_POST['users_icon']=$icon;
			 
             if($user -> create()){
                  
               $res = $user -> add();
			   
               if($res){
				   
                $this -> success("添加用户成功","index");
               }
             }else{
                 
                $this -> error($user -> getError());
				}           

			}
    
	}	
	
    public function getUserInfo(){
        $user = M("users");
        
        $data = $user ->find($_GET['id']);
        
    }
    
    public function del(){
        $ids = I("ids");
        if(is_array($ids)){
            $usersid = implode(",",$ids);
        }else{   
            $usersid = $ids;
        }
        $users = M('users');
        $res = $users ->delete($usersid);
        if($res){
            $this -> success("删除用户成功！");
        }else{
            $this -> error("删除用户失败");
        }
        
    }
    public function upload(){
     if (!empty($_FILES)) {
            //图片上传设置
            $config = array(   
                'maxSize'    =>    3145728, 
                'rootPath'	 =>    'Public/uploads',
                'savePath'   =>    '/images/',  
                'saveName'   =>    array('uniqid',''), 
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    false,   
                //'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
                $info=$images['Filedata']['savename'];
                //返回文件地址和名给JS作回调用
            }
            else{
                $this->error($upload->getError());//获取失败信息
            }
     }
    }

    public function mod(){
        $id = I("id");
        $user = M("users");
        $data = $user -> find($id);
        $this -> assign("user", $data);
        $this -> display();
    }
    public function update(){
        $user = M("users");

		if (!empty($_FILES)) {
            //图片上传设置
            $config = array(   
                'maxSize'    =>    3145728, 
                'rootPath'	 =>    'Public/uploads',
                'savePath'   =>    '/images/',  
                'saveName'   =>    array('uniqid',''), 
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    false,   
                //'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
                foreach($images as $file){       
				$icon = $file['savepath'].$file['savename'];
                }
			}else{
                $this->error($upload->getError());//获取失败信息
            }
			}
			 $_POST['users_icon']=$icon;
        if($user -> create()){
            if($user -> save()){
                $this -> success("修改用户成功",'index');
            }else{
                $this -> error("修改用户失败");
            }
        }else{
            $this -> error("修改用户失败");
        }
    }
}
