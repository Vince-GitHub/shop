<?php
namespace Admin\Controller;
use Think\Controller;

class HistoryController extends Controller{
	//查看数据
	public function index(){
        $history = M("history");
		$historys = $history ->order("history_id")-> select();
		$this -> assign('historys', $historys);
		$this -> display();
    }
	
	//修改数据
	 public function mod(){
        $id = I("history_id");
		
        $history = M("history");
        $historys = $history -> find($id);
	    $this -> assign("history", $historys);
        $this -> display(); 
    }
    
	//执行信息修改
	public function update(){
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->rootPath = './Public/Home';
			$upload->savePath  =      './History/images/'; // 设置附件上传目录    
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
		

        $history = M("history");
		
        $_POST['history_picname'] = $pic;
        $history -> create();
            if($history -> save()){
                $this -> success("修改成功",'index');
            }else{
                
                $this -> error("修改失败");
            }
    }
}
