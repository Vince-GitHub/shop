<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/shop/Public/Home/Index/css/vl-index.css">
		<link rel="stylesheet" type="text/css" href="/shop/Public/Home/Index/css/comm.css">
		<link rel="stylesheet" type="text/css" href="/shop/Public/Home/Index/css/vl-global.css">
		<link rel="stylesheet" type="text/css" href="/shop/Public/Home/Index/css/vl-common.css">
		<script type="text/javascript" src="/shop/Public/Home/Index/js/jquery-1.js"></script>
		<script type="text/javascript" src="/shop/Public/Home/Index/js/core2.js"></script>
		<script type="text/javascript" src="/shop/Public/Home/Index/js/vl.js"></script>
		<script type="text/javascript" src="/shop/Public/Home/Index/js/vl-common.js"></script>
		<title>唯风尚：国际品牌官方授权的高端购物平台_当季新品同步首发_成为诸多国际品牌VIP无需累积年消费
		</title>
	</head>

	<body class="middleSize">
	<div class="header">
		<div class="center">
		<div class="logo">
			<a mars_sead="99999|10|10168|1" href=""><img src="/shop/Public/Home/Index/images/logo.jpg" title="VIPLUX" alt="VIPLUX"></a>
		</div>
	
		<div><?php echo W("Menu/menu");?></div>
		

		<br/>
		<div div class="menu" style="float:right">
		<form action="<?php echo U('Search/index');?>" method="get">
			<input style="margin-top:5px" type="text" name="keywords_keyword" class="" style="width:300px" placeholder="如：女装">
			
			<input  style="height:23px;width:70px;background:#ccc;border:none" type="submit" value="搜 索">
			
			<b id="close-search-box"></b>
		</form>
		<div class="keyword-side" >
			<strong style="font-size:15px;color:gray;text-shadow:1px 1px 1px gray;">关键字：</strong>
			<?php echo W('Keyword/keyword');?>
		</div>
	
	</div>
		
		
		<ul class="customer-banner">
						
			<li class="welcome" style="height:50px;">
				
					<?php if($_SESSION['user'] == null): ?><a class="login-btn" mars_sead="99999|10|10158|1" href="/shop/index.php/login/index">
					<span class="username"></span> 登录</a>丨
					<a class="login-btn" href="/shop/index.php/zhuce/index">注册</a>

					<?php else: ?>
						<a class="login-btn" mars_sead="99999|10|10158|1" href="/shop/index.php/share/index">
						<span class="username"></span>VIP分享</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
					
						<?php echo ($_SESSION['user']['users_name']); ?>，&nbsp; &nbsp; 等级：<?php echo W('Level/level');?> &nbsp;&nbsp;&nbsp;&nbsp;  您好  丨
						<a href="/shop/index.php/myCenter/index" target="_self">个人中心</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						

						<a href="/shop/index.php/cart/index"><img src="/shop/Public/Level/cart.jpg" style="width:40px;height:25px"><i>go</i><b>物！</b></a>
						<a  href="/shop/index.php/login/out">（退出）</a><?php endif; ?>
			</li>
			
			<li><a href="javascript:;">服务</a>
				<div style="" class="ddl">
					<div class="service-info">
						<p class="info">
							遇到任何问题，<br>可拨打客户服务热线：<br>
							<b>4009-209-209</b><br>
							服务时间<br>
							周一至周日 9:00-20:00
						</p>
						<div class="links">
							<a target="_blank" href="">帮助中心</a>
							<a target="_blank" href="">联系我们</a>	
							<a target="_blank" href="">服务条款</a>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>

<script type="text/html" id="nav_shopping_tmp">
<div class="shopping">
	<div class="shopping-list">
	    <ul>
		{#products}
		<li>
		    <a href="<?php echo ($url); ?>">
			<div class="shoping-img-l">
			    <img src="<?php echo ($image_url); ?>">
			</div>
			<div class="shoping-list-r">
			    <div class="brand-name"><?php echo ($brand_name); ?><span>￥<?php echo ($final_price); ?>×<?php echo ($qty); ?></span></div>
			    <div class="shoping-logo">
                                <?php echo ($name); ?>
			    </div>
			    <div class="shoping-format">
                                {#cfg_opts}
                                <span class="b_<?php echo ($label); ?>"><?php echo ($value); ?></span>
                                {#/cfg_opts}
			    </div>
			</div>
		    </a>
		</li>
		{#/products}
	    </ul>
	</div>
	<div class="shopping-bottom">
	    <div class="sb-line">
		<span>小计：￥<?php echo ($subtotal); ?></span>
		<a href="/checkout/cart" class="show-shopping" mars_sead="99999|0|1|6">查看购物袋</a>
	    </div>
	</div>
</div>
</script>
		
		
		


	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="description" content="VIPLUX">
	<meta name="keywords" content="VIPLUX">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="/shop/Public/Home/List/css/vl-category.css">
	<link rel="stylesheet" type="text/css" href="/shop/Public/Home/List/css/comm.css">
	<link rel="stylesheet" type="text/css" href="/shop/Public/Home/List/css/vl-global.css">
	<link rel="stylesheet" type="text/css" href="/shop/Public/Home/List/css/vl-common.css">
	

<body class="middleSize">
	<script type="text/javascript" src="/shop/Public/Home/List/js/vl-category.js"></script>

	<div class="vl-category" data-id="men" data-key="men">
  	<div class="product-list tab-item">
        
    	
		<ul class="items">
        <?php if(is_array($goodss)): foreach($goodss as $key=>$goods): ?><li>
	              <div class="item">
	                <div class="img-box" >
	                  <div class="normal"><a target="_blank" href="/shop/index.php/Gdetail/index/id/<?php echo ($goods['goods_id']); ?>"><img src="/shop/Public/uploads/<?php echo ($goods['goods_picname']); ?>" alt="<?php echo ($goods['goods_goods']); ?>" title="<?php echo ($goods['goods_goods']); ?>"></a></div>
	                  <div class="hover"><a target="_blank" href="/shop/index.php/Gdetail/index/id/<?php echo ($goods['goods_id']); ?>"><img src="/shop/Public/uploads/<?php echo ($goods['goods_picname2']); ?>" alt="<?php echo ($goods['goods_goods']); ?>" title="<?php echo ($goods['goods_goods']); ?>"></a></div>
	                  	                  <div class="try"><?php if($goods['goods_state'] == 1): ?>新品上市
																<?php elseif($goods['goods_state'] == 2): ?>在售<?php elseif($goods['goods_state'] == 3): ?>热销<?php elseif($goods['goods_state'] == 4): ?>掌柜推荐<else condition="$goods['goods_state'] eq 5"/>已下架<?php endif; ?></div>
	                  	                  
	                  	                  
	                </div>
	                <p class="brand-name">Just cavalli</p>
	                <p class="name"><a title="<?php echo ($goods['goods_goods']); ?>" target="_blank" href="/shop/index.php/Gdetail/index/id/<?php echo ($goods['goods_id']); ?>"><?php echo ($goods['goods_goods']); ?></a></p>
	                                  <div class="info no-login"><del>￥<?php echo ($goods['goods_price']+200); ?></del><span class="tip">￥<?php echo ($goods['goods_price']); ?></span></div>
                  	</div>
	            </li><?php endforeach; endif; ?>
	</ul>
    <div>
	    <ul>
		
			<li><a href=""><?php echo ($page); ?></a></li>
			
		</ul>
	</div>
  </div>
</div>
</body>
</html>


		
		
		
	
<div class="footer">
	<div class="center">
		<ul class="aftermarket">
			<li>
				<div class="item"><span class="icon1"><img src="/shop/Public/Home/Index/images/b1.jpg" ></span></div>
				<h4>7天无理由退货</h4>
			</li>
			<li>
				<div class="item"><span class="icon2"><img src="/shop/Public/Home/Index/images/b2.jpg" ></span></div>
				<h4>品牌官方授权</h4>
			</li>
			<li>
				<div class="item"><span class="icon3"><img src="/shop/Public/Home/Index/images/b3.jpg" ></span></div>
				<h4>全国范围配送</h4>
			</li>
			<li>
				<div class="item"><span class="icon4"><img src="/shop/Public/Home/Index/images/b4.jpg" ></span></div>
				<h4>到店体验</h4>
			</li>
		</ul>
		<div class="mobile-end">
			<a href="" target="_blank"><img src="/shop/Public/Home/Index/images/qrcode-s.png" title="扫描下载手机客户端"></a>
			<h4>移动客户端</h4>
			<p>现已支持移动客户端，让您享受一站式VIP购物体验</p>
		</div>
		<ul class="help-links">
			<li><a target="_blank" href="">常见问题</a></li>
		    <li><a target="_blank" href="">会员登录</a></li>
		    <li><a target="_blank" href="">支付与配送</a></li>
		    <li><a target="_blank" href="">售后政策</a></li>
		    <li><a target="_blank" href="">服务条款</a></li>
		    <li><a target="_blank" href="">隐私声明</a></li>
		    <li><a target="_blank" href="">联系我们</a></li>
		</ul>
		<ul class="help-links">

			<li><a target="_blank" href=""><?php echo W("Flink/flink");?></a></li>
		
		</ul>
		<p class="copyright">Copyright © 2008-2014 viplux.com，All Rights Reserved<br><a href="" 
			target="_blank">粤ICP备08114786号-13</a> 许可证：粤B2-20080329 版权所有广州唯品会信息科技有限公司
		</p>
    	<div class="policy">
    		<a class="p" href="" target="_blank"></a>
    	</div>
	</div>
</div>	
<script src="/shop/Public/Home/Index/js/mars_viplux.js"></script>
<script type="text/javascript">
    ready = window.ready || {};
	    ready.tsinaShare = function(pic, desc, url) {
		var info = {
		    pic: pic,
		    desc: desc,
		    url: url
		};
		fn_share('tsina', info)
	    }
</script>
<script type="text/javascript" src="/shop/Public/Home/Index/js/vl-index.js"></script>
<div class="login-frame cmDialogReady"></div>
	</body>
</html>