<?php

namespace Home\Controller;
use Think\Controller;

class HistoryController extends Controller{
    public function index(){
        $history = M("history");
		$historys = $history ->order("history_id")-> select();
		$this -> assign('historys', $historys);
		$this -> display();
	}

}
