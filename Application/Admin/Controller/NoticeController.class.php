<?php
namespace Admin\Controller;
use Think\Controller;

class NoticeController extends Controller{
	//查看数据
	public function index(){
        $notice = M("notice");
		$notices = $notice -> order("notice_id")->select();
		$this -> assign('notices', $notices);
		$this -> display();
    }
	
	//添加数据
    public function add(){
        $this -> display();
    }
	
	public function insert(){
	$notice = M("notice");
    $_POST[notice_time] = time();
	
    if($notice -> create()){			  
		   $res = $notice -> add();
		   if($res){
			   $this -> success("添加系统公告成功", "index");
		   }
		 }else{			 
			 $this -> error("添加系统公告失败");
		 }
	}

    //删除数据
    public function del(){
        $id = I("notice_id");

        $notice = M('notice');
        $res = $notice ->delete($id);
        if($res){
            $this -> success("删除公告成功！");
        }else{
            $this -> error("删除公告失败");
        }  
    }
	
		//修改用户
    public function mod(){
        $id = I("notice_id");
        
		$notice = M("notice");
        $data = $notice -> find($id);
        $this -> assign("notice", $data);
        
		$this -> display();
        
    }
	
	    public function update(){
        $notice = M("notice");
        
        if($notice -> create()){
            if($notice -> save()){
                $this -> success("修改成功",'index');
            }else{                
                $this -> error("修改失败");
            } 
        }else{
            $this -> error("修改失败");
        }
    }

	
}
