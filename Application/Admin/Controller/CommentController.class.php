<?php
namespace Admin\Controller;
use Think\Controller;
class commentController extends Controller {

    public function index(){

    	$comment = M("comments");
    	$comments = $comment ->select();

    	$count = $comment -> count();		
		$Page=new \Think\Page($count,5);
		$comments = $comment ->limit($Page->firstRow.','.$Page -> listRows)->select();
		$show = $Page-> show();
		
		$this -> assign("page",$show);
    	$this -> assign("comments",$comments);
    	$this -> display();
    }

}