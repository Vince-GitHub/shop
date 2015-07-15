<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {
    public function index(){

    	$userid = $_SESSION['user']['users_id'];
    	$cart = M('cart');
    	$condition['cart_userid'] = $userid;
    	$carts = $cart ->where($condition)-> select();
    	$this ->assign('carts',$carts);

    	$this -> display();
	}

	public function insert(){
		//构建要写入cart表的数据数组：
		$data['cart_userid'] = $_SESSION['user']['users_id'];
		$data['cart_goodsid'] = I('g_id');
		$data['cart_num'] = I('g_num');

		if($data['cart_userid'] >0){
			/*//根据商品id查询商品的其他信息：
			$good = M("goods");
			$goods = $good ->find($data['cart_goodsid']);
			//继续构造需要写入cart表的其他数据：
			$data['cart_goodspic'] = $goods['goods_picname'];
			$data['cart_goodsname'] = $goods['goods_goods'];
			$data['cart_goodsdescr'] = $goods['goods_descr'];
			$data['cart_goodsprice'] = $goods['goods_price'];
			$data['cart_total'] = $goods['goods_price']*I('g_num');

			$cart = M("cart");
			if($cart ->add($data)){*/
				
				$url = U("Order/index");
				$this->success("请确认收货信息！",$url);
			/*}else{
				$this->error("添加失败");
			}
*/
		}else{
			$url = U("Login/index");
			$this -> error("您还未登陆，请登陆后再操作购物车",$url);
		}
	}

	public function edit(){
		$id = $_POST['g_id'];
		$num = $_POST['g_num'];
		$_SESSION['cartlist'][$id]['goods_num'] = $num;
	}
	public function del(){
	    $id = I("id");
        unset($_SESSION['cartlist'][$id]);
		$this->success('删除成功',U('Cart/index'));
}
}
