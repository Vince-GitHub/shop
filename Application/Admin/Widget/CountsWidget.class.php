<?php
namespace Admin\Widget;
use Think\Controller;

class CountsWidget extends Controller{
        public function counts(){
		    $order = M('orders');
			$where['orders_status'] = 0;
			$order_count=$order->where($where)->count();
			$this->assign('order_count',$order_count);
			$this->display('public:Count');
	}
}
