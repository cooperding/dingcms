<?php
defined('THINK_PATH') or exit();

$connection =array(
	// 数据库常用配置
	'DB_TYPE'			=>	'mysql',			// 数据库类型
	'DB_HOST'			=>	'localhost',			// 数据库服务器地址
	'DB_NAME'			=>	'dingcms',			// 数据库名
	'DB_USER'			=>	'root',		// 数据库用户名
	'DB_PWD'			=>	'root',		// 数据库密码
	'DB_PORT'			=>	3306,				// 数据库端口
	'DB_PREFIX'			=>	'ding_',		// 数据库表前缀（因为漫游的原因，数据库表前缀必须写在本文件）
	'DB_CHARSET'		=>	'utf8',				// 数据库编码
	'DB_FIELDS_CACHE'	=>	true,				// 启用字段缓存

	//'COOKIE_DOMAIN'	=>	'.thinksns.com',	//cookie域,请替换成你自己的域名 以.开头

	//Cookie加密密码
	//'SECURE_CODE'       =>  'SECURE15997',

	// 默认应用
    //'DEFAULT_APPS'		=> array('api', 'admin', 'home', 'myop', 'weibo', 'wap', 'w3g'),

    // 是否开启URL Rewrite
	//'URL_ROUTER_ON'		=> false,

    // 是否开启调试模式 (开启AllInOne模式时该配置无效, 将自动置为false)
	//'APP_DEBUG'			=> false,
        'DB_ADD_PREFIX'  => 'add',
        'TAGLIB_BUILD_IN' => 'cx,html',
        'TAGLIB_PRE_LOAD' => 'cx,html,dogocms'//扩展标签
       // 'APP_AUTOLOAD_PATH'=>'@.TagLib,COM.TagLib'
);
return $connection;