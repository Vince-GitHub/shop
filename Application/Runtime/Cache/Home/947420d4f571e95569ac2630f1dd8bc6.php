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
		
		
		
    <link href="/hszz/TP/Public/HOME/myCenter/ResourceHandler_007.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myCenter/ResourceHandler_002.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myCenter/ResourceHandler_005.css" rel="stylesheet" type="text/css">
    <script src="/hszz/TP/Public/HOME/myCenter/ntkfstat5.js" charset="utf-8" async="" type="text/javascript"></script><script src="/hszz/TP/Public/HOME/myCenter/ResourceHandler_011.js" type="text/javascript"></script>
    <script type="text/javascript">
        NTKF_PARAM = {
            siteid: "kf_9986",
            settingid: "kf_9986_1355827406710"
        };
    </script>
    <script src="" type="text/javascript" charset="utf-8"></script>
    <script src="/hszz/TP/Public/HOME/myCenter/semwl.js" type="text/javascript"></script><script type="text/javascript" src="/hszz/TP/Public/HOME/myCenter/seo.htm"> </script>
    
    <link href="/hszz/TP/Public/HOME/myCenter/ResourceHandler_008.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myCenter/ResourceHandler_006.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myCenter/ResourceHandler.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myCenter/ResourceHandler_004.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myCenter/ResourceHandler_003.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/myCenter/ResourceHandler_009.css" rel="stylesheet" type="text/css">
    
<div class="box" id="sp_newHeader">
    <!--sp-header-midbar begin-->
    <div id="sp-header-midbar" class="clr">
        <div class="logowrap flt">
           
            <a href="" title="用户中心">
                <img src="/hszz/TP/Public/HOME/myCenter/logo_member_new.jpg" alt="用户中心" height="38" width="105"></a>
            </div>       
    </div>
</div>

    <div class="member_wrapper">
        <!--member Start-->
        <div class="box clr">


	

<div id="member_left" class="flt">
    <div class="member_leftMenu">
        <h6>交易管理</h6>
        <ul>
            <li><a id="OrderList" href="/hszz/TP/index.php/myOrder">我的订单</a></li>

        </ul>
        
		<h6>我的收藏</h6>
        <ul>
            <li><a id="FavoriteProduct" href="/hszz/TP/index.php/Collect">我的商品收藏</a></li>
            <li><a id="FavoriteProduct" href="/hszz/TP/index.php/Profiles">其他收货地址</a></li>
		</ul>		
       
        
        <h6>分享与关注</h6>
        <ul>
            <li><a id="FavoriteBrand" href="/hszz/TP/index.php/Share">我的分享</a></li>
        </ul>
		
		
		<h6>账户管理</h6>
        <ul>
            <li><a class="curr" id="UserInfo" href="/hszz/TP/index.php/myCenter">账户信息</a></li>
            
           <li><a id="ChangePwd" href="/hszz/TP/index.php/Profiles/repass">修改密码</a></li>
        </ul>

        <h6>我的评论</h6>
        <ul>
            <li><a id="FavoriteBrand" href="/hszz/TP/index.php/Comments">浏览评论</a></li>
        </ul>
    
	</div>
</div>

<div id="member_right" class="flt">
    <h2>添加收货地址</h2>
    
<form action="/hszz/TP/index.php/profiles/insert" id="accountfrom" method="post" name="accountfrom">        
	<div id="spTabs" style="margin-top: 10px;">
            <div class="member_content" id="spTabs_content">
                <div tabcontent="mytab-1" class="member_tebcell">
                    <!-- 基本信息 Start -->
                    <div id="member_userinfo" class="clr">
                        <div id="member_user_content">

                            <div id="spAccount-myinfo_form" class="clr">
                                
								<dl>
                                    <dt><em>*</em>所在地区：</dt>
                                    <dd>
                                        <span>
                                            <input name="profile_region"  id="info_mobile"  type="text">
                                        </span>
                                    </dd>
                                </dl>
                                
								<dl>
                                    <dt><em>*</em>街 道：</dt>
                                    <dd>
                                        <span>
                                            <input name="profile_street"  id="info_mobile"  type="text">
                                        </span>
                                    </dd>
                                </dl>
                                
								<dl>
                                    <dt>详细地址：</dt>
                                    <dd>
                                        <span>
                                            <input name="profile_address"  id="info_mobile"  type="text">
                                        </span>
                                    </dd>>
                                </dl>
                                
                                <dl>
                                    <dt>收件人姓名：</dt>
                                    <dd>
                                        <span>
                                            <input name="profile_name"  id="info_mobile"  type="text">
                                        </span>
                                    </dd>
                                </dl>
                                <dl id="mobilearea">
                                    <dt>手机号码：</dt>
                                    <dd>
                                        <span>
                                            <input name="profile_phone"  id="info_mobile"  type="text">
                                        </span>
                                        <div>
                                                <em class="ac_green phone_hastest">已绑定</em><a href="#" id="changemobile">修改绑定手机</a>
                                        </div>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>邮政编码：</dt>
                                    <dd>
                                        <span>
                                            <input name="profile_code" id="info_code" type="text">
                                        </span>
                                    </dd>
                                </dl>
                                <dl class="sp_newpai">
                                    <dt></dt>
                                    <dd>
                                        <button value="submit" class="member_info_subbtn" id="submit" type="submit">保 存</button>
                                        <button type="reset" class="member_info_canclebtn">重 置</button>
                                        <i class="form_succeed" style="display: none;">保存成功</i></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <!-- 基本信息 End -->
                </div>
            </div>
        </div>
</form>
</div>
        </div>
    </div>
    <div id="spFooter" class="box mgt10 relt">
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