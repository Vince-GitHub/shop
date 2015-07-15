<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {

    public function index(){

    	$order = M("orders");
    	$orders = $order -> select();
        
        $count= $order ->count();
		$Page=new \Think\Page($count,10);
		$orders = $order -> limit($Page->firstRow.','.$Page->listRows)->select();
		$show = $Page-> show();

		$this -> assign("page",$show);
    	$this -> assign("orders",$orders);
    	$this -> display();
    }

    public function modify(){
    	$id = I(id);
    	$order = M("orders");
    	$res = $order ->find($id);
    	$res['orders_status'] = '1';
    	$order->save($res);
    		
			$detail = M('detail');
			$condition['detail_orderid'] = $res['orders_id'];
			$details = $detail->where($condition)->select();

			$goods = M("goods");
			foreach($details as $one){

				$id = $one['detail_goodsid'];
				$good = $goods ->find($id);
				$good['goods_store'] -= $one['detail_num'];
				$good['goods_num'] += $one['detail_num'];
				$goods ->save($good);
			}

			$this -> success("成功发货",order/index);
    	
    	
    }




}