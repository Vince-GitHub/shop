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
		
		
		
	
	<div class="vl-index">
		
		<!--首页大轮播图star-->
		<div class="kv-ctx" style = "margin-top:30px">
			<div class="carousel-wrap">
					<div class="carousel-content" style="position: relative; height: 587px;">
						<ul style="width: 5040px; left: -1260px; height: 587px;" class="kv">
							
						<?php if(is_array($indexs)): foreach($indexs as $key=>$index): if($index['index_id'] < 5): ?><li style="width: 1260px;">
								<a target="_blank" href="/shop/index.php/list/index">
									<img src="/shop/Public/Home/Index/images/<?php echo ($index['index_picname']); ?>">
								</a>
							</li><?php endif; endforeach; endif; ?>
						</ul>
					</div>

				<div class="carousel-control">
					<span class="prev"><span class="prev-s"></span></span>
					<span class="next"><span class="next-s"></span></span>
					<ol class="steps">
						<li class="step" data-step="0">0</li>
						<li class="step current" data-step="1">1</li>
					</ol>
				</div>
			</div>
		</div>
		<!--首页大轮播图stop-->	
	
		
		<!--首页左右品牌滚动品牌栏star-->	
		<div class="brand-list-ctx">
		<div class="carousel-wrap" style="width:1260px;height:113px;">
			<div class="carousel-content" style="position:relative;width:1260px;height:113px;">
				<ul style="position: absolute; top: 0px; left: -3780px; width: 6300px; height:100%; overflow: visible;" class="brand-list">
					
					<?php if(is_array($indexs)): foreach($indexs as $key=>$index): if($index['index_id'] > 5): ?><li style="width: 251px; line-height: 113px;">
								<a style="line-height: 113px;" target="_blank" href="/shop/index.php/history/index" title="时尚品牌">
									<span class="mask"></span>
									<img src="/shop/Public/Home/Index/images/<?php echo ($index['index_picname']); ?>" alt="TOMBOLINI">
								</a>
							</li><?php endif; endforeach; endif; ?>
					
				</ul>
			</div>
			
			
			
			<div class="carousel-control">
				<span class="prev"><span class="prev-s"></span></span>
				<span class="steps"><span data-step="0" class="step">1</span>
					<span data-step="1" class="step">2</span>
					<span data-step="2" class="step">3</span>
					<span data-step="3" class="step current">4</span>
					<span data-step="4" class="step">5</span>
				</span>
				<span class="next">
					<span class="next-s"></span>
				</span>
			</div>
		</div>
	</div>
		<!--首页左右品牌滚动品牌栏stop-->	
	
		
		<!--首页方块栏目star-->
		<div class="block-banners">
		<div class="col2">
			<a data-href="" data-type="" href="/shop/index.php/history/index">
				<span class="mask"></span>
				<img src="/shop/Public/Home/Index/images/abc1.jpg" alt="机场时髦装  左上"></a>
		</div>
		<div class="col1">
			<a data-href="" href="/shop/index.php/history/index">
				<span class="mask"></span>
				<img src="/shop/Public/Home/Index/images/abc2.jpg" alt="MB（BTD81020U10010）"></a>
		</div>
		<div class="col1">
			<a data-href="" href="/shop/index.php/history/index">
				<span class="mask"></span>
				<img src="/shop/Public/Home/Index/images/abc3.jpg" alt="PF活动 左下"></a>
		</div>
		<div class="col2">
			<a data-href="" data-type="" href="/shop/index.php/history/index">
				<span class="mask"></span>
				<img src="/shop/Public/Home/Index/images/abc4.jpg" alt="拒绝朦胧美 你的世界应该更清晰  右下"></a>
		</div>
	</div>
		<!--首页方块栏目stop-->
		
		
		<!--首页页尾问题栏star-->
		<div class="service-phone">
			<marquee direction="left" scrollamount="6">
				遇到任何问题，请拨打 VIPLUX 客服专线：<b>4009-209-209</b>
			
				&nbsp;&nbsp;
				<?php if(is_array($notices)): foreach($notices as $key=>$notice): echo ($notice[notice_title]); ?>&nbsp;:&nbsp;&nbsp;<?php echo ($notice[notice_descr]); ?>；<?php echo (date("Y-m-d",$notice[notice_time])); endforeach; endif; ?>
			</marquee>
		</div>
		<!--首页页尾问题栏stop-->
	</div>

		
		
		
	
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