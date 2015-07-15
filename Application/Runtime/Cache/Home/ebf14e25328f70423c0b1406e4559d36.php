<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/hszz/TP/Public/Home/Index/css/vl-index.css">
		<link rel="stylesheet" type="text/css" href="/hszz/TP/Public/Home/Index/css/comm.css">
		<link rel="stylesheet" type="text/css" href="/hszz/TP/Public/Home/Index/css/vl-global.css">
		<link rel="stylesheet" type="text/css" href="/hszz/TP/Public/Home/Index/css/vl-common.css">
		<script type="text/javascript" src="/hszz/TP/Public/Home/Index/js/jquery-1.js"></script>
		<script type="text/javascript" src="/hszz/TP/Public/Home/Index/js/core2.js"></script>
		<script type="text/javascript" src="/hszz/TP/Public/Home/Index/js/vl.js"></script>
		<script type="text/javascript" src="/hszz/TP/Public/Home/Index/js/vl-common.js"></script>
		<title>唯风尚：国际品牌官方授权的高端购物平台_当季新品同步首发_成为诸多国际品牌VIP无需累积年消费
		</title>
	</head>

	<body class="middleSize">
	<div class="header">
		<div class="center">
		<div class="logo">
			<a mars_sead="99999|10|10168|1" href=""><img src="/hszz/TP/Public/Home/Index/images/logo.jpg" title="VIPLUX" alt="VIPLUX"></a>
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
				
					<?php if($_SESSION['user'] == null): ?><a class="login-btn" mars_sead="99999|10|10158|1" href="/hszz/TP/index.php/login/index">
					<span class="username"></span> 登录</a>丨
					<a class="login-btn" href="/hszz/TP/index.php/zhuce/index">注册</a>

					<?php else: ?>
						<a class="login-btn" mars_sead="99999|10|10158|1" href="/hszz/TP/index.php/share/index">
						<span class="username"></span>VIP分享</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
					
						<?php echo ($_SESSION['user']['users_name']); ?>，&nbsp; &nbsp; 等级：<?php echo W('Level/level');?> &nbsp;&nbsp;&nbsp;&nbsp;  您好  丨
						<a href="/hszz/TP/index.php/myCenter/index" target="_self">个人中心</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						

						<a href="/hszz/TP/index.php/cart/index"><img src="/hszz/TP/Public/Level/cart.jpg" style="width:40px;height:25px"><i>go</i><b>物！</b></a>
						<a  href="/hszz/TP/index.php/login/out">（退出）</a><?php endif; ?>
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
		
		
		
    
	<link href="/hszz/TP/Public/Home/share/css/about.css" rel="stylesheet" type="text/css">

<body>
<div>
    <div id="helpCenter_main" class="box clr">
	<div id="helpCenter_main" class="box clr">
        <div class="flt helpCenter_asidebox">
            <div class="helpCenter_aside">
                
                <h4>关于唯风尚  About Us</h4>
                <a href="" title="公司简介"><i></i>公司简介<br>Company Introduction</a>
                <a href="" title="管理团队"><i></i>管理团队<br>Managment Team</a>
                <a href="" title="投资者关系"><i></i>投资者关系<br>Investors</a>

                <h4>尚品新闻 News</h4>
                <a class="on" href="" title="国内媒体"><i></i>国内媒体<br>Chinese Press</a>
                <a href="" title="国外媒体"><i></i>国外媒体<br>International Press</a>
                
                <h4><a href="" title="招聘信息">招聘信息 Job Opportunities</a></h4>
                <h4><a href="" title="品牌招商">品牌招商 Business Development</a></h4>
                <h4><a href="" title="客户之声">客户之声 Feedback</a></h4>
                <h4><a href="" title="联系我们">联系我们 Contact Us</a></h4>
                <h4><a href="" title="网站地图">网站地图 Site Map</a></h4>
                <h4><a href="" title="友情链接">友情链接 Links</a></h4>             
            </div>
        </div>
				
        <div class="frt helpCenter_con">
            <h3>唯风尚 &gt; 官方购物分享平台<i></i></h3>
            
			<?php if(is_array($share)): foreach($share as $key=>$shares): ?><dl class="clr">
					<dt class="flt">					
						<?php if(is_array($goods)): foreach($goods as $key=>$good): if($good['goods_id'] == $shares['share_goodsid']): ?><img class="loader" src="/hszz/TP/Public/uploads/<?php echo ($good['goods_picname']); ?>" width="200" height="248" /><?php endif; endforeach; endif; ?>
					</dt>
					
					<dd class="flt">
						<p class="gray">TiTle：<?php echo ($shares['share_title']); ?> &nbsp;&nbsp;&nbsp;&nbsp;
							<a href="#">唯风尚分享平台</a></p>
							<br/>
							<h3>
								<a target="_blank" href="" title="">
									<?php if(is_array($users)): foreach($users as $key=>$user): if($user['users_id'] == $shares['share_userid']): echo ($user['users_name']); endif; endforeach; endif; ?></a>
								&nbsp; &amp; &nbsp;&nbsp;<?php echo ($shares['share_title']); ?>
							</h3><br/>
						<p class="tt"><?php echo ($shares['share_content']); ?></p>
						<a target="_blank" href="">发表时间：<?php echo (date("Y-m-d H:i",$shares['share_time'])); ?></a>
					</dd>
				</dl>
				<hr/><?php endforeach; endif; ?>
		
		</div>
    </div>
</div>

		
		
		
	
<div class="footer">
	<div class="center">
		<ul class="aftermarket">
			<li>
				<div class="item"><span class="icon1"><img src="/hszz/TP/Public/Home/Index/images/b1.jpg" ></span></div>
				<h4>7天无理由退货</h4>
			</li>
			<li>
				<div class="item"><span class="icon2"><img src="/hszz/TP/Public/Home/Index/images/b2.jpg" ></span></div>
				<h4>品牌官方授权</h4>
			</li>
			<li>
				<div class="item"><span class="icon3"><img src="/hszz/TP/Public/Home/Index/images/b3.jpg" ></span></div>
				<h4>全国范围配送</h4>
			</li>
			<li>
				<div class="item"><span class="icon4"><img src="/hszz/TP/Public/Home/Index/images/b4.jpg" ></span></div>
				<h4>到店体验</h4>
			</li>
		</ul>
		<div class="mobile-end">
			<a href="" target="_blank"><img src="/hszz/TP/Public/Home/Index/images/qrcode-s.png" title="扫描下载手机客户端"></a>
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
<script src="/hszz/TP/Public/Home/Index/js/mars_viplux.js"></script>
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
<script type="text/javascript" src="/hszz/TP/Public/Home/Index/js/vl-index.js"></script>
<div class="login-frame cmDialogReady"></div>
	</body>
</html>