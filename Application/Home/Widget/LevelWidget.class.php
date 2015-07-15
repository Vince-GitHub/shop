<?php
namespace Home\Widget;
use Think\Controller;

class LevelWidget extends Controller{

	public function level(){
	    
		$grade = M("grade");
		$userid = $_SESSION['user']['users_id'];
		$where = "grade_userid LIKE '{$userid}'";
		
		$grades = $grade ->where($where) -> select();
		
		$this ->assign("grade",$grades);
		$this -> display("Public:Level");
	}

}