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
		
		
		
	<link href="/hszz/TP/Public/HOME/myOrder/ResourceHandler_004.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myOrder/ResourceHandler_002.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myOrder/ResourceHandler_003.css" rel="stylesheet" type="text/css">

    <link href="/hszz/TP/Public/HOME/myOrder/ResourceHandler.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myOrder/ResourceHandler_007.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myOrder/ResourceHandler_005.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myOrder/ResourceHandler_006.css" rel="stylesheet" type="text/css">


<div class="box" id="sp_newHeader">
    <!--sp-header-midbar begin-->
    <div id="sp-header-midbar" class="clr">
        <div class="logowrap flt">
           
            <a href="/hszz/TP/index.php/myCenter" title="用户中心">
                <img src="/hszz/TP/Public/HOME/myOrder/logo_member_new.jpg" alt="用户中心" height="38" width="105"></a>
            </div>
        <ul id="sp_newHeader_loginForm" class="frt">
            <li>欢迎<span>13643816107</span>，
            <a href="" title="退出">[退出]</a></li>
        </ul>
        <div id="sp-header-topbar" class="frt">
            <ul class="clr">
                <li><a href="">唯风尚</a></li>
                <li><a href="">奥莱vip</a></li>
                <li><a href="">手机vip</a></li>
            </ul>
        </div>
    </div>
</div>

    <div class="member_wrapper">
        <!--member Start-->
        <div class="box clr">

<div id="member_left" class="flt">
    <div class="member_leftMenu">
        <h6>
            交易管理</h6>
        <ul>
            <li><a class="curr" id="OrderList" href="/hszz/TP/index.php/myOrder">我的订单</a></li>
      
        </ul>
        <h6>
            我的收藏</h6>
        <ul>
            <li><a id="FavoriteProduct" href="">收藏的单品</a> </li>
        </ul>
       
        
        <h6>
            分享与关注</h6>
        <ul>
            <li><a id="FavoriteBrand" href="">我的分享</a></li>
        </ul>
         <h6>
            账户管理</h6>
        <ul>
            <li><a id="UserInfo" href="/hszz/TP/index.php/myCenter">账户信息</a></li>
            
           <li><a id="ChangePwd" href="/hszz/TP/index.php/Comments/repass">修改密码</a></li>
        </ul>

        <h6>
            我的评论</h6>
        <ul>
            <li><a id="FavoriteBrand" href="/hszz/TP/index.php/Comments">浏览评论</a></li>
        </ul>
    </div>
</div>
            
<!--member rightSidebar Start -->
<div id="member_right" class="flt">
    <input id="flag" value="" type="hidden">
    <h2>
        我的评论<a href="" class="mobiapp">手机客户端，随时随地查看物流信息</a>
    </h2>
    
    <!-- orderList Start -->
    <div id="spTabs">
        
        <div class="member_content" id="spTabs_content">
                <!-- 暂无数据 Start -->
                 <table class="prodList" border="0" cellpadding="0" cellspacing="0">
                            <colgroup>
                                <col width="100">
                                <col width="110">
                                <col width="100">
                                <col width="100">
                                <col width="60">
                                <col width="110">
                                <col>
                            </colgroup>
                            <thead>
                                <tr>
                                	<th>评论ID</th>
                                    <th>用户ID</th>
                                    <th>评论商品ID</th>
                                    <th>评论商品图片</th>
                                    <th>评论标题</th>
                                    <th>评论时间</th>
                                    <th>评论详情</th>
                                </tr>

                            </thead>
                            <tbody>
                            <!-- 遍历表内容并输出 -->
                                <?php if(is_array($comments)): foreach($comments as $key=>$comment): ?><tr style="border-bottom:1px solid #ccc">
                                    
                                    <td><?php echo ($comment['comments_id']); ?></td>
                                    <td><?php echo ($comment['comments_userid']); ?></td>
                                    <td><?php echo ($comment['comments_goodsid']); ?></td>
                                    <td><img width="70px" height="80px" src="/hszz/TP/Public/Uploads/<?php echo ($comment['comments_goodspic']); ?>"></td>
                                    <td><?php echo ($comment['comments_title']); ?></td>
                                    <td><?php echo ($comment['comments_time']); ?></td>
                                    <td><a href="/hszz/TP/index.php/commentsDetail/index/commentid/<?php echo ($comment["comments_id"]); ?>">查看评论内容</a></td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
 
        </div>
    </div>
    <!-- orderList End -->
    <!-- pages Start -->
    <!-- pages End -->
</div>
<!--member rightSidebar End -->

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