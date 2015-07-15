<?php
namespace Admin\Widget;
use Think\Controller;

class MenuWidget extends Controller{

	public function menu(){
		if(empty($_SESSION['admin'])){
			$this -> display("Login/index");
    }else{
		$this-> display();
	}
	}
}