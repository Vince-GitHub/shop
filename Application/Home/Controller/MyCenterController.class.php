<?php
namespace Home\Controller;
use Think\Controller;
class MyCenterController extends Controller {

	
	public function index(){
        $id = $_SESSION['user']['users_id'];
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
			   
                $icon = $_POST['oldpic'];//获取失败信息
            }
			}
			 $_POST['users_icon']=$icon;
        if($user -> create()){
            if($user -> save()){
				
                $this -> success("修改用户信息成功",'index');
            }else{
                
                $this -> error("修改用户信息失败");
            }
        }else{
            $this -> error("修改用户信息失败");
        }
        
    }
	
	public function repass(){

    	$this -> display();
	}
}