<?php
namespace Home\Controller;
use Think\Controller;
class CommentsController extends Controller {

	public function index(){

		$comment = M("comments");
		$userid = $_SESSION['user']['users_id'];

		$condition['comments_userid'] = $userid;
		$comments = $comment -> where($condition) -> select();
		$this -> assign("comments",$comments);
		$this -> display();
	}


	public function insert(){

		//构造评论表要添加的数据数组：
		$comment = M("comments");

		$data['comments_userid'] = $_SESSION['user']['users_id'];
		$data['comments_goodsid'] = $_POST['goodsid'];
		$data['comments_goodspic'] = $_POST['goodspic'];
		$data['comments_title'] = $_POST['title'];
		$data['comments_time'] = time();

		if($n = $comment ->add($data)){
				//dump($n);exit;
			//将评论内容加入评论详情表：
			$commentdetail = M("commentdetail");

			$dat['commentDetail_commentid'] = $n;
			$dat['commentDetail_title'] = $_POST['title'];
			$dat['commentDetail_content'] = $_POST['content'];
			
			$commentdetail ->add($dat);
			$grade = M('grade');
			$userid = $_SESSION['user']['users_id'];
			$where['grade_userid']=$userid;
			$grades = $grade->where($where)->select();
			$score= ($grades[0]['grade_score']+10);			
			$grade->where($where)->data(array('grade_score'=>$score))->save();

			$this ->success("发表成功,积分+10","index");
		}

	}


}