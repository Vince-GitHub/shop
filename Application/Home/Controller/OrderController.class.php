<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index(){

    	$users_id = $_SESSION['user']['users_id'];
    	$user = M(users);
    	$users = $user ->find($users_id);
    	$this -> assign(users,$users);

    	$this -> display();
	}


	public function insert(){
		//dump($_POST);

		//构造订单添加数据的数组：

		$data['orders_usersid'] = $_SESSION['user']['users_id'];

		if(!empty($_POST['new_link']) && !empty($_POST['new_add'])  && !empty($_POST['new_phone'])){
			$data['orders_linkman'] = $_POST['new_link'];
			$data['orders_address'] = $_POST['new_add'];
			$data['orders_code'] = $_POST['new_code'];
			$data['orders_phone'] = $_POST['new_phone'];
			

		}else{
			$data['orders_linkman'] = $_POST['name'];
			$data['orders_address'] = $_POST['address'];
			$data['orders_code'] = $_POST['code'];
			$data['orders_phone'] = $_POST['phone'];
		}

		$data['orders_addtime'] = time();
		$data['orders_num'] = "vip_lux".time()."_".rand(1000,9999);
		$data['orders_total'] = $_POST['sum'];
		$data['orders_status'] = 0;
		$data['orders_express'] = $_POST['express'];
		$data['orders_invoice'] = $_POST['invoice'];

		//添加订单：
		$order = M("orders");

		if($m = $order ->add($data)){

			//添加订单成功，执行详情添加，构造添加详情表数据的数组：
		
			//遍历session，获取商品详情信息：
			$map['detail_orderid'] = $m;
			foreach($_SESSION['cartlist'] as $cart){

				$map['detail_goodsid'] = $cart['goods_id'];
				$map['detail_name'] = $cart['goods_name'];
				$map['detail_pic'] = $cart['goods_pic'];
				$map['detail_price'] = $cart['goods_price'];
				$map['detail_num'] = $cart['goods_num'];
				$map['detail_total'] = $cart['goods_price']*$cart['goods_num'];
				//添加详情表：
				$detail = M("detail");
				$detail ->add($map);
			}
			//清空购物车session：
			session('cartlist',null);

			$url = U("myOrder/index");
			$this->success("添加成功",$url);
		}else{
			$this->error("添加失败");
		}

	}
	
	}


