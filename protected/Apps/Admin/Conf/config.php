<?php
//由ThinkPHP工具箱生成的配置文件

defined('THINK_PATH') or exit();
$array = require_once(dirname(THINK_PATH).'/Config/config.php');
$miniConfig = array (
    'LANG_SWITCH_ON'            =>  True,
    'DEBUG_MODE'                =>  false,
    'DEFAULT_ACTION'            =>  'index',
    'TAGLIB_PRE_LOAD'           =>  'html',
    'LANG_SWITCH_ON'            =>  true,
    'DEFAULT_LANG'              =>  'zh-cn',
    'LANG_AUTO_DETECT'          =>  false,
    //权限部分
    'USER_AUTH_ON'              =>  false,//是否开启权限true,false
    'USER_AUTH_TYPE'            =>  2,		// 默认认证类型 1 登录认证 2 实时认证
    'USER_AUTH_KEY'             =>  'authId',	// 用户认证SESSION标记
    'ADMIN_AUTH_KEY'		=>  'administrator',
    'USER_AUTH_MODEL'           =>  'Operators',	// 默认验证数据表模型
    //'AUTH_PWD_ENCODER'          =>  'md5',	// 用户认证密码加密方式（不是md5加密方式）
    'USER_AUTH_GATEWAY'         =>  '/Login/index',// 默认认证网关
    'NOT_AUTH_MODULE'           =>  'Login,Node,Role',	// 默认无需认证模块
    'REQUIRE_AUTH_MODULE'       =>  '',		// 默认需要认证模块
    'NOT_AUTH_ACTION'           =>  '',		// 默认无需认证操作字符串
    'REQUIRE_AUTH_ACTION'       =>  '',		// 默认需要认证操作
    'GUEST_AUTH_ON'             =>  false,    // 是否开启游客授权访问
    'GUEST_AUTH_ID'             =>  0,        // 游客的用户ID
    //'DB_LIKE_FIELDS'            =>  'title|remark',
    'RBAC_ROLE_TABLE'           =>  $array['DB_PREFIX'].'role',
    'RBAC_USER_TABLE'           =>  $array['DB_PREFIX'].'role_user',
    'RBAC_ACCESS_TABLE'         =>  $array['DB_PREFIX'].'access',
    'RBAC_NODE_TABLE'           =>  $array['DB_PREFIX'].'node',
    //'SHOW_PAGE_TRACE'           =>  1,//显示调试信息

    //'LANG_LIST'=>'zh-cn,zh-tw',
		/*
		APP_NAME=>array(
		  "stringcount" => "150",
		  "all" =>  "1",
		  "pagenum" =>"10",
		  "smiletype" =>"mini",
		  "replay" => "1",
		  "fileawaypage" =>  "5",
		  "fileaway" =>  "1",
		  "delete" =>"0",
		)
		*/
        );

//define(WWW_PATH,dirname(dirname(dirname(dirname(__FILE__)))) . '/');

//echo $array['DB_PREFIX'];
//exit;
$array = array_merge( $array,$miniConfig );
return $array;

/*
 * return array(
    'URL_MODEL'                 =>  2, // 如果你的环境不支持PATHINFO 请设置为3
    'DB_TYPE'                   =>  'mysql',
    'DB_HOST'                   =>  'localhost',
    'DB_NAME'                   =>  'thinkphp',
    'DB_USER'                   =>  'root',
    'DB_PWD'                    =>  'root',
    'DB_PORT'                   =>  '3306',
    'DB_PREFIX'                 =>  'think_',
    'APP_AUTOLOAD_PATH'         =>  '@.TagLib',
    'SESSION_AUTO_START'        =>  true,
    'TMPL_ACTION_ERROR'         =>  'Public:success', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'       =>  'Public:success', // 默认成功跳转对应的模板文件
    'USER_AUTH_ON'              =>  true,
    'USER_AUTH_TYPE'			=>  2,		// 默认认证类型 1 登录认证 2 实时认证
    'USER_AUTH_KEY'             =>  'authId',	// 用户认证SESSION标记
    'ADMIN_AUTH_KEY'			=>  'administrator',
    'USER_AUTH_MODEL'           =>  'User',	// 默认验证数据表模型
    'AUTH_PWD_ENCODER'          =>  'md5',	// 用户认证密码加密方式
    'USER_AUTH_GATEWAY'         =>  '/Public/login',// 默认认证网关
    'NOT_AUTH_MODULE'           =>  'Public',	// 默认无需认证模块
    'REQUIRE_AUTH_MODULE'       =>  '',		// 默认需要认证模块
    'NOT_AUTH_ACTION'           =>  '',		// 默认无需认证操作
    'REQUIRE_AUTH_ACTION'       =>  '',		// 默认需要认证操作
    'GUEST_AUTH_ON'             =>  false,    // 是否开启游客授权访问
    'GUEST_AUTH_ID'             =>  0,        // 游客的用户ID
    'DB_LIKE_FIELDS'            =>  'title|remark',
    'RBAC_ROLE_TABLE'           =>  'think_role',
    'RBAC_USER_TABLE'           =>  'think_role_user',
    'RBAC_ACCESS_TABLE'         =>  'think_access',
    'RBAC_NODE_TABLE'           =>  'think_node',
    'SHOW_PAGE_TRACE'           =>  1//显示调试信息
);
 */


?>