<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<script src="/shop/Public/Home/Login/js/v.htm" charset="utf-8"></script>
		<script src="/ResourceHandler_008.js"></script>
		<script src="/shop/Public/Home/Login/js/ResourceHandler_003.js"></script>
		<script src="/shop/Public/Home/Login/js/ResourceHandler_006.js"></script>
		<script src="/shop/Public/Home/Login/js/ResourceHandler.js">	</script>
		<script src="/shop/Public/Home/Login/js/ResourceHandler_005.js"></script>
		<script src="/shop/Public/Home/Login/js/ResourceHandler_009.js"></script>
		<script src="/shop/Public/Home/Login/js/ResourceHandler_010.js"></script>
		<script src="/shop/Public/Home/Login/js/ResourceHandler_004.js"></script>
		<script src="/shop/Public/Home/Login/js/ResourceHandler_002.js"></script>
		
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>尚品 - 登录/注册</title>
  

    <link href="/shop/Public/Home/Login/css/ResourceHandler_003.css" rel="stylesheet" type="text/css">
    
    <link href="/shop/Public/Home/Login/css/ResourceHandler_002.css" rel="stylesheet" type="text/css">
    <link href="/shop/Public/Home/Login/css/ResourceHandler_004.css" rel="stylesheet" type="text/css">
    <link href="/shop/Public/Home/Login/css/ResourceHandler.css" rel="stylesheet" type="text/css">


    <script src="/shop/Public/Home/Login/js/ga.js" async="" type="text/javascript"></script><script src="/shop/Public/Home/Login/js/ResourceHandler_007.js" type="text/javascript" charset="utf-8"></script>
	
	    
   
    </script>
 
</head>
<body>    
    <div id="spLogo" class="box relt">
        <a href="" id="spLogo_logo">
            <img src="/shop/Public/Home/Login/images/logo1.jpg" alt="尚" title="首页" width="220px" height="65px">
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
                      
                        <div style="opacity: 1; margin-left: 0px;" class="splogin_block spreg_form flt" id="spTab">
							<form action="/shop/index.php/Zhuce/addu" id="formRegist" method="post" target="hiddenIFrame">
							
                                <div id="type_change_content">
                                    <dl class="mobile_list margint40" tabcontent="tab-1">
                                        <dd id="divnamemobile">
                                            <em>用户名：</em>
                                            <div style="position: relative;" class="inputparent_rlat height_auto">
                                              
													<input style="border: 1px solid rgb(177, 173, 170);" class="txt_input" id="spMobileup_mibile" maxlength="20" name="users_account" placeholder="请输入正确的用户名" type="text">
													<span id="divMobile"></span>
                                            </div>
                                        </dd>
										
                                    </dl>

                                    <dl style="margin-top: 0px;">
                                        <dd id="divnamemobile">
                                            <em>姓名：</em>
                                            <div style="position: relative;" class="inputparent_rlat height_auto">
                                              
													<input style="border: 1px solid rgb(177, 173, 170);" class="txt_input" id="spMobileup_mibile" maxlength="20" name="users_name" placeholder="请输入您的姓名" type="text">
													<span id="divMobile"></span>
                                            </div>
                                        </dd>
										
                                    </dl> 									
                                  
                                    <dl style="margin-top: 0px;">
                                        <dd class="passStrength">
                                            <em>密码：</em>
                                            <div style="position: relative;" class="inputparent_rlat">
                                              <input style="border: 1px solid rgb(177, 173, 170);" class="txt_input" id="spSignup_password" name="users_pass" placeholder="请输入6-20位的密码" type="password"><span></span>
                                            </div>
                                        </dd>
                                        <dd>
                                            <em>确认密码：</em>
                                            <div style="position: relative;" class="inputparent_rlat">
                                                <input style="border: 1px solid rgb(177, 173, 170);" class="txt_input" id="spSignup_passwordRecheck" name="pass" phdata="请再次输入密码" type="password"><span></span>
                                            </div>
                                        </dd>
                                        <dd id="divnamemobilevcode">
                                            <em>验证码：</em>
                                            <div style="position: relative;" class="inputparent_rlat">
                                               <input style="border: 1px solid rgb(177, 173, 170);" class="txt_input code_input" id="spSignin_mobilecode" maxlength="4" name="code" placeholder="请输入验证码" type="text">
                                                <i class="code_box">
												
														 <img  src="/shop/index.php/Zhuce/code" width='150px' onclick="this.src='/shop/index.php/Zhuce/code?a'+Math.random();"/>
												
												</i><span></span>
                                            </div>
                                        </dd>
                                        <dd class="sex_login">
                                            <em>性别：</em>
                                            <div class="inputparent_rlat apSex_box">
                                                <input id="mobile_women" name="users_sex" value="0" type="radio"><label for="women" id="spup_sex_man_lab">女士</label>
                                                <input class="maginl_20" id="mobile_men" name="users_sex" value="1" type="radio"><label for="man" class="label_margin">先生</label><span></span>
                                            </div>
                                        </dd>
                                        <dd class="height_40">
                                            <button type="submit" style="margin-left:60px;width:230px;height:40px;background-color:#b2001f;color:#fff;font-size:17px;border:1px">确认注册</button>
                                        </dd>
                                       
                                    </dl>
								</div>
                                
							</form>                      
						</div>
					</div>
				</div>
			</div>
            <div class="regLogin_rightbox frt">
                <div class="regLogin_rightinner">
                    <div style="display: none;" id="spReg_msg">
                        <p>
                            还没有账号？</p>
                        <p class="spReg_newbox">
                            <a href="/shop/index.php/zhuce" id="spReg_new" class="comm_regBtn">注册新会员</a>
                        </p>
                    </div>
                    <div style="display: block;" id="spLogin_msg" class="hide">
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
       
	   
             <!--  <div style="text-align: center;"> 
              <a href="">
                        <img src="/shop/Public/Home/Login/js/wx_banner.jpg"></a>                        
                </div> -->
				
				
            </div>
        </div>
        <!--Login End-->
    </div>
</div>
<input id="emailListIndex" class="hide" value="-1" type="hidden">
<input id="userNameListIndex" class="hide" value="-1" type="hidden">

<!-- <script type="cache/html" id="mobileCode_txt">
    <div class="mobileCode_txt">
        <dl>
            <dd class="clr" style="height:50px;">
                <em>手机号码：</em><b id='spanMobileNo'></b>
                <a class="mobile_numBtn achieve_num">获取手机验证码</a>
                <span id="divInfosm" style=" color:red;"></span>
            </dd>
            <dd class="clr">
                <em>手机验证码：</em>
                <div class="inputparent_rlat">
                    <input type="text" class="txt_input" phdata="请输入手机验证码" value="" id="spMobileup_mibilenum" />
                    <span></span>
                </div>
            </dd>
            <dd class="clr">
                <em>验证码：</em>
                <div class="inputparent_rlat">
                    <input type="text" class="txt_input code_input" phdata="验证码" id="mobileCode_code" maxlength="4" value="" />
                    <i class="code_box"><img alt="验证码" id="MobileVcodPop" onclick="changeCaptchMobileIICode();" style="cursor: pointer" src="">
                    <a href="javascript:;" onclick="changeCaptchMobileIICode();">换一换</a></i>
                    <span></span>
                </div>
            </dd>
            <dd><a href="javascript:void(0)" class="submit_btn" id="mobileCode_btn">提交</a></dd>
        </dl>

    </div>
</script> -->
 
</body></html>