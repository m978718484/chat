<?php /* Smarty version Smarty-3.1.6, created on 2016-02-16 18:10:28
         compiled from "./Home/View\Message\logout.html" */ ?>
<?php /*%%SmartyHeaderCode:1255956c2f40a54a245-34142743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed96b10f2e351ca3cce75232e004982bbcb6bab9' => 
    array (
      0 => './Home/View\\Message\\logout.html',
      1 => 1455617413,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1255956c2f40a54a245-34142743',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56c2f40a59101',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c2f40a59101')) {function content_56c2f40a59101($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>用户登出示例</title>
<SCRIPT src="<?php echo @RESOURCE_PATH;?>
Home/js/jquery.js" type="text/javascript"></SCRIPT>
<script>
$(function() {
	$(window).unload(function() {
		alert("离开页面");
	});
});
</script>
</head>
<body>
<h3>Hello, <?php echo $_COOKIE['chat_username'];?>
</h3>
</body>
</html><?php }} ?>