<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller{
	//查看数据
	 public function index(){
        $index = M("index");
		$indexs = $index ->order("index_id")-> select();
		$this -> assign('indexs', $indexs);
		$this -> display();
    }
	
	//修改数据
	public function mod(){
        $id = I("index_id");
		
        $index = M("index");
        $indexs = $index -> find($id);
	    $this -> assign("index", $indexs);
        $this -> display(); 
    }
	
	//执行信息修改
	public function update(){
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->rootPath = './Public/Home';
			$upload->savePath  =      './index/images/'; // 设置附件上传目录    
			$upload->autoSub = false;
			// 上传文件     
			$info   =   $upload->upload(); 
			
			if(!$info) {
			// 上传错误提示错误信息        
			//$this->error($upload->getError());
			
			$pic = $_POST['oldpicname'];
			
			}else{
			// 上传成功        
			 foreach($info as $file){        
			 $pic = $file['savename'];
			}
		}
		

        $history = M("index");
		
        $_POST['index_picname'] = $pic;
        $history -> create();
            if($history -> save()){
                $this -> success("修改首页图片成功",'index');
            }else{
                
                $this -> error("修改首页图片失败");
            }
    }

}
