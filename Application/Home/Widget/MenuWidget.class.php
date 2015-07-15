<?php
namespace Home\Widget;
use Think\Controller;

class MenuWidget extends Controller{

	public function menu(){
		$menu = M("type");
		$menus = $menu -> select();
		$this ->assign("types",$menus);
		$this -> display("Public:menu");
	}

}