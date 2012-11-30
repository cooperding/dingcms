<?php
//入口文件
define('SITE_PATH', dirname(__FILE__).'/');
//定义项目名称和路径
define('APP_NAME', 'Home');
define('APP_PATH', './protected/Apps/Home/');
//开启调试模式
define('APP_DEBUG',true);
// 加载框架入口文件
require("./protected/Core/ThinkPHP.php");
?>