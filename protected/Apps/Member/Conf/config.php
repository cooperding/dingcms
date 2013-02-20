<?php
defined('THINK_PATH') or exit();
$array = require_once(dirname(THINK_PATH).'/Config/config.php');
$miniConfig = array (
    'LANG_SWITCH_ON'            =>  True,
    'DEBUG_MODE'                =>  false,
    'DEFAULT_ACTION'            =>  'index',
    //'TAGLIB_PRE_LOAD'           =>  'html,dogocms',
    'LANG_SWITCH_ON'            =>  true,
    'DEFAULT_LANG'              =>  'zh-cn',
    'LANG_AUTO_DETECT'          =>  false,
    
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
?>