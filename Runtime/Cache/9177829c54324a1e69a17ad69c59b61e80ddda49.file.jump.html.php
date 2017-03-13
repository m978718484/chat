<?php /* Smarty version Smarty-3.1.6, created on 2017-03-13 18:41:15
         compiled from "./Home/View\User\jump.html" */ ?>
<?php /*%%SmartyHeaderCode:212856c3ccec5d2669-24449273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9177829c54324a1e69a17ad69c59b61e80ddda49' => 
    array (
      0 => './Home/View\\User\\jump.html',
      1 => 1489395887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212856c3ccec5d2669-24449273',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56c3ccec61af0',
  'variables' => 
  array (
    'message' => 0,
    'waitSecond' => 0,
    'jumpUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c3ccec61af0')) {function content_56c3ccec61af0($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>注册成功, 页面跳转中</title>

<style>
#wait {
	color: red;
}

#main {
	text-align: center;
	height: 800px;
	line-height: 800px;
}
</style>

<script src="<?php echo @RESOURCE_PATH;?>
Home/js/jquery.js" type="text/javascript"></script>
<script>
$(function() {
	var wait = setInterval(function() {
		var time = $("#wait").text()-1;
		if(time <= 0) {
			location.href = $("a").attr("href");
			clearInterval(wait);
		}
		$("#wait").text(time);
	}, 1000);
});
</script>
</head>
<body>
<div id="main"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
，<span id="wait"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</span>后跳转到登陆页面，如未跳转，可以<a href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">点击此处</a></div>
</body>
</html><?php }} ?>