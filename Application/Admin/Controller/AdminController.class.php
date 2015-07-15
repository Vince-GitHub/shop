<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller{

    public function index(){
        $admin = M("admins");
		
		$count = $admin -> count();
		
		$Page=new \Think\Page($count,5);
		
		$admins = $admin ->limit($Page->firstRow.','.$Page -> listRows)->select();
		
		$show = $Page-> show();
		
		$this -> assign("page",$show);
		
        $this -> assign('admins', $admins);
		
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
				
                }
			}else{
                $this->error($upload->getError());//获取失败信息
            }
			}
     
		
        if($_POST['admins_pass'] == $_POST['repwd']){
            
            $_POST['admins_pass'] = md5($_POST['repwd']);
			           
             $admin = M("admins");
			 $_POST['admins_icon']=$icon;
             if($admin -> create()){
                  
               $res = $admin -> add();
               if($res){
                   $this -> success("添加管理员成功", "index");
               }
             }else{
                 
                 $this -> error("添加管理员失败");
             }
            
        }else{
            
            $this -> error("两次密码不一致！");
        }
    }
    
	
	
    public function getadminInfo(){
        $admin = M("admins");
        
        $data = $admin ->find($_GET['id']);
        
    }
    
    public function del(){
        $ids = I("ids");
        if(is_array($ids)){
            $adminsid = implode(",",$ids);
        }else{   
            $adminsid = $ids;
        }
        $admins = M('admins');
        $res = $admins ->delete($adminsid);
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
        $admin = M("admins");
        $data = $admin -> find($id);
        $this -> assign("admin", $data);
        $this -> display();
        
    }
    public function update(){
        $admin = M("admins");
		/*
        if($_POST['pass'] && $_POST['repass']){
            if($_POST['pass'] == $_POST['repass']){
                $_POST['pass'] = md5($_POST['pass']);                            
            }else{
                $this -> error("两次密码不一致");              
            }
            
        }else{
            unset($_POST['pass']);                   
        }
        */
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
			 $_POST['admins_icon']=$icon;
        if($admin -> create()){
            if($admin -> save()){
				
                $this -> success("修改用户成功",'index');
            }else{
                
                $this -> error("修改用户失败");
            }
            
        }else{
            $this -> error("修改用户失败");
        }
        
    }
}
    