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
		
		
		
	<script src="/shop/Public/HOME/jquery.js"></script>
	<link rel="shortcut icon" href="http://pic11.shangpin.com/shangpin/images/logo/favicon.ico">
    <link href="/shop/Public/HOME/cart/ResourceHandler_005.css" rel="stylesheet" type="text/css">
    <link href="/shop/Public/HOME/cart/ResourceHandler_002.css" rel="stylesheet" type="text/css">
    <link href="/shop/Public/HOME/cart/ResourceHandler_007.css" rel="stylesheet" type="text/css">
    <link href="/shop/Public/HOME/cart/ResourceHandler_003.css" rel="stylesheet" type="text/css">

    
    <link href="/shop/Public/HOME/cart/ResourceHandler_004.css" rel="stylesheet" type="text/css">
    <link href="/shop/Public/HOME/cart/ResourceHandler_006.css" rel="stylesheet" type="text/css">
    <link href="/shop/Public/HOME/cart/ResourceHandler.css" rel="stylesheet" type="text/css">

<!--order Start-->
<div class="box" style="overflow: visible; position:relative; z-index:9">
    <div class="clr">
        <div class="spLogo">
            <a href="" title="唯尚风-全球时尚轻侈第一站">
  				&nbsp; <b>唯风尚</b>-全球时尚轻侈第一站
            </a>
        </div>
        <ul class="alCart_Step msh">
            <li class="cur">
                <p><em>1</em>我的购物车</p>
                <span></span>
            </li>
            <li>
                <p><em>2</em>填写订单信息</p>
                <span></span>
            </li>
            <li class="last_step">
                <p><em>3</em>成功提交订单</p>
            </li>
        </ul>
    </div>
    <div class="alCart_notice">温馨提示：购物车中的商品无法保留库存，请您及时结算。</div>

<form action="/shop/index.php/Cart/insert" method="post">
    <div id="spTabs" class="clr">
        <!--tab切换 start-->
        
        <!--tab切换 end-->
        <div class="alCart_proList" id="spTab_content">
            <!--大陆购物start-->
            <div class="mainland_shopping" tabcontent="mytab-1"> 
                <div class="alCart_table_th">
                    <ul class="clr">
                        <li class="th th_chk">
                            <label><input  class="checkAllBtn" name="" value="" type="checkbox">全选</label>
                        </li>
                        <li class="th th_item">商品信息</li>
                        <!-- <li class="th th_">商品名称</li>
                        <li class="th th_">商品简介</li> -->
                        <li class="th th_price">商品单价</li>
                        <li class="th th_amount">数量</li>
                        <li class="th th_sum">小计</li>
                        <li class="th th_op">操作</li>
                    </ul>
                </div>
                <div class="cart_list_wp">
                    <div class="cart_list">
                        <div class="cart_list_title">
                            您在<span>唯风尚(viplux.com)</span>选购的商品  :
                        </div>
                        <div class="_cart_list_content">
                            <div class="cart_content_table">
                            	<div class="tr cur" proid="201504141151505534" stock="1">

                            		<?php if($_SESSION['cartlist'] == null): ?><!-- 若已登录，遍历cart购物车表 输出到购物车列表 -->
                                    <?php if(is_array($carts)): foreach($carts as $key=>$cart): ?><ul class="clr">
                                        <li class="td td_chk">
                                            <input id="box" class="checkList" type="checkbox">
                                        </li>

                                        <li class="td td_item">
                                            <div class="td_item_img">
                                                <a href="/shop/index.php/Gdetail/index/id/<?php echo ($cart['goods_id']); ?>"  >
                                                    <img style="opacity: 1;" src="/shop/Public/Uploads/<?php echo ($cart['goods_pic']); ?>" height="120" width="90"></a>
                                            </div>

                                            <div class="td_item_title clr">
                                                <p>
                                                    <a href="" ><?php echo ($cart['goods_name']); ?></a>
                                                </p>
                                                <br/>
                                                <p>
                                                    <a href=""><?php echo ($cart['goods_descr']); ?></a>
                                                </p>
                                                <br/>
                                                <p class="padt5">
                                                    <a href="">
                                                        <span class="color" title="颜色:混合色 尺码:均码">
                                                            <em>颜色</em>:混合色 <em>尺码</em>:均码
                                                        </span>

                                                    </a>
                                                </p>
                                            </div>
                                        </li>

                                        <li class="td td_price">
                                            <em class="RedPromotional">
                                                <i class="price_sign">¥</i>
                                                <b class="price_new"><?php echo ($cart['goods_price']); ?></b>
                                            </em>
                                        </li>

                                        <li class="td td_amount">

                                            <div class="amount_change" proid="201504141151505534">
                                                <!-- 商品id -->
                                                <input type="hidden" 
                                                    name= "g_id" 
                                                value="<?php echo ($cart['goods_id']); ?>"/>
                                                <a class="amount_minus" 
                                                ></a>

                                                <input id="goods_num"
                                                    name="g_num"
                                                class="amount_val" name="" value="<?php echo ($cart['goods_num']); ?>" readonly="readonly" type="text"/>

                                                <a class="amount_plus"
                                                ></a>
                                            </div>

                                        </li>

                                        <li class="td td_sum">
                                            <i class="price_sign">¥</i>
                                            <span class="price_val"><?php echo ($cart['goods_num']*$cart['goods_price']); ?>
                                            </span>
                                        </li>

                                        <li class="td td_op">
                                            <div class="favorProd">

                                                <a class="op_collect" pno="05474731" sno="05474731001" tno="0" p="539.00" href="#">收藏</a>
                                                
                                            </div>
                                            <a class="op_delete" href="/shop/index.php/Cart/del/id/<?php echo ($cart['goods_id']); ?>">删除</a>
                                        </li>
                                    </ul><?php endforeach; endif; ?>
                                    <?php else: ?>

                                    <!-- 若未登录，遍历session 输出到购物车列表 -->
                            		<?php if(is_array($_SESSION['cartlist'])): foreach($_SESSION['cartlist'] as $key=>$cart): ?><ul class="clr">
                                        <li class="td td_chk">
                                            <input id="box" class="checkList" type="checkbox">
                                        </li>

                                        <li class="td td_item">
                                            <div class="td_item_img">
                                                <a href="/shop/index.php/Gdetail/index/id/<?php echo ($cart['goods_id']); ?>"  >
                                                	<img style="opacity: 1;" src="/shop/Public/Uploads/<?php echo ($cart['goods_pic']); ?>" height="120" width="90"></a>
                                            </div>

                                            <div class="td_item_title clr">
                                                <p>
                                                    <a href="" ><?php echo ($cart['goods_name']); ?></a>
                                                </p>
                                                <br/>
                                                <p>
                                                    <a href=""><?php echo ($cart['goods_descr']); ?></a>
                                                </p>
                                                <br/>
                                                <p class="padt5">
                                                    <a href="">
                                                        <span class="color" title="颜色:混合色 尺码:均码">
                                                            <em>颜色</em>:混合色 <em>尺码</em>:均码
                                                        </span>

                                                    </a>
                                                </p>
                                            </div>
                                        </li>

                                        <li class="td td_price">
                                            <em class="RedPromotional">
                                                <i class="price_sign">¥</i>
                                                <b class="price_new"><?php echo ($cart['goods_price']); ?></b>
                                            </em>
                                        </li>

                                        <li class="td td_amount">

                                            <div class="amount_change" proid="201504141151505534">
                                                <!-- 商品id -->
                                                <input type="hidden" 
                                                    name= "g_id" 
                                                value="<?php echo ($cart['goods_id']); ?>"/>
                                                <a class="amount_minus" 
                                                ></a>

                                                <input id="goods_num"
                                                    name="g_num"
                                                class="amount_val" name="" value="<?php echo ($cart['goods_num']); ?>" readonly="readonly" type="text"/>

                                                <a class="amount_plus"
                                                ></a>
                                            </div>

                                        </li>

                                        <li class="td td_sum">
                                            <i class="price_sign">¥</i>
                                            <span class="price_val"><?php echo ($cart['goods_num']*$cart['goods_price']); ?>
                                            </span>
                                        </li>

                                        <li class="td td_op">
                                            <div class="favorProd">

                                                <a class="op_collect" pno="05474731" sno="05474731001" tno="0" p="539.00" href="#">收藏</a>
                                                
                                            </div>
                                            <a class="op_delete" href="#">删除</a>
                                        </li>
                                    </ul><?php endforeach; endif; endif; ?>

                            	</div>
                           
                            </div>
                        </div>
                    </div>
                          
                </div>

                <div class="clr cart_bottom">
                    <div class="cart_bottom_left">
                        
                        <div class="commodity_box">
                            <div class="selectproduct_box">
                                已选商品<em id="num">0</em>件
                            </div>
                        </div>
                    </div>
                    <div style="display: none;" class="error_prompt_mainland"></div>
                    <div class="commodity_money new_commodity_money">
                        商品金额：<i>¥</i><em id="sum">~</em>
                    </div>
                    <script type="text/javascript">
                        //显示默认的总金额：
                        var sum = 0;
                        var price_val = document.getElementsByClassName("price_val");

                        for(var i=0;i<price_val.length;i++){
                            sum += parseFloat(price_val[i].innerHTML);
                        }

                        $("#sum").html(sum);
                    </script>
                    <div class="cart_bottom_right clr">
                        <a class="return" href="/shop/index.php/List/index">&lt;&nbsp;
                        	继续购物</a>

                        <div class="settlement_box settlement_box_ep_new">
                            <a id="settlement_btn" 
                            	href="javascript:submitForm()">
                            立即结算</a>
                        </div>
                    </div>
                    <script type="text/javascript">
                    	function submitForm(){
                    		$('form').submit();
                    	}
                    </script>
                </div>
            </div>
        </div>
    </div>
</form>
    <div class="clr weixin_bottom">
        <img src="/shop/Public/HOME/cart/wx_banner.jpg" height="80" width="310">
    </div>
</div>
<script type="text/javascript">
	//全选框：
	$(".checkAllBtn").click(function(){
		$(".checkList").prop("checked",function(i,val){
			return !val;
		});
		$("#num").html(($(".checkList:checked").length));

	});

	$(".checkList").click(function(){
		$("#num").html(($(".checkList:checked").length));
	});

	//减少按钮：
	$(".amount_minus").click(function(){

		var goods_num = $(this).next();
        var s_total =   $(this).parent().parent().next().children("span");
        var s_num = $(this).parent().parent().prev().children().children("b");

		if(goods_num.val()>1){

	        var m = parseInt(goods_num.val())-1;
		    goods_num.val(m);

		    var total =s_num.html()*m;
		    s_total.html(total);

            var sum = 0;
            var price_val = document.getElementsByClassName("price_val");
            for(var i=0;i<price_val.length;i++){
                sum += parseFloat(price_val[i].innerHTML);
            }
            $("#sum").html(sum);

            //通过ajax修改session中的商品数量：
            var gid = $(this).prev().val();//获取商品id
            //alert(gid);
            var gnum = $(this).next().val();//获取商品数量
            //alert(gnum);
            $.post("/shop/index.php/Cart/edit",{g_id:gid,g_num:gnum},function(){});

		}

	});
	//增加按钮：
	$(".amount_plus").click(function(){

		var goods_num = $(this).prev();
        var s_total =   $(this).parent().parent().next().children("span");
        var s_num = $(this).parent().parent().prev().children().children("b");


		var m = parseInt(goods_num.val())+1;
		goods_num.val(m);

		var total =s_num.html()*m;
		s_total.html(total);	

        var sum = 0;
            var price_val = document.getElementsByClassName("price_val");
            for(var i=0;i<price_val.length;i++){
                sum += parseFloat(price_val[i].innerHTML);
            }
            $("#sum").html(sum);

            //通过ajax修改session中的商品数量：
            var gid = $(this).prev().prev().prev().val();//获取商品id
            //alert(gid);
            var gnum = $(this).prev().val();//获取商品数量
            //alert(gnum);
            $.post("/shop/index.php/Cart/edit",{g_id:gid,g_num:gnum},function(){});

	});
</script>


		
		
		
	
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