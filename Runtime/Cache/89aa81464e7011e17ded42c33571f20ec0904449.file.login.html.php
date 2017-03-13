<?php /* Smarty version Smarty-3.1.6, created on 2017-03-13 18:37:06
         compiled from "./Home/View\User\login.html" */ ?>
<?php /*%%SmartyHeaderCode:1078656c17c94af3545-83660515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89aa81464e7011e17ded42c33571f20ec0904449' => 
    array (
      0 => './Home/View\\User\\login.html',
      1 => 1489395887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1078656c17c94af3545-83660515',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56c17c94c098f',
  'variables' => 
  array (
    'loginFailure' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c17c94c098f')) {function content_56c17c94c098f($_smarty_tpl) {?>﻿<!DOCTYPE html>
<html>
<HEAD>
<META content="IE=11.0000" http-equiv="X-UA-Compatible">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>用户登录</TITLE>
<SCRIPT src="<?php echo @RESOURCE_PATH;?>
Home/js/jquery.js" type="text/javascript"></SCRIPT>
<SCRIPT src="<?php echo @RESOURCE_PATH;?>
Home/js/jquery-ui.min.js" type="text/javascript"></SCRIPT>
<STYLE>
body{
	background: #ebebeb;
	font-family: "Helvetica Neue","Hiragino Sans GB","Microsoft YaHei","\9ED1\4F53",Arial,sans-serif;
	color: #222;
	font-size: 12px;
}
*{padding: 0px;margin: 0px;}
.top_div{
	background: #008ead;
	width: 100%;
	height: 400px;
}
.ipt{
	border: 1px solid #d3d3d3;
	padding: 10px 10px;
	width: 290px;
	border-radius: 4px;
	padding-left: 35px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s
}
.ipt:focus{
	border-color: #66afe9;
	outline: 0;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
}
.u_logo{
	background: url("<?php echo @RESOURCE_PATH;?>
Home/images/username.png") no-repeat;
	padding: 10px 10px;
	position: absolute;
	top: 43px;
	left: 40px;

}
.p_logo{
	background: url("<?php echo @RESOURCE_PATH;?>
Home/images/password.png") no-repeat;
	padding: 10px 10px;
	position: absolute;
	top: 12px;
	left: 40px;
}
a{
	text-decoration: none;
}
.tou{
	background: url("<?php echo @RESOURCE_PATH;?>
Home/images/tou.png") no-repeat;
	width: 97px;
	height: 92px;
	position: absolute;
	top: -87px;
	left: 140px;
}
.left_hand{
	background: url("<?php echo @RESOURCE_PATH;?>
Home/images/left_hand.png") no-repeat;
	width: 32px;
	height: 37px;
	position: absolute;
	top: -38px;
	left: 150px;
}
.right_hand{
	background: url("<?php echo @RESOURCE_PATH;?>
Home/images/right_hand.png") no-repeat;
	width: 32px;
	height: 37px;
	position: absolute;
	top: -38px;
	right: -64px;
}
.initial_left_hand{
	background: url("<?php echo @RESOURCE_PATH;?>
Home/images/hand.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -12px;
	left: 100px;
}
.initial_right_hand{
	background: url("<?php echo @RESOURCE_PATH;?>
Home/images/hand.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -12px;
	right: -112px;
}
.left_handing{
	background: url("<?php echo @RESOURCE_PATH;?>
Home/images/left-handing.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -24px;
	left: 139px;
}
.right_handinging{
	background: url("<?php echo @RESOURCE_PATH;?>
Home/images/right_handing.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -21px;
	left: 210px;
}

#register {
	width: 500px;
	height: 300px;
	margin:auto;
	background: white;
}
</STYLE>
<SCRIPT type="text/javascript">
$(function(){
	//得到焦点
	$("#password").focus(function(){
		$("#left_hand").animate({
			left: "150",
			top: " -38"
		},{step: function(){
			if(parseInt($("#left_hand").css("left"))>140){
				$("#left_hand").attr("class","left_hand");
			}
		}}, 2000);
		$("#right_hand").animate({
			right: "-64",
			top: "-38px"
		},{step: function(){
			if(parseInt($("#right_hand").css("right"))> -70){
				$("#right_hand").attr("class","right_hand");
			}
		}}, 2000);
	});
	//失去焦点
	$("#password").blur(function(){
		$("#left_hand").attr("class","initial_left_hand");
		$("#left_hand").attr("style","left:100px;top:-12px;");
		$("#right_hand").attr("class","initial_right_hand");
		$("#right_hand").attr("style","right:-112px;top:-12px");
	});
	
	$("input[type=button]").on({
		mouseover: function() {
			$(this).css("cursor", "pointer");
		},
		mouseout: function() {
			$(this).css("cursor", "default");
		},
		click: function() {
			window.location = "/chat/index.php/User/register";
		}
	});
	
	$("input[type=submit]").on({
		mouseover: function() {
			$(this).css("cursor", "pointer");
		},
		mouseout: function() {
			$(this).css("cursor", "default");
		}
	});
	
	$("form").submit(function() {
		//检验用户名是否为空
		if($("#username").val() == "") {
			alert("请输入用户名！");
			return false;
		}
		
		//检验密码是否为空
		if($("#password").val() == "") {
			alert("请输入密码！");
			return false;
		}
	});
});
</SCRIPT>
<META name="GENERATOR" content="MSHTML 11.00.9600.17496">
</HEAD>
<BODY>
<DIV class="top_div"></DIV>
<DIV style="background: rgb(255, 255, 255); margin: -100px auto auto; border: 1px solid rgb(231, 231, 231); border-image: none; width: 400px; text-align: center;">
  <DIV style="width: 165px; height: 96px; position: absolute;">
    <DIV class="tou"></DIV>
    <DIV class="initial_left_hand" id="left_hand"></DIV>
    <DIV class="initial_right_hand" id="right_hand"></DIV>
  </DIV>
  
  <FORM action="<?php echo @__SELF__;?>
" method="post">
  	<P style="padding: 30px 0px 10px; position: relative; margin-bottom: 5px;">
  		<SPAN class="u_logo"></SPAN>
    	<INPUT class="ipt" type="text" id="username" name="username" placeholder="请输入用户名" />
    </P>
    <P style="position: relative;"><SPAN class="p_logo"></SPAN>
      <INPUT class="ipt" id="password" type="password" id="password" name="password" placeholder="请输入密码" />
    </P>
    <?php if ($_smarty_tpl->tpl_vars['loginFailure']->value==true){?>
    <P id="hints" style="position: relative; text-align: left; text-indent: 32px; padding-top: 10px; font-size: 14px; color: red;">
		用户名或密码错误！
    </P>
    <?php }?>
    <DIV style="height: 50px; line-height: 50px; margin-top: 30px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
    <P style="margin: 0px 35px 20px 45px;">
    	<SPAN style="float: right;">
    		<input type="button" style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" href="/chat/index.php/User/register" value="注册" />
    		<input type="submit" style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" value="登陆" />
    	</SPAN>
    </P>
  </FORM>
</DIV>
<div style="text-align:center;"> </div>
</BODY>
</HTML>
<?php }} ?>