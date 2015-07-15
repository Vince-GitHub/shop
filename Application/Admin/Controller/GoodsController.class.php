<?php
namespace Admin\Controller;
use Think\Controller;

class GoodsController extends Controller{

     public function index(){
        $goods = M('goods');
		$type=M('type');
		$types = $type->select();

        $count = $goods -> count();
        $Page = new \Think\Page($count,5);
        $goodss = $goods ->limit($Page->firstRow.','.$Page->listRows)->select();
        $show = $Page -> show();
        $this -> assign("page",$show);
        $this -> assign('goodss',$goodss);
		$this -> assign('types',$types);
        $this -> display();
    }
	//加载添加信息表单(像这样的代码，此方法可以省略）
	public function add(){
		$type = M("type");
		$types = $type -> query("select * from shop_type order by concat(type_path,type_id)");
		$this -> assign("types",$types);
	    $this->display("add");
		
	}
	
	
	//执行信息添加
	public function insert(){
         $upload = new \Think\Upload();// 实例化上传类    
	     $upload->maxSize   =     3145728 ;// 设置附件上传大小    
	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
    $upload->rootPath = './Public';
	$upload->savePath  =      './Uploads/'; 
	$upload->autoSub = false;
	//设置附件上传目录    
	// 上传文件     
	$info   =   $upload->upload(); 
    
	if(!$info) {
	// 上传错误提示错误信息        
	$this->error($upload->getError());    
	}else{
	// 上传成功        
	$pic[0] = $info['goods_picname']['savename'];
	$pic[1] = $info['goods_picname2']['savename'];
	}
	
	    //创建信息操作对象
		$goods = new \Think\Model("Goods");
		//初始化添加数据(将POST中的添加信息加载到本对象中）
		$_POST['goods_addtime'] = time();
		$_POST['goods_picname'] = $pic[0];
		$_POST['goods_picname2'] = $pic[1];
		$goods->create();
		//执行添加
		if($goods->add()){
		    $this->success("添加成功!",U("Goods/index"));
		}else{
		    $this->error("添加失败");
		}
	}
	
	
	//加载信息编辑表单
	   public function mod(){
        $id = I("id");
		$type = M("type");
		$types = $type -> query("select * from shop_type order by concat(type_path,type_id)");
		$this -> assign("types",$types);
        $goods = M("goods");
        $data = $goods -> find($id);
        $this -> assign("goods", $data);
        $this -> display();
        
    }
    
	//执行信息修改
	public function update(){
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
			//$this->error($upload->getError());
			
			$pic[0] = $_POST['oldpicname1'];
			$pic[1] = $_POST['oldpicname2'];
			}else{
			// 上传成功 
                if($info['goods_picname']['savename'] && $info['goods_picname2']['savename']==null){	
			    $pic[0] = $info['goods_picname']['savename'];
	            $pic[1] = $_POST['oldpicname2'];
		        unlink('./Public/Uploads/'.$_POST['oldpicname1']);
				}elseif($info['goods_picname']['savename']==null && $info['goods_picname2']['savename']){
			    $pic[0] = $_POST['oldpicname'];
				$pic[1] = $info['goods_picname2']['savename'];
	         
		        unlink('./Public/Uploads/'.$_POST['oldpicname2']);
				}else{
				$pic[0] = $info['goods_picname']['savename'];
	            $pic[1] = $info['goods_picname2']['savename'];
		        unlink('./Public/Uploads/'.$_POST['oldpicname1']);
				unlink('./Public/Uploads/'.$_POST['oldpicname2']);
				}	

		}
		
		
		
		
		
		
        $goods = M("goods");
		$_POST['goods_addtime'] = time();
        $_POST['goods_picname'] = $pic[0];
		$_POST['goods_picname2'] = $pic[1];
        $goods -> create();
            if($goods -> save()){
                $this -> success("修改商品成功",'index');

            }else{
                
                $this -> error("修改商品失败");
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
        $goods = M('goods');
		$goodss = $goods->select($id);
		$gdetail = M('gdetail');
		$where = "gdetail_goodsid LIKE '{$id}'";
		$gdetails = $gdetail->where($where)->select();
		$did = $gdetails[0]['gdetail_id'];
		$pic1 = $goodss[0]['goods_picname'];
		$pic2 = $goodss[0]['goods_picname2'];
		$gpic1 = $gdetails[0]['gdetail_picname1'];
		$gpic2 = $gdetails[0]['gdetail_picname2'];
		$gpic3 = $gdetails[0]['gdetail_picname3'];
		$gpic4 = $gdetails[0]['gdetail_picname4'];
        $res = $goods ->delete($id);
		
        if($res){
            $this -> success("删除商品成功！");
			unlink('./Public/Uploads/'.$pic1);
			unlink('./Public/Uploads/'.$pic2);
			$result = $gdetail ->delete($did);
			
			unlink('./Public/Uploads/'.$gpic1);
			unlink('./Public/Uploads/'.$gpic2);
			unlink('./Public/Uploads/'.$gpic3);
			unlink('./Public/Uploads/'.$gpic4);
        }else{
            $this -> error("删除商品失败");
        }
        
    }
	public function search(){
	    $getKeyword = I('get.keyword');
	    $goods = M('goods');
        $where = "goods_goods LIKE '%{$getKeyword}%'";
        $goodss['counts'] = $goods->where($where)->count();
        $goodss['goods'] = $goods
                                        
                                        ->where($where)
                                        ->order('goods_clicknum DESC')
                                        ->select();
	    $this->assign('goodss', $goodss['goods']);
		$this->display('index');
	
	
	}
	
/*public function upload(){
    $upload = new \Think\Upload();// 实例化上传类    
	$upload->maxSize   =     3145728 ;// 设置附件上传大小    
	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
    $upload->rootPath = './Public';
	$upload->savePath  =      './Uploads/'; // 设置附件上传目录    
	// 上传文件     
	$info   =   $upload->upload(); 
    
	if(!$info) {
	// 上传错误提示错误信息        
	$this->error($upload->getError());    
	}else{
	// 上传成功        
	 foreach($info as $file){        
	 $pic = $file['savepath'].$file['savename'];
	 echo $pic;
	}

}
	
}*/ 
}