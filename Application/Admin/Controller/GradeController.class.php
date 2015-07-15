<?php
namespace Admin\Controller;
use Think\Controller;
class GradeController extends Controller {

    public function index(){
        $grade = M('grade');
	    $user = M('users');
        $count = $grade -> count();
        $Page = new \Think\Page($count,10);
        $grades = $grade ->limit($Page->firstRow.','.$Page->listRows)->select();
		$users = $user -> select();
        $show = $Page -> show();
        $this -> assign("page",$show);
        $this -> assign('grades',$grades);
		$this -> assign('users',$users);
		
        $this -> display();
    }
	public function mod(){
        $id = I("id");
		
        $grade = M("grade");
        $grades = $grade -> find($id);
        $this -> assign("grades", $grades);
	
        $this -> display();
        
    }
	
	public function update(){
        //创建信息操作对象
		$grade = M('grade');
        $grade -> create();
            if($grade -> save()){
                $this -> success("修改用户积分成功",'index');

            }else{
                
                $this -> error("修改用户积分失败");
            }
        }
	
	
}