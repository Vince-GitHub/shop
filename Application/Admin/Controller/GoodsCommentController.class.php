<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsCommentController extends Controller {

    public function index(){

    	$goodsid = I("goodsid");
    	$comment = M("comments");
    	$condition['comments_goodsid'] = $goodsid;
    	$comments = $comment -> where($condition) -> select();
    	$this -> assign("comments",$comments);
    	$this -> display();
    }

}