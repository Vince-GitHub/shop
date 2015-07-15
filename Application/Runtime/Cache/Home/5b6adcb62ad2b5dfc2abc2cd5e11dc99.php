<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>尚品 - 登录/注册</title>
	
    <link href="/shop/Public/Home/Login/css/ResourceHandler_003.css" rel="stylesheet" type="text/css">
	<link href="/shop/Public/Home/Login/css/ResourceHandler_002.css" rel="stylesheet" type="text/css">
    <link href="/shop/Public/Home/Login/css/ResourceHandler_004.css" rel="stylesheet" type="text/css">
    <link href="/shop/Public/Home/Login/css/ResourceHandler.css" rel="stylesheet" type="text/css">

    
</head>
<body>    
    <div id="spLogo" class="box relt">
        <a href="" id="spLogo_logo">
           <img src="/shop/Public/Home/Login/images/logo1.jpg" alt="尚品" title="首页" width="220px" height="65px">
        </a>
    </div>
    <!--sp_getPwd-->
    
<div class="box" id="spComm_regloginbox">
    <div class="clr spComm_regloghook">
        <!--Login Start-->
        <div class="sp_regLoginBox" id="sp_loginJs">
            <div class="regLogin_box flt">
                <div id="sp_loginBox" class="clr">
                    <div id="spSign_box" class="clr">
                      
					  
					  
					  <div class="splogin_block splogin_form flt">						
							<form action="/shop/index.php/Login/login" id="formlogin" method="post" target="hiddenIFrame">
								<ul class="tab_change">
                                    <li class="current"><a class="login_title" href="#this">登录</a></li>
										
                                </ul>
                                <dl class="margint40">
                                    <dd>
                                        <em>账号：</em>
                                        <div class="inputparent_rlat">
                                            <input class="input-validation-error txt_input" data-val="true" data-val-required="请输入账号" id="spSignin_username" name="users_account" phdata="请输入正确的邮箱地址或手机号码" type="text"/><span></span>
                                        </div>
                                    </dd>
                                    <dd>
                                        <em>密码：</em>
                                        <div class="inputparent_rlat">
                                            <input class="input-validation-error txt_input" data-val="true" data-val-length="密码不正确" data-val-length-max="20" data-val-length-min="6" data-val-required="请输入密码" id="spSignin_password" name="pass" phdata="请输入6-20位的密码" type="password" /><span></span>
                                        </div>
                                    </dd>
									
									
									<dd id="divnamemobilevcode">
                                            <em>验证码：</em>
                                            <div style="position: relative;" class="inputparent_rlat">
                                               <input style="border: 1px solid rgb(177, 173, 170);" class="txt_input code_input" id="spSignin_mobilecode" maxlength="4" name="code" placeholder="请输入验证码" type="text">
                                                <i class="code_box">
												
														 <img  src="/shop/index.php/Login/code" width='150px' onclick="this.src='/shop/index.php/Login/code?a'+Math.random();"/>
												
												</i><span></span>
                                            </div>
                                        </dd>
									
									
                                   <!--  <dd id="spSignin_code_dd"  style="display:none">
                                        <em>验证码：</em>
                                        <div class="inputparent_rlat">
                                            <input class="txt_input code_input" id="spSignin_code" maxlength="4" name="VerifyCode" phdata="请输入验证码" type="text" />
                                            <i class="code_box">
                                                <img id="spSignin_captchCode" alt="验证码" onclick="changeCaptchCode();" style="cursor: pointer"
                                                    title="看不清，换一张"><a href="javascript:;" onclick="changeCaptchCode()">换一换</a>
                                            </i><span></span>
                                        </div>
                                    </dd> -->
                                    <dd>
											<button type="submit" style="margin-left:60px;width:230px;height:40px;background-color:#b2001f;color:#fff;font-size:17px;border:1px">登  录</button>
											<a href="" id="slSignin_forgot" class="reset_pwd">忘记密码？</a>
                                    </dd>
                                </dl>
                                <div class="username_select">
                                    <ul>
                                    </ul>
                                </div>
							</form>                  
						  </div>
                        
						
						
						<div class="splogin_block spreg_form flt" id="spTab">
							<form action="/shop/index.php/Login/login/login" id="formRegist" method="post" target="hiddenIFrame">
							<input id="Code" name="Code" type="hidden" value="" />
							<input id="ReturnUrl" name="ReturnUrl" type="hidden" value="" />
							<input id="hid_regtype" name="RegisterType" type="hidden" value="1" />
							<input type="hidden" id="hid_oldmobile" value="" />
                          <input type="hidden" id="isValidimgcode" value="1" />
                                <ul class="tab_change" id="type_change_menu">
                                    <li class="title_tab current" tabid="tab-1"><a class="mobile_title" href="#signUp">手机注册</a>
                                    </li>
                                    <li class="title_tab" tabid="tab-2"><a class="email_title" href="#signUp">邮箱注册</a>
                                    </li>
                                </ul>
                                <div id="type_change_content">
                                    <dl class="mobile_list margint40" tabcontent="tab-1">
                                        <dd id="divnamemobile">
                                            <em>手机：</em>
                                            <div class="inputparent_rlat height_auto">
                                                <input class="txt_input" id="spMobileup_mibile" maxlength="20" name="Mobile" phdata="请输入正确的手机号码" type="text" />
												<span id="divMobile"></span>
                                            </div>
                                        </dd>
                                                                               
                                        <dd style="display:none;">
                                            <em>手机验证码：</em>
                                            <div class="inputparent_rlat">
                                                <input id="spMobileup_mibilenumHid" name="MobileVcode" type="hidden"  /><span></span>
                                            </div>
                                        </dd>
                                    </dl>                                                              
                                    <dl class="email_list margint40" tabcontent="tab-2">
                                        <dd>
                                            <em>邮箱：</em>
                                            <div class="inputparent_rlat">
                                                <input class="txt_input" id="spMailup_email" maxlength="50" name="Email" phdata="请输入正确的邮箱地址" type="text" value="" /><span></span>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl style="margin-top: 0px;">
                                        <dd class="passStrength">
                                            <em>密码：</em>
                                            <div class="inputparent_rlat">
                                                <input class="txt_input" id="spSignup_password" name="Pwd" phdata="请输入6-20位的密码" type="password" /><span></span>
                                            </div>
                                        </dd>
                                        <dd>
                                            <em>确认密码：</em>
                                            <div class="inputparent_rlat">
                                                <input class="txt_input" id="spSignup_passwordRecheck" name="RePwd" phdata="请再次输入密码" type="password" /><span></span>
                                            </div>
                                        </dd>
                                        
                                        <dd id="spSignup_code_dd" style="display: none;">
                                            <em>验证码：</em>
                                            <div class="inputparent_rlat">
                                                <input class="txt_input code_input" id="spSignup_code" maxlength="4" name="VerifyCode" phdata="请输入验证码" type="text" value="" />
                                                <i class="code_box">
                                                    <img id="spSignup_captchCode" alt="验证码" onclick="changeCaptchSignUpCode();" style="cursor: pointer"
                                                        title="看不清，换一张"><a href="javascript:;" onclick="changeCaptchSignUpCode()">换一换</a>
                                                </i><span></span>
                                            </div>
                                        </dd>
                                        
                                        <dd id="divnamemobilevcode">
                                            <em>验证码：</em>
                                            <div class="inputparent_rlat">
                                                <input class="txt_input code_input" id="spSignin_mobilecode" maxlength="4" name="MobileVerifyCode" phdata="请输入验证码" type="text" value="" />
                                                <i class="code_box">
                                                    <img id="spSignup_captchmobileCode" alt="验证码" onclick="changeCaptchMobileCode();" style="cursor: pointer" title="看不清，换一张"><a href="javascript:;" onclick="changeCaptchMobileCode()">换一换</a>
                                                </i><span></span>
                                            </div>
                                        </dd>
                                        <dd class="sex_login">
                                            <em>性别：</em>
                                            <div class="inputparent_rlat apSex_box">
                                                <input id="mobile_women" name="Gender" type="radio" value="0" /><label for="women" id="spup_sex_man_lab">女士</label>
                                                <input class="maginl_20" id="mobile_men" name="Gender" type="radio" value="1" /><label
                                                    for="man" class="label_margin">先生</label><span></span>
                                            </div>
                                        </dd>
                                        <dd class="height_40">
                                            <a href="javascript:void(0)" class="submit_btn" id="spup_btn" style="background: #C62026">同意注册条款并注册</a>
                                        </dd>
                                   
                                        </dd> 
                                    </dl>
                                </div>
                                <div class="email_select">
                                    <ul id="emailLists">
                                    </ul>
                                </div>
</form>                        </div>
                    </div>
                </div>
            </div>
            <div class="regLogin_rightbox frt">
                <div class="regLogin_rightinner">
                    <div id="spReg_msg">
                        <p>
                            还没有账号？</p>
                        <p class="spReg_newbox">
                            <a href="/shop/index.php/zhuce" id="spReg_new" class="comm_regBtn">注册新会员</a>
                        </p>
                    </div>
                    <div id="spLogin_msg" class="hide">
                        <p>
                            我已经是尚品会员：</p>
                        <p class="spReg_newbox">
                            <a href="/shop/index.php/login" id="splog_new" class="comm_regBtn">登录</a>
                        </p>
                    </div>
                    <div>
						<img src="/shop/Public/Home/Login/images/wx_banner.jpg">
					</div>
                </div>
            </div>
        </div>
        <!--Login End-->
    </div>
</div>
<input type="hidden" id="emailListIndex" class="hide" value="-1"> 
<input type="hidden" id="userNameListIndex" class="hide" value="-1">


<script type="cache/html" id="mobileCode_txt">
    $(function(){
		var $div_li=$("div.tab-1 ul li");
		$div_li.click(function(){
			$(this).addClass("select").siblings().removeClass("selected");
			var index = $div_li.index(this);
			$("div.tab_box>div").eq(index).show(.silings().hhide());
		})
	})
</script>

  
</body>
</html>