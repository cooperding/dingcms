<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>内容管理系统</title>
<link id="easyuiTheme" rel="stylesheet" type="text/css" href="__PUBLIC__/Easyui/themes/cupertino/easyui.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Easyui/themes/default/portal.css"><!--此css引入要根据情况修改-->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Style/Css/admin.css">
<script type="text/javascript" src="__PUBLIC__/Style/Js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Easyui/jquery.portal.js"></script>
<script type="text/javascript" src="__PUBLIC__/Easyui/dingeasyui.js"></script>
</head>

<body>

</head>
<body id="login">
<div class="login wp">
<div class="logintop"></div>
<div class="loginlogo"><img src="__PUBLIC__/Style/Images/logo.gif"/></div>

<form action="__APP__/Login/dologin" method="post" name="login_box" id="login_box">
<div class="loginfrom">
<div class="loginfrom_con">
<div class="user">
<input type="text" name="user_name" class="logininput" required />
</div>
<div class="pass">
<input type="password" name="user_password" class="logininput" required />
</div>
<div class="yazhengma">
<div class="yz_left">
<input type="text" name="vd_code" id="vd_code" class="logininput" required />
</div><!--yz_left-->
<div class="yz_right">
<img src="__APP__/Login/vercode" onclick="this.src='__APP__/Login/vercode/?tm='+Math.random()" style="cursor: pointer;" title="看不清？点击更换另一个验证码。">看不清楚？点击图片
</div><!--yz_right-->
<div class="clear"></div><!--clear-->
</div><!--yazhengma-->
</div><!--loginfrom_con-->
<div class="loginad"></div><!--dloginad-->
<div class="loginfromfoot">
<div class="loginfromfoot_left">
<h3><a href="/" target="_blank">←去向站点首页</a></h3>
</div><!--loginfromfoot_left-->
<div class="loginfromfoot_right">
<button class="login_sub button" value="登陆">登陆</button>
</div><!--loginfromfoot_right-->
<div class="clear"></div>
</div><!--loginfromfoot-->
</div><!--loginfrom-->
</form>







</div>




</body>
</html>