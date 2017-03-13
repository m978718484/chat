<?php /* Smarty version Smarty-3.1.6, created on 2016-02-16 18:32:38
         compiled from "./Home/View\Message\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2793756c2f72bd35215-89908714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60d7a5dd5675b08b24d59a21e25aed87c06e6631' => 
    array (
      0 => './Home/View\\Message\\index.html',
      1 => 1455618755,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2793756c2f72bd35215-89908714',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56c2f72bdaef6',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c2f72bdaef6')) {function content_56c2f72bdaef6($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script src="<?php echo @RESOURCE_PATH;?>
Home/js/jquery.js" type="text/javascript"></script>
<script>
$(function() {
	//删除cookie
	$("input").click(function() {
		var exp = new Date();
		exp.setTime(exp.getTime() - 1);
		document.cookie = "chat_username=wangsir0623;expires="+exp.toGMTString();
		alert(document.cookie);
	});
});
</script>
</head>
<body>
Hello, <?php echo $_COOKIE['chat_username'];?>

<br />
<a href="/chat/index.php/User/logout">注销登陆</a>
</body>
</html><?php }} ?>