<?php
namespace Admin\Controller;
use Think\Controller;

class GdetailController extends Controller{

     public function index(){
        $gdetail = M('gdetail');
	
        $count = $gdetail -> count();
        $Page = new \Think\Page($count,10);
        $gdetails = $gdetail ->limit($Page->firstRow.','.$Page->listRows)->select();
        $show = $Page -> show();
        $this -> assign("page",$show);
        $this -> assign('gdetails',$gdetails);
		
        $this -> display();
    }
	//加载添加信息表单(像这样的代码，此方法可以省略）
	public function add(){
		$id = I("id");
		$goods = M("goods");
		$data = $goods -> find($id);
		$this -> assign("goods", $data);
	    $this->display("");
		
	}
	
	
	//执行信息添加
	public function insert(){
         $upload = new \Think\Upload();// 实例化上传类    
	     $upload->maxSize   =     3145728 ;// 设置附件上传大小    
	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
    $upload->rootPath = './Public';
	$upload->savePath  =      './Uploads/'; 
	$upload->autoSub = false;
	// 设置附件上传目录    
	// 上传文件     
	$info   =   $upload->upload(); 
    
	if(!$info) {
	// 上传错误提示错误信息        
	$this->error($upload->getError());    
	}else{
	// 上传成功        
	       
	$pic[0] = $info['gdetail_picname1']['savename'];
	$pic[1] = $info['gdetail_picname2']['savename'];
	$pic[2] = $info['gdetail_picname3']['savename'];
	$pic[3] = $info['gdetail_picname4']['savename'];
	

}
	
	    //创建信息操作对象
		$gdetail = new \Think\Model("Gdetail");
		//初始化添加数据(将POST中的添加信息加载到本对象中）
		$_POST['gdetail_picname1'] = $pic[0];
		$_POST['gdetail_picname2'] = $pic[1];
		$_POST['gdetail_picname3'] = $pic[2];
		$_POST['gdetail_picname4'] = $pic[3];
		$gdetail->create();
		//执行添加
		if($gdetail->add()){
		    $this->success("添加成功!",U("Gdetail/index"));
		}else{
		    $this->error("添加失败");
		}
	}
	
	
	//加载信息编辑表单
	   public function mod(){
        $id = I("id");
		
	
		
        $gdetail = M("gdetail");
        $data = $gdetail -> find($id);
        $this -> assign("gdetails", $data);
        $this -> display();
        
    }
    
	//执行信息修改
	public function update(){
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->rootPath = './Public';
			$upload->savePath  =      './Uploads/'; // 设置附件上传目录    
			$upload->autoSub = false;
			// 上传文件     
			$info   =   $upload->upload(); 
			
			if(!$info) {
			// 上传错误提示错误信息        
			//$this->error($upload->getError());
			
			$pic[0] = $_POST['oldpicname1'];
			$pic[1] = $_POST['oldpicname2'];
			$pic[2] = $_POST['oldpicname3'];
			$pic[3] = $_POST['oldpicname4'];
			}else{
			//上传成功
			    if($info['gdetail_picname1']['savename']){
				    $pic[0] = $info['gdetail_picname1']['savename'];
					unlink('./Public/Uploads/'.$_POST['oldpicname1']);
				}else{
				    $pic[0] = $_POST['oldpicname1'];
				}
				if($info['gdetail_picname2']['savename']){
				    $pic[1] = $info['gdetail_picname2']['savename'];
					unlink('./Public/Uploads/'.$_POST['oldpicname2']);
				}else{
				    $pic[1] = $_POST['oldpicname2'];
				}
				if($info['gdetail_picname3']['savename']){
				    $pic[2] = $info['gdetail_picname3']['savename'];
					unlink('./Public/Uploads/'.$_POST['oldpicname3']);
				}else{
				    $pic[2] = $_POST['oldpicname3'];
				}
				if($info['gdetail_picname4']['savename']){
				    $pic[3] = $info['gdetail_picname4']['savename'];
					unlink('./Public/Uploads/'.$_POST['oldpicname4']);
				}else{
				    $pic[3] = $_POST['oldpicname4'];
				}
			}
	
	    //创建信息操作对象
		$gdetail =M('gdetail');
		//初始化添加数据(将POST中的添加信息加载到本对象中）
		$_POST['gdetail_picname1'] = $pic[0];
		$_POST['gdetail_picname2'] = $pic[1];
		$_POST['gdetail_picname3'] = $pic[2];
		$_POST['gdetail_picname4'] = $pic[3];
        $gdetail -> create();
            if($gdetail -> save()){
                $this -> success("修改商品详情成功",'index');

            }else{
                
                $this -> error("修改商品详情失败");
            }
            
        
        
    }

	//执行信息删除
	
public function del(){
        $ids = I("ids");
        if(is_array($ids)){
            $id = implode(",",$ids);
        }else{   
            $id = $ids;
        }
        $gdetail = M('gdetail');
		$gdetails = $gdetail->select($id);
		$pic1 = $gdetails[0]['gdetail_picname1'];
		$pic2 = $gdetails[0]['gdetail_picname2'];
		$pic3 = $gdetails[0]['gdetail_picname3'];
		$pic4 = $gdetails[0]['gdetail_picname4'];
        $res = $gdetail ->delete($id);
        if($res){
            $this -> success("删除商品详情成功！");
			unlink('./Public/Uploads/'.$pic1);
			unlink('./Public/Uploads/'.$pic2);
			unlink('./Public/Uploads/'.$pic3);
			unlink('./Public/Uploads/'.$pic4);
			
        }else{
            $this -> error("删除商品详情失败");
        }
        
    }
	
}