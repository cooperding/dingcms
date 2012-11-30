<?php
//由ThinkPHP工具箱生成的配置文件

defined('THINK_PATH') or exit();
$miniConfig = array (
    'LANG_SWITCH_ON'=>True,
    'DEBUG_MODE'    =>	false,
    'DEFAULT_ACTION'=>'index',
    'TAGLIB_PRE_LOAD'=> 'html',
    'LANG_SWITCH_ON'=>true,
    'DEFAULT_LANG'=>'zh-cn',
    'LANG_AUTO_DETECT'=>false,
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

$array = require_once(dirname(THINK_PATH).'/Config/config.php');
$array = array_merge( $array,$miniConfig );
return $array;

?>