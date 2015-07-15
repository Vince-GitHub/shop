<?php
namespace Admin\Controller;
use Think\Controller;
class DetailController extends Controller {

    public function index(){

    	$condition['detail_orderid'] = I("orderid");
    	$detail = M("detail");
    	$details = $detail ->where($condition) -> select();
    	$this -> assign("details",$details);
    	$this -> display();
    }
}