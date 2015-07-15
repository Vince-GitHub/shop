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
		
		
		

<meta name="description" content="白色镂空衬衫，隐隐透出小性感，前片的荷叶边设计又有小女孩的甜美。">
<meta name="keywords" content="Magento, Varien, E-commerce">
<meta name="robots" content="INDEX,FOLLOW">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="" type="image/x-icon">
<link rel="shortcut icon" href="" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="/shop/Public/Home/Gdetail/css/comm.css" media="all">
<link rel="stylesheet" type="text/css" href="/shop/Public/Home/Gdetail/css/vl-global.css" media="all">
<link rel="stylesheet" type="text/css" href="/shop/Public/Home/Gdetail/css/vl-common.css" media="all">
<link rel="stylesheet" type="text/css" href="/shop/Public/Home/Gdetail/css/vl-product.css" media="all">
<script type="text/javascript" src="/shop/Public/jquery.js"></script>
<script type="text/javascript" src="/shop/Public/Home/Gdetail/js/vl.js"></script>
<script type="text/javascript" src="/shop/Public/Home/Gdetail/js/vl-common.js"></script>
<script type="text/javascript" src="/shop/Public/Home/Gdetail/js/messenger.js"></script>
<script type="text/javascript" src="/shop/Public/Home/Gdetail/js/vl-product.js"></script>

<script type="text/javascript">
//<![CDATA[
optionalZipCountries = ["HK","IE","MO","PA"];
//]]>
</script>
<script type="text/javascript">
	var cancelIconUrlForDialog = '';
	var closeIconUrlForDialog = '';
	var loginUrl  = '';
	var logoutUrl = '';
	var base_url  = '';
</script>
</head>
<body class="catalog-product-view catalog-product-view product-product-s02dl0119n37371 middleSize">



<div class="vl-product">
    <!--右侧内容区-->
    <div class="right-side">
      
	<form method="post" name="form1" action="/shop/index.php/Gdetail/insert">
        <!-- 要提交的表单项 -->
        <input name="user_id" value="<?php echo ($_SESSION['user']['users_id']); ?>" type="hidden">
        <input name="goods_id" value="<?php echo ($goods['goods_id']); ?>" id="sample_product_id" type="hidden">
			<p class="brand">
                <a href="" target="_blank" title="Just cavalli">Just cavalli</a>
            </p>
		
        <p class="product-name"><?php echo ($goods['goods_goods']); ?></p>
        <div class="pro-price">
          <p class="price-info hide-price">
            
            <span style="display: none;" class="price-off"><span class="discount-label"></span>折</span>
            <span class="market-price">
                <del><span class="old-price-label"><small>¥</small><?php echo ($goods['goods_price']+200); ?></span></del>
            </span><span class="price-label"><span class="tip" style="font-size:30px"><?php echo ($goods['goods_price']); ?></span></span>
          </p>
                  </div>
        <div class="opts">
                      <div mars_sead="220|10|2|1" class="collect" title="收藏" data-sku="S02DL0119N37371">收藏</div>
                    <a class="share" data-share="weibo" data-url="" data-uid="" href="#" mars_sead="220|10|27297|1" title="分享">分享</a>
        </div>
        
                    <div class="attrs">
              <div data-attr-id="92" class="attribute-item color">
      <p class="attr-name">厂 家：</p>
      <p class="product-name"><?php echo ($goods['goods_company']); ?></p>
    </div>
	<div data-attr-id="92" class="attribute-item color">
      <p class="attr-name">简 介：</p>
      <p class="product-name"><?php echo ($goods['goods_descr']); ?></p>
    </div>
	<div data-attr-id="92" class="attribute-item color">
      <p class="attr-name">库存量：</p>
      <p class="product-name"><?php echo ($goods['goods_store']); ?></p>
    </div>
	<div data-attr-id="92" class="attribute-item color">
      <p class="attr-name">购买数量：</p>
      <p class="product-name"><a class="amount_minus">-</a><input name="goods_num" value="1" type="text" size="2" id = "num"/><a class="amount_plus">+</a></p>
    </div>
	<div data-attr-id="92" class="attribute-item color">
      <p class="attr-name">被购买数量：</p>
      <p class="product-name"><?php echo ($goods['goods_num']); ?></p>
    </div>
	<div data-attr-id="92" class="attribute-item color">
      <p class="attr-name">点击次数：</p>
      <p class="product-name"><?php echo ($goods['goods_clicknum']); ?></p>
    </div>
            
      </div>
  
  
  <div id="product-images-for-share" style="display:none">
          <img src="/shop/Public/uploads/<?php echo ($goods['goods_picname']); ?>" style="display:none">
		  <?php if(is_array($gdetails)): foreach($gdetails as $key=>$gdetail): if($gdetail['gdetail_goodsid'] == $goods['goods_id']): ?><img src="/shop/Public/uploads/<?php echo ($gdetail['gdetail_picname1']); ?>" style="display:none">
          <img src="/shop/Public/uploads/<?php echo ($gdetail['gdetail_picname2']); ?>" style="display:none">
          <img src="/shop/Public/uploads/<?php echo ($gdetail['gdetail_picname3']); ?>" style="display:none">
          <img src="/shop/Public/uploads/<?php echo ($gdetail['gdetail_picname4']); ?>" style="display:none">
         
      </div>
            <script type="text/javascript">
                var selectedColorId = 50;
            </script>
                          
                
                <div style="display: none;" class="to-try up-pop">
          
          <!--店铺地图-->
          
        </div>
        <div class="btn-box">
			<a href="/shop/index.php/Share/add/gid/<?php echo ($goods['goods_id']); ?>">分享该商品</a>&nbsp;&nbsp;
			<button type="button" class="apply_try" onclick="window.location='/shop/index.php/Collect/add/id/<?php echo ($goods['goods_id']); ?>'">
				收藏 商品
			</button><i class="waring"></i>

			  <button type="submit" class="apply_try" id="to_buy" mars_sead="220|10|27298|1">
				加入购物袋
			  </button><i class="waring"></i>
        </div>
        <ul class="service-area">
          <li><b class="s1"></b>品牌官方授权</li>
          <li><b class="s2"></b>全国范围配送</li>
                      <li><b class="s3"></b>7天无理由退货</li>
                    <li><b class="s5"></b>太平洋投保</li>
        </ul>
        <div class="details">
          <div class="section product-info on">
            <p class="section-name" mars_sead="220|10|27295|1">产品信息<b></b></p>
            <div style="display: block;" class="ddl">
                <ul>
			        <li><strong>货号：</strong><span><?php echo ($gdetail['gdetail_gnum']); ?></span></li>
			        <li><strong>材质：</strong><span><?php echo ($gdetail['gdetail_texture']); ?></span></li>
				    <li><strong>产地：</strong><span><?php echo ($gdetail['gdetail_pplace']); ?></span></li>
				    <li><strong>描述：</strong><span><?php echo ($gdetail['gdetail_descr']); ?></span></li>
				    <li><strong>品牌归属：</strong><span>意大利</span></li>
			    </ul>
            </div>
          </div>
          <div class="section">
            <p class="section-name" mars_sead="220|10|27308|1">清洁与保养<b></b></p>
            <div class="ddl"><?php echo ($gdetail['gdetail_clean']); ?></div>
			
          </div>
		  
          <div class="section">
            <p class="section-name" mars_sead="220|10|27301|1">售后与三包说明<b></b></p>
            <div class="ddl">
              
<p id="guarantee" style="width:100%;font-family:微软雅黑;line-height: 1.6em;max-width:640px;"><span style="color: #000">每一件VIPLUX唯风尚在线售卖的商品都有属于自己的售后服务吊牌。请保持售后服务吊牌完好，一经拆剪，将无法办理退货。敬请谅解，谢谢！</span><br>商品（非特殊商品）自签收之日起7天内，在未经穿着、不影响二次销售的情况下，唯风尚将为您提供七天无理由退货服务。<br>请您收货时务必仔细验货，特殊商品（如化妆品、贴身衣物、手表、珠宝、黄金饰品、家居、赠品等均属特殊商品）如遇非质量问题签收后，将无法享受七天无理由退货服务，请您谅解！<br>
详情可见“<a href="" style="text-decoration: underline; color: #000">售后政策</a>”
</p>
<style>
#guarantee {font-size: 13px}
</style>            </div>
          </div>
          <div class="section product-info on">
            <p class="section-name" mars_sead="220|10|27295|1">商品评论<b></b></p>
            <div style="display: block;" class="ddl">
                <ul>
					<?php if(is_array($comments)): foreach($comments as $key=>$comment): ?><li>
                        --------------------------------------------------------<br/>					
					    <?php if(is_array($users)): foreach($users as $key=>$user): if($user['users_id'] == $comment['comments_userid']): ?><strong><span><b>用户名</b>：<?php echo ($user['users_name']); ?></span><?php endif; endforeach; endif; ?>
					    <span><b>评论标题：</b><?php echo ($comment[comments_title]); ?></span>
						<?php if(is_array($commentdetails)): foreach($commentdetails as $key=>$commentdetail): if($commentdetail['commentDetail_commentid'] == $comment['comments_id']): ?><strong><span><b>评论详情：</b><?php echo ($commentdetail['commentDetail_content']); ?></span><?php endif; endforeach; endif; ?>
						<span><b>评论时间：</b><?php echo (date("Y-m-d",$comment['comments_time'] )); ?></span>
						--------------------------------------------------------
					</li><?php endforeach; endif; ?>
			    </ul>
            </div>
          </div>
                    <div class="section to-brand">
            <p class="section-name"><a href="" target="_blank" title="Just cavalli品牌主页">Just cavalli品牌主页<b></b></a></p>
          </div>
                  </div>
      </form>
    </div>
    <!--左侧图区-->
    <div class="left-side">
  <div style="height: 620px;" class="zoom-box"><div class="cmZoom"><div class="small-img-box"><img class="small-img" src="/shop/Public/uploads/<?php echo ($gdetail['gdetail_picname1']); ?>"><div style="width: 250px; height: 310px;" class="range-box"></div></div><div mars_sead_hover="220|10|27305|1" class="big-img-box"><div style="width: 1000px; height: 1240px;" class="zoom-block"><img class="big-img" src="/shop/Public/uploads/<?php echo ($gdetail['gdetail_picname1']); ?>"></div></div></div></div>
  <div class="box">
    <div class="img-wrapper">
      <div class="carousel-wrap" style="width: 440px; height: 107px;">
	  <div class="carousel-content" style="position: relative; width: 440px; height: 107px;">
	      <ul style="position: absolute; top: 0px; left: 0px; width: 528px; height: 100%; overflow: visible;" class="img-list">
		      <li mars_sead_hover="220|10|27306|1" class="on" style="width: 88px; height: 92.5502px;">
		          <div style="height: 92.5502px;" class="i-box"><img src="/shop/Public/uploads/<?php echo ($goods['goods_picname']); ?>"></div>
		      </li>
		      <li mars_sead_hover="220|10|27306|2" style="width: 88px; height: 92.5502px;"> 
			      <div style="height: 92.5502px;" class="i-box"><img src="/shop/Public/uploads/<?php echo ($gdetail['gdetail_picname1']); ?>"></div>
		      </li>
			  <li mars_sead_hover="220|10|27306|3" style="width: 88px; height: 92.5502px;">
			      <div style="height: 92.5502px;" class="i-box"><img src="/shop/Public/uploads/<?php echo ($gdetail['gdetail_picname2']); ?>"></div>
			  </li>
			  <li mars_sead_hover="220|10|27306|4" style="width: 88px; height: 92.5502px;">
			      <div style="height: 92.5502px;" class="i-box"><img src="/shop/Public/uploads/<?php echo ($gdetail['gdetail_picname3']); ?>"></div>
			  </li>
			  <li mars_sead_hover="220|10|27306|5" style="width: 88px; height: 92.5502px;">
			      <div style="height: 92.5502px;" class="i-box"><img src="/shop/Public/uploads/<?php echo ($gdetail['gdetail_picname4']); ?>"></div>
			  </li>
			  
			</ul>
			</div>
			<div class="carousel-control"><span class="prev not"><span class="prev-s"></span></span><span class="steps"><span data-step="0" class="step current">1</span><span data-step="1" class="step">2</span></span><span class="next"><span class="next-s"></span></span></div></div>
    </div>
  </div>
</div><?php endif; endforeach; endif; ?>
    <!--底部内容区-->
    <div class="hot-brand">
          <p class="area-name">品牌热销<a target="_blank" href="">查看更多<b></b></a></p>
        <div class="carousel-wrap" style="width:1260px;height:478px;">
	        <div class="carousel-content" style="position:relative;width:1260px;height:478px;">
		        <ul style="width: 6300px; position: absolute; top: 0px; left: 0px; height: 100%; overflow: visible;" class="items">
				    <?php if(is_array($hotgoods)): foreach($hotgoods as $key=>$hotgoods): ?><li>
						<div class="item">
							<div class="img-box" >
								<div class="normal"><a target="_blank" href="/shop/index.php/Gdetail/index/id/<?php echo ($hotgoods['goods_id']); ?>"><img src="/shop/Public/uploads/<?php echo ($hotgoods['goods_picname']); ?>" alt="<?php echo ($hotgoods['goods_goods']); ?>" title="<?php echo ($hotgoods['goods_goods']); ?>"></a></div>
								<div class="hover"><a target="_blank" href="/shop/index.php/Gdetail/index/id/<?php echo ($hotgoods['goods_id']); ?>"><img src="/shop/Public/uploads/<?php echo ($hotgoods['goods_picname2']); ?>" alt="<?php echo ($hotgoods['goods_goods']); ?>" title="<?php echo ($hotgoods['goods_goods']); ?>"></a></div>
	                  	        <div class="try"><?php if($hotgoods['goods_state'] == 1): ?>新品上市
																<?php elseif($hotgoods['goods_state'] == 2): ?>在售<?php elseif($hotgoods['goods_state'] == 3): ?>热销<?php elseif($hotgoods['goods_state'] == 4): ?>掌柜推荐<else condition="$hotgoods['goods_state'] eq 5"/>已下架<?php endif; ?></div>
	                  	    </div>
	                <p class="brand-name">Just cavalli</p>
	                <p class="name"><a title="<?php echo ($hotgoods['goods_goods']); ?>" target="_blank" href="/shop/index.php/Gdetail/index/id/<?php echo ($hotgoods['goods_id']); ?>"><?php echo ($hotgoods['goods_goods']); ?></a></p>
	                                  <div class="info no-login"><del>￥<?php echo ($hotgoods['goods_price']+200); ?></del><span class="tip"><?php echo ($hotgoods['goods_price']); ?></span></div>
                  	</div>
	            </li><?php endforeach; endif; ?>
    
              </ul></div><div class="carousel-control"><span class="prev not"><span class="prev-s"></span></span><span class="steps"><span data-step="0" class="step current">1</span><span data-step="1" class="step">2</span><span data-step="2" class="step">3</span><span data-step="3" class="step">4</span><span data-step="4" class="step">5</span></span><span class="next"><span class="next-s"></span></span></div></div>
        </div>
   
  </div>
  <script type="text/javascript">
      $(".amount_minus").click(function(){
        
		if($("#num").val()>1){
		$("#num").val(parseInt($("#num").val())-1);
		}

	});
	//增加按钮：
	$(".amount_plus").click(function(){
		$("#num").val(parseInt($("#num").val())+1);
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