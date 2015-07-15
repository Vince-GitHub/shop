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
		
		
		

    <link href="/hszz/TP/Public/HOME/sureOrder/ResourceHandler_003.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/sureOrder/ResourceHandler_002.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/sureOrder/ResourceHandler_004.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/sureOrder/ResourceHandler.css" rel="stylesheet" type="text/css">

    
    <link href="/hszz/TP/Public/HOME/sureOrder/ResourceHandler_007.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/sureOrder/ResourceHandler_005.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/sureOrder/ResourceHandler_008.css" rel="stylesheet" type="text/css">
    <link href="/hszz/TP/Public/HOME/sureOrder/ResourceHandler_006.css" rel="stylesheet" type="text/css">

	
<!--order Start-->
<div class="clr box" >
    <!--头部开始-->
    <div class="clr">
        <ul class="alCart_Step msh">
            <li class="next">
                <p>
                    <em>1</em>我的购物袋
                </p>
                <span></span>
            </li>
            <li class="cur">
                <p>
                    <em>2</em>填写订单信息
                </p>
                <span></span>
            </li>
            <li class="last_step">
                <p>
                    <em>3</em>成功提交订单
                </p>
            </li>
        </ul>
    </div>
    <div class="alCart_notice">
        温馨提示：购物车中的商品无法保留库存，请您及时结算。
    </div>
</div>

<div class="alOrder_Consignee" >
        <!-- 收货信息 Start -->
        <a id="firstAnchor"></a>
        <h2 class="clr">
                <span><i>1</i>收货信息</span>
        </h2>

        <!-- 默认收货地址 Start -->
    <form action="/hszz/TP/index.php/Order/insert" method="post">
        <div class="olOrder_newConsignee borderbtm30">
            
            <div style="display: block;" class="new_Addr consignee_Addr">
                <div class="myinfo_Notice">
                    <span>默认收货地址</span>
                </div>
                

                <div class="clr addr_form">
                    <dl id="consnee_nameBox">
                        <dt><em>*</em>&nbsp;收货人：</dt>
                        <dd>
                            <span>
                                <input id="consnee_name" type="text" value="<?php echo ($users['users_name']); ?>" name="name">
                            </span>
                        </dd>
                    </dl>
          
                    <dl>
                        <dt><em>*</em>&nbsp;地&nbsp;&nbsp;&nbsp;&nbsp;址：</dt>
                        <dd>
                            <span class="normal_txt" id="consnee_topaddr"></span>
                            <span class="big_txt">
                            	<input id="consnee_addr" maxlength="30" type="text" value="<?php echo ($users['users_address']); ?>" name="address">
                            </span>
                        </dd>
                    </dl>
                    <dl>
                        <dt><em>*</em>&nbsp;邮&nbsp;&nbsp;&nbsp;&nbsp;编：</dt>
                        <dd>
                            <span>
                                <input id="consnee_code" maxlength="6" type="text" value="<?php echo ($users['users_code']); ?>" name="code">
                            </span>
                        </dd>
                    </dl>
                    <dl>
                        <dt><em>*</em>&nbsp;手&nbsp;&nbsp;&nbsp;&nbsp;机：</dt>
                        <dd>
                            <span>
                                <input id="consnee_mobile" maxlength="11" type="text" value="<?php echo ($users['users_phone']); ?>" name="phone">
                            </span>
                            <span class="normal_txt"></span>
                        </dd>
                    </dl>
                   
                </div>


            </div>
        </div>

        <!-- 新增地址start -->
    
        <div class="olOrder_newConsignee borderbtm30">
        	<div class="myinfo_Notice">
	            <span onclick="add_hide()">&nbsp;<b>新增收货地址</b></span>
		            <script type="text/javascript">
		            	function add_hide(){
		          			var div = document.getElementById("add_address");

		          			if(div.style.display == "none"){
		          				div.style.display = "block";
		          			}else{
		          				div.style.display = "none";
		          			}
		            	}
		            </script>
	            <em> ( 电话号码、手机号选填一项，其余为必填项 )</em>
        	</div>
            <div class="clr addr_form" id="add_address" style="display:none">

            	<input id="consnee_id" type="hidden" value="<?php echo ($users['users_id']); ?>" name="userid">

                <dl id="consnee_nameBox">
                    <dt><em>*</em>&nbsp;收货人：</dt>
                    <dd>
                        <span>
                            <input id="consnee_ne" type="text" 
                                name="new_link">
                        </span>
                    </dd>
                </dl>

                <dl>
                    <dt><em>*</em>&nbsp;地&nbsp;&nbsp;&nbsp;&nbsp;区：</dt>
                    <dd>
                        <select id="pro" name="pro">
            
            </select>
            <select style="display:none" id="city" name="city">
                
            </select>
            <select  style="display:none" name="county" id="county">
               
            </select>
            <script type="text/javascript" charset="utf-8">
                var c = ['中国','日本','广东','河南'];
                var c_0 = ['昌平','海淀','丰台','朝阳'];
                var c_1 = ['北海道','东海道','南海道'];
                var c_2 = ['广州','深圳','东莞','佛山','清远','中山'];
                var c_0_0 = ['回龙观','小沙河'];
                var c_0_1 = ['三门峡','南阳','信阳'];
                var c_0_2 = ['商丘','郑州','洛阳'];
                var c_0_3 = ['中关村','五道口','上地'];
                var pro = '<option>--请选择省--</option>';
                var cindex;
        		
        		for(var i = 0;i<c.length;i++){
        			pro += "<option value = '"+i+"'>"+c[i]+"</option>";
        		}
        		$("#pro").html(pro);
        		
        		$("#pro").change(function(){
        			$("#city").show();
        			cindex = $("#pro>option:selected").val();
        			var c = 'c_'+cindex;
        			var city = "<option>--请选择市--</option>";
        			var cc = eval(c);
        			for(var i=0;i<cc.length;i++){
        				city += "<option value = '"+i+"'>"+cc[i]+"</option>";
        			}
        			$("#city").html(city);
        		});
        		
        		$("#city").change(function(){
        			$("#county").show();
        			var index = $("#city>option:selected").val();
        			var c = 'c_'+cindex+"_"+index;
        			var cc = eval(c);
        			var county = "<option value=''>--请选择县/区--</option>";
        			for(var i in cc){
        			county += "<option value='"+i+"'>"+cc[i]+"</option>";
        			}

        			$("#county").html(county);
        		});
            </script>
                    </dd>
                </dl>

                <dl>
                    <dt><em>*</em>&nbsp;地&nbsp;&nbsp;&nbsp;&nbsp;址：</dt>
                    <dd>
                        <span class="normal_txt" id="consnee_topaddr"></span>
                        <span class="big_txt">
                        	<input id="consnee_ar" maxlength="30" type="text" name="new_add">
                        </span>
                    </dd>
                </dl>
                <dl>
                    <dt><em>*</em>&nbsp;邮&nbsp;&nbsp;&nbsp;&nbsp;编：</dt>
                    <dd>
                        <span>
                            <input id="consnee_co" maxlength="6" type="text"
                                name="new_code">
                        </span>
                    </dd>
                </dl>
                <dl>
                    <dt><em>*</em>&nbsp;手&nbsp;&nbsp;&nbsp;&nbsp;机：</dt>
                    <dd>
                        <span>
                            <input id="consnee_ph" maxlength="11" type="text" name="new_phone">
                        </span>
                    </dd>
                </dl>
                <dl>
                    <dt></dt>
                    <dd>
                        <input value="保存" id="save" class="submit_Btn"  type="button" 
                        	style="width:130px">
                        <i class="form_succeed" style="display: none;">保存成功</i>
                        <input value="重置" class="cancel_Btn" type="reset">
                    </dd>
                </dl>
            </div>
        </div>
        <!-- 新增收货地址 End -->
		<script type="text/javascript">
			$("#save").click(function(){

				var userid = $("#consnee_id").val();
				var address = $("#consnee_ar").val();
				var name = $("#consnee_ne").val();
				var phone = $("#consnee_ph").val();
				var code = $("#consnee_co").val();

				$.post("/hszz/TP/index.php/Profiles/add_pro",{userid:userid,address:address,name:name,phone:phone,code:code});
				$(".form_succeed").attr("style","display:block");
			});
		</script>
        <!-- 送货时间信息 Start -->
        <h2 class="clr borderTop">
            <span><i>2</i>送货时间</span>
        </h2>
        <dl class="olOrder_express">
            <dd>
                <label for="allDay" class="order_express curr">
                    <input checked="checked" name="express" id="allDay" type="radio" value="0">所有日期均可收货
                </label>
                <label for="workDay" class="order_express">
                    <input name="express" id="workDay" type="radio" value="1">工作日收货
                </label>
                <label for="holiDay" class="order_express">
                    <input name="express" id="holiDay" type="radio" value="2">双休日、节假日收货
                </label>
            </dd>
            <dd class="padT15">
                配送方式：快递发送（单笔订单支付金额满499元免运费）
            </dd>
        </dl>

        <!-- 发票信息 Start -->
        <h2 class="clr borderTop">
            <span><i>3</i>发票信息</span>
        </h2>
            <div class="clr olOrder_invoice_wp">
                <dl class="olOrder_invoice">
                    <h3>
                        <i class="txt_margin">发票类型：</i>
                        <label for="invoice_yes">
                            <input name="invoice" id="invoice_yes" value="0" type="radio">普通发票
                        </label>
                        <label for="invoice_no">
                            <input checked="checked" name="invoice" id="invoice_no" value="1" type="radio">不开发票
                        </label>
                    </h3>
                </dl>  
            </div>  
            <hr color="#ccc"/>

        <!-- 商品清单 Start -->
        <h2 class="clr  borderTop">
            <span><i>4</i>商品清单</span><a href="/hszz/TP/index.php/cart">&lt;&nbsp;返回修改购物车</a>
        </h2>
    

        <div id="divtest">
            <div class="alCart_proList order_list">
                <div class="alCart_proList_th">
                    <ul class="clr">
                        <li class="th_item">商品名称</li>
                        <li class="th_price">商品价格</li>
                        <li class="th_amount">数量</li>
                        <li class="th_sum">小计</li>
                    </ul>
                </div>
                <hr color="#ccc"/>   
                <div class="alCart_proList_content" id="alCart_proList_content">
        <!-- 遍历session 输出到购物车列表 -->
                    <?php if(is_array($_SESSION['cartlist'])): foreach($_SESSION['cartlist'] as $key=>$cart): ?><ul class="clr">
                       
                        <li class="td td_item">
                            <div class="td_item_img">
                                <a href="/hszz/TP/index.php/Gdetail/index/id/<?php echo ($cart['goods_id']); ?>"  >
                                    <img style="opacity: 1;" src="/hszz/TP/Public/Uploads/<?php echo ($cart['goods_pic']); ?>" height="120" width="90"></a>
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

                            <div class="amount_change" proid="
                                201504141151505534" style="margin-top:55px">
                                
                             <?php echo ($cart['goods_num']); ?>
                                
                            </div>

                        </li>

                        <li class="td td_sum">
                            <i class="price_sign">¥</i>
                            <span class="price_val"><?php echo ($cart['goods_num']*$cart['goods_price']); ?>
                            </span>
                        </li>

                       
                    </ul><?php endforeach; endif; ?>

                </div>
            </div>
            <!-- 商品清单 End -->


            <div class="alCart_total">
                <div class="hasprod clr">
                    <div>
                        商品总金额：<b style="color:#ff69b4">￥</b>
                        <input type="text" name="sum" value="55" size="10" 
                        id="sum" style="border:none;color:gray" readonly />
                	</div>
            	</div>
        	</div>
        </div>
    

        <div class="order_bottom_pay">
            <a class="return" href="/hszz/TP/index.php/cart">&lt;&nbsp;返回修改购物车 </a>
        	<a style="display: block;" href="javascript:submitForm()" 
                class="paySubmit_btn" 
        		id="paySubmit_btn">确认提交</a>
            <div class="gifts_pay payTotal">
                应付总额:
        		<em class="redTxt">¥<i id="actualAmount" class="actualAmount">8439</i></em>
            </div>
        </div>  

    </form>

</div>

    <div style="height:10px" class="error_message" id="error_message"></div>
</div>
<!--order End-->
<br/><br/>
<script type="text/javascript">
    function submitForm(){
        $("form").submit();
    }

    var m = 0;
    var price_val = document.getElementsByClassName("price_val");
    for(var i=0;i<price_val.length;i++){
        m += parseFloat(price_val[i].innerHTML);
    
    }

    $("#actualAmount").html(m);
    $("#sum").val(m);
</script>


		
		
		
	
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