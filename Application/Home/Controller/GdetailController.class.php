<?php
namespace Home\Controller;
use Think\Controller;

class GdetailController extends Controller{

    public function index(){
	    $id = I("id");
		$goods=M('goods');
		$comment=M('comments');
		$user = M('users');
		$users = $user->select();
		$commentdetail=M('commentdetail');
		$where = "comments_goodsid LIKE '{$id}'";
		$comments = $comment->where($where)->select();
		$commentdetails = $commentdetail->select();
		$hotgoods = $goods->order('goods_num DESC')->limit(8)->select();
		$goodss = $goods -> find($id);
		$_POST=$goodss;
		$_POST['goods_clicknum']=$goodss['goods_clicknum']+1;
		$_POST['id']=$id;
		$goods->create();
		$goods->save();
        $gdetail = M('gdetail');
		$gdetails = $gdetail -> select();
		$this -> assign('comments',$comments);
		$this -> assign('commentdetails',$commentdetails);
        $this -> assign('hotgoods',$hotgoods);
        $this -> assign('gdetails',$gdetails);
		$this -> assign('goods',$goodss);
		$this -> assign('users',$users);
	
        $this -> display();
    }


    public function insert(){

    	$user_id = I('user_id');
		$goods_id = I('goods_id');
		$goods_num = I('goods_num');

		//判断是否已登录，若登录加入会员购物车表，若未登录，加入session：
		if($_SESSION['user']['users_id'] >0){

			$data['cart_userid'] = $_SESSION['user']['users_id'];
			$data['cart_goodsid'] = I('goods_id');
			$data['cart_num'] = I('goods_num');

			//根据商品id查询商品的其他信息：
			$good = M("goods");
			$goods = $good ->find($data['cart_goodsid']);
			//继续构造需要写入cart表的其他数据：
			$data['cart_goodspic'] = $goods['goods_picname'];
			$data['cart_goodsname'] = $goods['goods_goods'];
			$data['cart_goodsdescr'] = $goods['goods_descr'];
			$data['cart_goodsprice'] = $goods['goods_price'];
			$data['cart_total'] = $goods['goods_price']*I('g_num');

			$cart = M("cart");
			$cart ->add($data);
			
		}

			//获取要添加商品的信息：
			$good = M("goods");
			$goods = $good ->find($goods_id);

			//构造需要添加入购物车session的信息
			$carts['goods_id'] = $goods_id;
			$carts['goods_pic'] = $goods['goods_picname'];
			$carts['goods_name'] = $goods['goods_goods'];
			$carts['goods_descr'] = $goods['goods_descr'];
			$carts['goods_price'] = $goods['goods_price'];
			$carts['goods_num'] = $goods_num;

			
			//判断购物车session中是否有此件商品并执行添加:
			if(empty($_SESSION['cartlist'][$goods_id])){
	                	//若没有，作为新商品放入购物车
	                    $_SESSION['cartlist'][$goods_id]=$carts;
	                }else{
	                    //若存在，则增加购买量
	                    $_SESSION['cartlist'][$goods_id]['goods_num'] += $goods_num;
	                }

	       //unset($_SESSION['cartlist']);

			$url = U("Cart/index");
	        $this ->success("成功加入购物车",$url);
	        
	}






}	