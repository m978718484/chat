<?php /* Smarty version Smarty-3.1.6, created on 2017-03-13 19:34:55
         compiled from "./Home/View\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2408356c3c7ccba1212-59595439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b5559805a12b2855d1c595764c8d57b42fa4505' => 
    array (
      0 => './Home/View\\Index\\index.html',
      1 => 1489404885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2408356c3c7ccba1212-59595439',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56c3c7ccd13a3',
  'variables' => 
  array (
    'host' => 0,
    'online_numbers' => 0,
    'online_users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c3c7ccd13a3')) {function content_56c3c7ccd13a3($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>网络聊天室</title>
<style>
h1, h2, h3, h4, h5, h6, p, ul {
	padding: 0px;
	margin: 0px;
}
body {
	background: #E0F3F8;
}
#header {
	width: 1024px;
	height: 100px;
	margin: auto;
	margin-bottom: 5px;
	background: url(<?php echo @RESOURCE_PATH;?>
Home/images/back.jpg);
}
#header h1 {
	height: 100px;
	line-height: 100px;
	text-indent: 20px;
}
#main {
	width: 1024px;
	margin: auto;
}
#content {
	width: 724px;
	height: 860px;
	float: left;
}
#content #message {
	width: 100%;
	height: 625px;
	background: #fff;
	border-radius: 10px;
	margin-bottom: 5px;
}
#message ul {
	padding: 10px 0px 10px 5px;
	max-height: 605px;
	overflow: auto;
	list-style-type: none;
}
#message ul li {
	line-height: 25px;
	font-size: 90%;
}
#message ul li .user_name {
	font-style: italic;
	font-size: 80%;
	font-weight: bold;
	color: red;
}
#message ul li .publish_time {
	color: green;
	font-size: 80%;
	font-weight: bold;
}
#message ul li .private {
	color: #FF85F3;
}
#content #send {
	width: 100%;
	height: 200px;
	background: #fff;
}
#content #send_button {
	height: 30px;
}
#content #send_button button {
	padding: 0px 20px;
	height: 30px;
	background: url(<?php echo @RESOURCE_PATH;?>
Home/images/send_button.png);
	border-radius: 8px;
	font-size: 110%;
	float: right;
}
#sidebar {
	width: 295px;
	max-height: 860px;
	border-radius: 10px;
	margin-left: 5px;
	float: left;
	background: #fff;
}
#sidebar #side_head p {
	height: 40px;
	line-height: 40px;
	background: #B59A85;
	text-indent: 10px;
	font-style: italic;
	border-top-left-radius: 6px;
	border-top-right-radius: 6px;
}
#side_head p #logout {
	color: blue;
}
#userlist ul {
	padding: 10px 0px 10px 20px;
	list-style-type: none;
	max-height: 800px;
	overflow: auto;
}
#userlist ul li {
	height: 25px;
	line-height: 25px;
	font-style: italic;
}
.clear {
	clear: both;
}
</style>
<script src="<?php echo @RESOURCE_PATH;?>
Home/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo @RESOURCE_PATH;?>
Home/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo @RESOURCE_PATH;?>
Home/ueditor/editor_api.js"></script>
<script>
//渲染ueditor
$(function() {
	//创建websocket对象
	try {
		var socket = new WebSocket("ws://<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
:8000");
		
		socket.onopen = function() {
			//给ws服务器发送上线通知
			var data = {};
			data.type = "online";
			data.username = "<?php echo $_COOKIE['chat_username'];?>
";
			data.nickname = "<?php echo $_COOKIE['chat_nickname'];?>
";
			socket.send(JSON.stringify(data));
		}
		
		socket.onmessage = function(e) {
			var data = JSON.parse(e.data);
		
			if(data.type == "public") {
				$("#message ul").append("<li><span class=\"user_name\"><?php echo $_COOKIE['chat_nickname'];?>
</span><span class=\"publish_time\">[" + data.time + "]</span>: " + data.content + "</li>");
			} else if(data.type == "private") {
				if(data.to == "<?php echo $_COOKIE['chat_nickname'];?>
" && data.from != "<?php echo $_COOKIE['chat_nickname'];?>
") {
					$("#message ul").append("<li><span class=\"user_name private\"><?php echo $_COOKIE['chat_nickname'];?>
</span><span class=\"private\">悄悄对你说</span><span class=\"publish_time private\">[" + data.time + "]</span>: " + data.content + "</li>");
				} else if(data.from == "<?php echo $_COOKIE['chat_nickname'];?>
" && data.to != "<?php echo $_COOKIE['chat_nickname'];?>
") {
					$("#message ul").append("<li><span class=\"private\">你悄悄对</span><span class=\"user_name private\">" + data.to + "</span><span class=\"private\">说</span><span class=\"publish_time private\">[" + data.time + "]</span>: " + data.content + "</li>");
				}
			} else if(data.type == "online") {
				if($("#" + data.username).length <= 0) {
					//在线用户数+1
					$("#online_numbers").text(parseInt($("#online_numbers").text()) + 1);
					
					if(data.username ==  "<?php echo $_COOKIE['chat_username'];?>
") {
						$("#userlist ul").prepend("<li id=" + data.username + "><span>" + data.nickname + "</span></li>");
					} else {
						$("#userlist ul").append("<li id=" + data.username + "><span>" + data.nickname + "</span></li>");
					}
				}
			} else if(data.type == "offline") {
				//在线用户数-1
				$("#online_numbers").text(parseInt($("#online_numbers").text()) - 1);
				
				$("#" + data.username).remove();
			}
			
			//滚动到底部
			$("#message ul").scrollTop($("#message ul").get(0).scrollHeight);
		}
	} catch(e) {
		alert("您的浏览器暂不支持websocket！");
	}
	
	//发送按钮点击事件
	$("#send_button button").click(function(){
		var data = {};
		data.from = "<?php echo $_COOKIE['chat_nickname'];?>
";
		
		var content = ue.getContent();
		
		//判断消息是否是公共的
		var pattern = new RegExp("^(?:<p>)?@(.*?):");
		if(pattern.test(content)) {
			data.type = "private";
			data.to = content.match(pattern)[1];
			//处理消息内容
			var pattern1 = new RegExp("^(<p>)?@.*?:");
			data.content = content.replace(pattern1, "$1");
		} else {
			data.type = "public";
			data.content = content;
		}
		//消息内容不能为空
		if(data.content == "" || data.content == "<p></p>") 
			return;
		
		socket.send(JSON.stringify(data));
		ue.setContent("");
	});
	
	$("#message ul").on({
		click: selectUser,
		mouseover: function() {		
			$(this).css("cursor", "pointer"); 
		},
		mouseout: function() {
			$(this).css("cursor", "default");
		}
	}, "li span.user_name");
	
	$("#userlist ul").on({
		click: selectUser,
		mouseover: function() {
			$(this).css("cursor", "pointer");
		},
		mouseout: function() {
			$(this).css("cursor", "default");
		}
	}, "li span");
	
	$("#logout").on({
		mouseover: function() {
			$(this).css("cursor", "pointer");
			$(this).css("text-decoration", "underline");
		},
		mouseout: function() {
			$(this).css("cursor", "default");
			$(this).css("text-decoration", "none");
		},
		click: function() {
			//向ws服务器发送下线通知
			var data = {};
			data.type = "offline";
			data.username = "<?php echo $_COOKIE['chat_username'];?>
";
			data.nickname = "<?php echo $_COOKIE['chat_nickname'];?>
";
			socket.send(JSON.stringify(data));
			
			//重定向到注销页面
			location.href = "/chat/index.php/User/logout";
		}
	});
});
function selectUser() {
	ue.setContent("@" + $(this).text() + ": ");
	ue.focus(true);
}
</script>
</head>
<body>
<div id="header">
	<h1>网络聊天室</h1>
</div>
<div id="main">
	<div id="content">
		<div id="message">
			<ul>
			</ul>
		</div>
		<div id="send"></div>
		<!-- 将send div渲染成ueditor -->
		<script type="text/javascript">
			var ue = UE.getEditor("send", {
				toolbars: [['bold', 'italic', 'underline', 'fontfamily', 'forecolor', 'emotion']],
				initialContent: "说点什么吧...",
				initialFrameHeight: 140,
				autoHeightEnabled: false,
				enableAutoSave: false,
				autoClearinitialContent: true,
				enableContextMenu: false,
				elementPathEnabled: false,
				maximumWords: 1000,
			});
		</script>
		<div id="send_button"><button>发&nbsp;&nbsp;送</button></div>
	</div>
	<div id="sidebar">
		<div id="side_head">
			<p id="side_head_left">在线用户(<span id="online_numbers"><?php echo $_smarty_tpl->tpl_vars['online_numbers']->value-1;?>
</span>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="logout">注销</span></p>
			<div class="clear"></div>
		</div>
		<div id="userlist">
			<ul>
				<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['online_users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['user']->value['username']!=$_COOKIE['chat_username']){?>
						<li id="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
</span></li>
					<?php }?>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="clear"></div>
</div>
</body>
</html><?php }} ?>