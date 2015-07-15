<?php
namespace Home\Widget;
use Think\Controller;

class FlinkWidget extends Controller{

	public function flink(){
		$flink = M("flink");
		$flinks = $flink -> select();
		$this ->assign("flinks",$flinks);
		$this -> display("Public:flink");
	}

}