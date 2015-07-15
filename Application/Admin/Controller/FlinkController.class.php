<?php
namespace Admin\Controller;
use Think\Controller;
class FlinkController extends Controller {

   public function index(){
    	$link = M("flink");
		/*	dump($link);*/
    	$links = $link -> select();
    	/*dump($links);*/
    	$this -> assign("links",$links);
    	$this -> display();
    }

    public function add(){
        
        $this -> display();
    }
    
    public function insert(){
        
             $link = M("flink");
        	
             if($link -> create()){
                 
               $res = $link -> add();
               if($res){
                   $this -> success("添加成功", "index");
               }
             }else{
                 
                 $this -> error("添加失败");
             }    
    }


    public function del(){
        $id = I("id");
       /* if(is_array($ids)){
            $id = implode(",",$ids);
        }else{   
            $id = $ids;
        }*/
        $link = M('flink');
        $res = $link ->delete($id);
        if($res){
            $this -> success("删除成功！");
        }else{
            $this -> error("删除失败");
        }
        
    }


    public function mod(){
        $id = I("id");
        $link = M("flink");
        $links = $link -> find($id);
        $this -> assign("links", $links);
        $this -> display();
        
    }
    
    public function update(){
        $link = M("flink");
		/*   dump($link -> create());*/
        if($link -> create()){
            if($link -> save()){
                $this -> success("修改成功",'index');
            }else{
                
                $this -> error("修改失败");
            }
        }
    }


}
