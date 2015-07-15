<?php
namespace Admin\Controller;
use Think\Controller;
class commentDetailController extends Controller {

    public function index(){

    	$condition['commentDetail_commentid'] = I('commentid');

    	$detail = M("commentdetail");
    	$details = $detail -> where($condition) -> find();
    	$this -> assign("details",$details);
    	$this -> display();
    }
}