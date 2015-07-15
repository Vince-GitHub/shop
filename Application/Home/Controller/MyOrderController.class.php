<?php
namespace Home\Controller;
use Think\Controller;
class MyOrderController extends Controller {

	public function index(){

    	$order = M("orders");
        $uid = $_SESSION['user']['users_id'];
        $condition['orders_usersid'] = $uid;

    	$orders = $order -> where($condition) -> select();
    	/*dump($orders);*/
    	$this -> assign("orders",$orders);
    	$this -> display();
    }

    public function modify(){
    	$id = I(id);
    	$order = M("orders");
    	$res = $order ->find($id);
		$order_score = ceil($res['orders_total']/10);
		
    	$res['orders_status'] = '2';
    	if($order->save($res)){
		    $grade = M('grade');
			$userid = $_SESSION['user']['users_id'];
			$where['grade_userid']=$userid;
			$grades = $grade->where($where)->select();
			$score= ($grades[0]['grade_score']+$order_score);			
			$grade->where($where)->data(array('grade_score'=>$score))->save();
			
    		$this -> success("成功收货,用户积分加".$order_score,myOrder/index);
    	}
    }
}
		/*$id = I(id);
    	$order = M("orders");
    	$res = $order ->find($id);
    	$res['orders_status'] = '2';
		$order_score = $res['order_total'];
		$grade = M('grade');
		$userid = $_SESSION['user']['users_id'];
		$where['grade_userid']=$userid;
		$grades = $grade->where($where)->select();
		$score= ($grades[0]['grade_score']+$order_score);			
		$grade->where($where)->data(array('grade_score'=>$score))->save();
    	if($order->save($res)){
		    
			
    		$this -> success("成功收货,用户积分加".$order_score,myOrder/index);
    	}
    }
}*/