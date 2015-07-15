<?php
namespace Admin\Controller;
use Think\Controller;

class TypeController extends Controller{
	//查看数据
    public function index(){
	    $type = M("type");
        $types = $type -> query("select * from shop_type order by concat(type_path,type_id)");
        $this -> assign('type', $types);
        $this -> display();
    }
	
	//添加数据
    public function add(){
		$id=I(type_id);
        $type=M("type");
		$types = $type->find($id);
		$this->assign('type',$types);		
		//判断是否传值
		if(!empty($_GET['type_id'])){
			$pid = $_GET['type_id'];
			
			$name = $_GET['type_name'];
		}
		$this -> display();
		
	}
	
	public function insert(){
		$type = M("type");
		if($type -> create()){
                  
               $res = $type -> add();
               if($res){
                   $this -> success("添加类别成功", "index");
               }
             }else{
                 
                 $this -> error("添加类别失败");
             }

	}
	
    //删除数据
    public function del(){
	
        $type_id = I("type_id");
		
		$type=M("type");
	
		$types = $type -> query("select * from shop_type where type_pid={$type_id}");
	
		if($types==false){

		$this->assign('type',$types);
       
		$res = $type ->delete($type_id);
        if($res){
            $this -> success("删除类别成功！");
        }else{
            $this -> error("删除类别失败");
        }
        }else{
			$this-> error("删除失败！因为有子类别");
		}
		
	}
	
	    //修改用户
    public function mod(){
        $id = I("type_id");
        $user = M("type");
        $data = $user -> find($id);
        $this -> assign("type", $data);
        $this -> display();
        
    }
	
	    public function update(){
        $type = M("type");
        
        if($type -> create()){
            if($type -> save()){
                $this -> success("修改类别成功",'index');
            }else{
                
                $this -> error("修改类别失败");
            } 
        }else{
            $this -> error("修改类别失败");
        }
    }
	
}